<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $emailSubject ?? 'Information Importante de l\'Équipe InnoTech Weekly' }}</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .email-wrapper {
            width: 100%;
            padding: 40px 20px;
            min-height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            max-width: 650px;
            margin: 0 auto;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            color: white;
            padding: 40px 40px 30px;
            text-align: center;
            position: relative;
        }

        .header::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: #e74c3c;
            border-radius: 2px;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .header-subtitle {
            font-size: 16px;
            opacity: 0.9;
            margin: 0;
        }

        .content {
            padding: 40px;
        }

        .message-section {
            margin-bottom: 30px;
        }

        .message-title {
            font-size: 26px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
        }

        .message-text {
            font-size: 18px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }

        .footer {
            background: #f8f9fa;
            padding: 30px 40px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }

        .social-links {
            margin-bottom: 20px;
        }

        .social-links a {
            display: inline-block;
            margin: 0 10px;
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 50%;
            line-height: 40px;
            text-decoration: none;
            font-weight: bold;
            transition: transform 0.3s ease;
        }

        .social-links a:hover {
            transform: scale(1.1);
        }

        .footer-text {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .unsubscribe-link {
            color: #999;
            font-size: 13px;
            text-decoration: none;
        }

        .unsubscribe-link:hover {
            text-decoration: underline;
        }

        @media only screen and (max-width: 600px) {
            .email-wrapper {
                padding: 20px 10px;
            }

            .header, .content, .footer {
                padding: 25px 20px;
            }

            .message-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="container">
            <div class="header">
                <div class="logo">HRA de Dschang</div>
                <p class="header-subtitle">Informations importantes de l'équipe</p>
            </div>

            <div class="content">
                <div class="message-section">
                    <h1 class="message-title">Message de l'équipe de L'hopital regional annexe de Dschang</h1>
                    <p class="message-text">
                        Bonjour {{ $userName ?? 'Cher abonné' }},
                    </p>

                    {!! $content !!}

                </div>
            </div>

            <div class="footer">
                <div class="social-links">
                    <a href="#">f</a>
                    <a href="#">t</a>
                    <a href="#">in</a>
                    <a href="#">@</a>
                </div>

                <p class="footer-text">
                    Merci de votre fidélité,<br>
                    L'équipe de l'hopital regional annexe de Dschang
                </p>

                <p>
                    <a class="unsubscribe-link" href="{{ $unsubscribeUrl ?? '#' }}">
                        Se désabonner | Gérer mes préférences
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>