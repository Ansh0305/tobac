<?php
// underage.php - Access Prohibited for Underage Visitors
$base = '';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Access Prohibited | Tabac Enterprises</title>
    <meta name="robots" content="noindex, nofollow" />
    <link rel="shortcut icon" href="67ad72477c605912a4af72eb/67d10e22db1df97ca9dc97d8_favicon-small.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #080808;
            color: #ffffff;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 40px 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Ambient background glow */
        .ambient-glow {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(221, 60, 60, 0.12) 0%, rgba(221, 185, 105, 0.05) 40%, transparent 70%);
            filter: blur(80px);
            pointer-events: none;
            z-index: 1;
        }

        /* Top Brand */
        .brand-header {
            position: relative;
            z-index: 2;
            text-align: center;
            margin-bottom: 20px;
        }

        .brand-logo {
            width: 190px;
            height: auto;
            object-fit: contain;
            filter: drop-shadow(0 4px 16px rgba(0, 0, 0, 0.6));
        }

        /* Centered Card */
        .prohibited-card {
            position: relative;
            z-index: 2;
            background: linear-gradient(180deg, rgba(22, 22, 22, 0.95) 0%, rgba(14, 14, 14, 0.98) 100%);
            border: 1px solid rgba(221, 185, 105, 0.28);
            border-radius: 20px;
            padding: 48px 40px;
            max-width: 580px;
            width: 100%;
            text-align: center;
            box-shadow: 0 24px 60px rgba(0, 0, 0, 0.8), 0 0 1px 1px rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(16px);
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(16px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Shield / 18+ Icon */
        .icon-wrap {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(221, 60, 60, 0.12);
            border: 2px solid rgba(221, 60, 60, 0.45);
            margin-bottom: 24px;
            box-shadow: 0 8px 24px rgba(221, 60, 60, 0.2);
        }

        .icon-wrap svg {
            width: 40px;
            height: 40px;
            stroke: #ef4444;
        }

        /* Tag badge */
        .restriction-badge {
            display: inline-block;
            font-family: 'Montserrat', sans-serif;
            font-size: 11.5px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #ef4444;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.25);
            padding: 6px 16px;
            border-radius: 50px;
            margin-bottom: 18px;
        }

        .card-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 28px;
            font-weight: 700;
            line-height: 1.25;
            color: #ffffff;
            letter-spacing: -0.5px;
            margin-bottom: 16px;
        }

        .card-description {
            font-size: 15px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.78);
            margin-bottom: 18px;
        }

        .card-subtext {
            font-size: 13.5px;
            line-height: 1.55;
            color: rgba(255, 255, 255, 0.55);
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 10px;
            margin-bottom: 30px;
        }

        /* Buttons */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 14px;
            align-items: center;
        }

        .btn-exit {
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 16px 28px;
            background: #ef4444;
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.25s ease;
            box-shadow: 0 8px 24px rgba(239, 68, 68, 0.35);
        }

        .btn-exit:hover {
            background: #dc2626;
            transform: translateY(-1px);
            box-shadow: 0 10px 28px rgba(239, 68, 68, 0.45);
        }

        .btn-retry {
            background: none;
            border: none;
            color: var(--yellow, #ddb969);
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            padding: 8px 16px;
            text-decoration: underline;
            text-underline-offset: 4px;
            transition: color 0.2s ease;
        }

        .btn-retry:hover {
            color: #ffffff;
        }

        /* Footer */
        .page-footer {
            position: relative;
            z-index: 2;
            text-align: center;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.4);
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            .prohibited-card {
                padding: 36px 24px;
                border-radius: 16px;
            }
            .card-title {
                font-size: 23px;
            }
            .card-description {
                font-size: 14px;
            }
            .brand-logo {
                width: 160px;
            }
        }
    </style>
</head>
<body>
    <div class="ambient-glow" aria-hidden="true"></div>

    <header class="brand-header">
        <img src="assets/images/tobaclogo.png" alt="Tobac Enterprises" class="brand-logo" />
    </header>

    <main class="prohibited-card">
        <div class="icon-wrap" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
            </svg>
        </div>

        <div>
            <span class="restriction-badge">Under 18 Notice</span>
        </div>

        <h1 class="card-title">Access Prohibited</h1>

        <p class="card-description">
            This website provides commercial and industrial information regarding tobacco cultivation, leaf processing facilities, and international trade operations.
        </p>

        <div class="card-subtext">
            In accordance with legal and regulatory standards, access is strictly limited to individuals <strong>18 years of age or older</strong>. Because you indicated you are under 18, you are prohibited from entering this website.
        </div>

        <div class="action-buttons">
            <a href="https://www.google.com" class="btn-exit" rel="noopener noreferrer">Exit Website</a>
            <button type="button" class="btn-retry" onclick="reverifyAge()">I made a mistake - Verify age again</button>
        </div>
    </main>

    <footer class="page-footer">
        &copy; <?php echo date('Y'); ?> Tabac Leaf Enterprises. All rights reserved.
    </footer>

    <script>
        function reverifyAge() {
            try {
                localStorage.removeItem('tobac_age_verified');
                sessionStorage.removeItem('tobac_age_verified');
            } catch(e) {}
            window.location.href = 'index';
        }
    </script>
</body>
</html>
