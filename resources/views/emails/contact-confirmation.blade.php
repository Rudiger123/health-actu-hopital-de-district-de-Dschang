<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Confirmation de réception de votre message</title>
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
        .message-details {
            background-color: #f8f9fa;
            padding: 15px;
            margin: 20px 0;
            border-left: 4px solid #28a745;
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
            <h2>Confirmation de réception</h2>
        </div>
        <div class="content">
            <p>Cher(e) {{ $message->name }},</p>
            
            <p>Nous avons bien reçu votre message concernant "{{ $message->subject }}".</p>
            
            <div class="message-details">
                <p><strong>Détails de votre message :</strong></p>
                <p><strong>Sujet :</strong> {{ $message->subject }}</p>
                <p><strong>Date d'envoi :</strong> {{ $message->created_at->format('d/m/Y à H:i') }}</p>
            </div>

            <p>Notre équipe va étudier votre demande et vous répondra dans les plus brefs délais.</p>
            
            <p>En attendant notre réponse, voici quelques informations utiles :</p>
            <ul>
                <li>Nos horaires d'ouverture : Du lundi au vendredi de 7h30 à 16h00</li>
                <li>Pour les urgences : Appelez le {{ $siteInfo->site_phone ?? '677 89 45 23' }}</li>
                <li>Adresse : {{ $siteInfo->site_address ?? 'Hôpital de District de Dschang' }}</li>
            </ul>
            
            <p>Cordialement,<br>
            L'équipe de l'Hôpital de District de Dschang</p>
        </div>
        <div class="footer">
            <p>Cet email est une confirmation automatique, merci de ne pas y répondre directement.</p>
        </div>
    </div>
</body>
</html> 