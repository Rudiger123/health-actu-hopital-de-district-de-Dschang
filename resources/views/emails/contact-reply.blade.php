<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Réponse à votre message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }

        .content {
            padding: 20px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #6c757d;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Reponse à votre message</h2>
        </div>
        <div class="content">
            <p>Cher(e) {{ $message->name }},</p>

            <p>Nous vous remercions pour votre message concernant "{{ $message->subject }}".</p>

            <div style="background-color: #f8f9fa; padding: 15px; margin: 20px 0; border-left: 4px solid #007bff;">
                {!! nl2br(e($reply)) !!}
            </div>

            <p>Si vous avez d'autres questions, n'hésitez pas à nous contacter à nouveau.</p>

            <p>Cordialement,<br>
                L'équipe de l'Hôpital de District de Dschang</p>
        </div>
        <div class="footer">
            <p>Cet email est une réponse automatique, merci de ne pas y répondre directement.</p>
        </div>
    </div>
</body>

</html>
