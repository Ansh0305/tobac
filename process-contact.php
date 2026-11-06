<?php
// process-contact.php
// Handles contact inquiries for Tabac Leaf Enterprises

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit;
}

// 1. Anti-spam honeypot (field must remain blank)
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

// 4. Destination Email: Official Tabac Leaf Enterprises inquiries inbox
$recipient_email = 'info@tabacenterprises.com';
$email_subject   = "New Inquiry from Tabac Leaf Enterprises Website: " . $subject;

$email_body  = "You have received a new inquiry from the Tabac Leaf Enterprises website:\n\n";
$email_body .= "--------------------------------------------------------\n";
$email_body .= "Name:    " . $name . "\n";
$email_body .= "Email:   " . $email . "\n";
if (!empty($phone)) {
    $email_body .= "Phone:   " . $phone . "\n";
}
$email_body .= "Subject: " . $subject . "\n";
$email_body .= "Date:    " . date('Y-m-d H:i:s T') . "\n";
$email_body .= "IP:      " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n";
$email_body .= "--------------------------------------------------------\n\n";
$email_body .= "Message:\n" . ($message ?: '[No additional message provided]') . "\n";

$headers  = "From: Tabac Web Inquiry <noreply@tabacenterprises.com>\r\n";
$headers .= "Reply-To: " . $name . " <" . $email . ">\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// 5. Send Email via standard PHP mail()
$mail_sent = @mail($recipient_email, $email_subject, $email_body, $headers);

// 6. Persistent logging (storage/inquiries.jsonl)
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
    'recipient' => $recipient_email,
    'mail_sent' => (bool)$mail_sent,
];
@file_put_contents($log_file, json_encode($inquiry_record, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND | LOCK_EX);

// 7. Response
echo json_encode([
    'success' => true,
    'message' => 'Thank you! Your inquiry has been received. Our team will get back to you shortly.',
]);
exit;
