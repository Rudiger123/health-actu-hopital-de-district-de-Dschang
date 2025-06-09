<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $newsletterSubject ?? 'Votre Newsletter' }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .email-wrapper {
            width: 100%;
            padding: 20px 0;
        }

        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 0 auto;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        h1, h2, h3 {
            color: #2c3e50;
        }

        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.85em;
            color: #777;
        }

        .unsubscribe-link {
            display: inline-block;
            margin-top: 8px;
            color: #999;
            font-size: 0.8em;
        }

        @media only screen and (max-width: 600px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="container">
            {{-- Contenu HTML personnalisé --}}
            {!! $content !!}

            <div class="footer">
                <p>Vous recevez cet e-mail car vous êtes abonné(e) à notre newsletter.</p>
                <p>
                    Si vous ne souhaitez plus recevoir nos e-mails, vous pouvez vous
                    <a class="unsubscribe-link" href="{{ $unsubscribeUrl }}">désabonner ici</a>.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
