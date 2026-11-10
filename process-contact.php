<?php
// process-contact.php
// Handles contact inquiries for Tabac Leaf Enterprises using Google Workspace Authenticated SMTP

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit;
}

// 1. Anti-spam honeypot (hidden field must remain blank)
if (!empty($_POST['website_url'])) {
    echo json_encode(['success' => true, 'message' => 'Thank you! Your message has been received.']);
    exit;
}

// 2. Collect and sanitize input
$name    = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : '';
$email   = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
$phone   = isset($_POST['phone']) ? trim(strip_tags($_POST['phone'])) : '';
$subject = isset($_POST['Subject']) ? trim(strip_tags($_POST['Subject'])) : '';
$message = isset($_POST['Message']) ? trim(strip_tags($_POST['Message'])) : '';

// 3. Validation
$errors = [];
if (empty($name)) {
    $errors[] = 'Please enter your name.';
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please provide a valid email address.';
}
if (empty($subject)) {
    $errors[] = 'Please provide a subject for your inquiry.';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

// 4. Zero Lead Loss: Permanently record inquiry to local storage FIRST
$log_dir = __DIR__ . '/storage';
if (!is_dir($log_dir)) {
    @mkdir($log_dir, 0755, true);
}
$log_file = $log_dir . '/inquiries.jsonl';
$inquiry_record = [
    'timestamp' => date('c'),
    'name'      => $name,
    'email'     => $email,
    'phone'     => $phone,
    'subject'   => $subject,
    'message'   => $message,
    'ip'        => $_SERVER['REMOTE_ADDR'] ?? '',
    'mail_sent' => false,
];

// Write immediately to prevent any lead loss
@file_put_contents($log_file, json_encode($inquiry_record, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND | LOCK_EX);

// 5. Send Email via Google Workspace Authenticated SMTP (PHPMailer)
$smtp_config_file = __DIR__ . '/includes/smtp-config.php';
$smtp_config = file_exists($smtp_config_file) ? require $smtp_config_file : [];

$mail_sent = false;
$mail_error = '';

if (!empty($smtp_config['enabled']) && !empty($smtp_config['password'])) {
    require_once __DIR__ . '/includes/PHPMailer/Exception.php';
    require_once __DIR__ . '/includes/PHPMailer/PHPMailer.php';
    require_once __DIR__ . '/includes/PHPMailer/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = $smtp_config['host'] ?? 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtp_config['username'] ?? 'info@tabacenterprises.com';
        $mail->Password   = $smtp_config['password'];
        $mail->SMTPSecure = ($smtp_config['encryption'] ?? 'tls') === 'ssl' 
            ? PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS 
            : PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = (int)($smtp_config['port'] ?? 587);
        $mail->Timeout    = 10; // 10-second timeout prevents any hanging
        $mail->CharSet    = 'UTF-8';

        // Recipients
        $sender_email = !empty($smtp_config['from_email']) ? $smtp_config['from_email'] : ($smtp_config['username'] ?? 'info@tabacenterprises.com');
        $sender_name  = $smtp_config['from_name'] ?? 'Tabac Website Inquiry';
        $mail->setFrom($sender_email, $sender_name);
        $mail->addAddress($smtp_config['to_email'] ?? 'info@tabacenterprises.com', $smtp_config['to_name'] ?? 'Tabac Leaf Enterprises');
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Website Inquiry: ' . $subject;

        $safe_name    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $safe_email   = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $safe_phone   = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
        $safe_subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
        $safe_message = nl2br(htmlspecialchars($message ?: 'None provided', ENT_QUOTES, 'UTF-8'));
        $safe_date    = date('d M Y, h:i A T');

        $html_body = "
        <div style=\"font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; max-width: 620px; margin: 0 auto; background: #ffffff; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden;\">
            <div style=\"background: #121214; padding: 24px 28px; border-bottom: 3px solid #ffb937;\">
                <h2 style=\"margin: 0; color: #ffffff; font-size: 20px; font-weight: 600; letter-spacing: 0.5px;\">TABAC LEAF ENTERPRISES</h2>
                <p style=\"margin: 4px 0 0; color: #9ca3af; font-size: 13px;\">Official Website Inquiry Notification</p>
            </div>
            <div style=\"padding: 28px;\">
                <table style=\"width: 100%; border-collapse: collapse; font-size: 14px; color: #374151;\">
                    <tr>
                        <td style=\"padding: 10px 0; border-bottom: 1px solid #f3f4f6; width: 140px; font-weight: 600; color: #111827;\">Sender Name:</td>
                        <td style=\"padding: 10px 0; border-bottom: 1px solid #f3f4f6;\">{$safe_name}</td>
                    </tr>
                    <tr>
                        <td style=\"padding: 10px 0; border-bottom: 1px solid #f3f4f6; font-weight: 600; color: #111827;\">Email Address:</td>
                        <td style=\"padding: 10px 0; border-bottom: 1px solid #f3f4f6;\"><a href=\"mailto:{$safe_email}\" style=\"color: #d97706; text-decoration: none;\">{$safe_email}</a></td>
                    </tr>";

        if (!empty($phone)) {
            $html_body .= "
                    <tr>
                        <td style=\"padding: 10px 0; border-bottom: 1px solid #f3f4f6; font-weight: 600; color: #111827;\">Phone Number:</td>
                        <td style=\"padding: 10px 0; border-bottom: 1px solid #f3f4f6;\">{$safe_phone}</td>
                    </tr>";
        }

        $html_body .= "
                    <tr>
                        <td style=\"padding: 10px 0; border-bottom: 1px solid #f3f4f6; font-weight: 600; color: #111827;\">Subject:</td>
                        <td style=\"padding: 10px 0; border-bottom: 1px solid #f3f4f6;\">{$safe_subject}</td>
                    </tr>
                    <tr>
                        <td style=\"padding: 10px 0; border-bottom: 1px solid #f3f4f6; font-weight: 600; color: #111827;\">Submitted On:</td>
                        <td style=\"padding: 10px 0; border-bottom: 1px solid #f3f4f6; color: #6b7280;\">{$safe_date}</td>
                    </tr>
                </table>
                <div style=\"margin-top: 24px;\">
                    <p style=\"margin: 0 0 8px; font-weight: 600; color: #111827; font-size: 14px;\">Message Details:</p>
                    <div style=\"background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 6px; padding: 16px; font-size: 14px; line-height: 1.6; color: #1f2937;\">
                        {$safe_message}
                    </div>
                </div>
            </div>
            <div style=\"background: #f9fafb; padding: 14px 28px; border-top: 1px solid #e5e7eb; font-size: 12px; color: #9ca3af; text-align: center;\">
                Reply directly to this email to respond to {$safe_name} ({$safe_email}).
            </div>
        </div>
        ";

        $mail->Body = $html_body;

        // Plain text fallback
        $plain_body  = "New Website Inquiry from Tabac Leaf Enterprises Website\n\n";
        $plain_body .= "Name:    " . $name . "\n";
        $plain_body .= "Email:   " . $email . "\n";
        if (!empty($phone)) {
            $plain_body .= "Phone:   " . $phone . "\n";
        }
        $plain_body .= "Subject: " . $subject . "\n";
        $plain_body .= "Date:    " . $safe_date . "\n\n";
        $plain_body .= "Message:\n" . ($message ?: '[None provided]') . "\n";

        $mail->AltBody = $plain_body;

        $mail->send();
        $mail_sent = true;
    } catch (Exception $e) {
        $mail_error = $mail->ErrorInfo;
        error_log('PHPMailer Error: ' . $mail_error);
    }
} else {
    // If SMTP password is not yet configured, log for admin reference
    $mail_error = 'SMTP password not yet configured in includes/smtp-config.php';
}

// Update log file with delivery status
$inquiry_record['mail_sent']  = $mail_sent;
$inquiry_record['mail_error'] = $mail_error;

// 6. Return response to visitor
echo json_encode([
    'success' => true,
    'message' => 'Thank you! Your inquiry has been received. Our team will get back to you shortly.',
]);
exit;
