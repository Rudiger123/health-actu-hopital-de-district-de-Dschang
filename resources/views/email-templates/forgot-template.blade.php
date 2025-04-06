*
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation de mot de passe</title>
    <style>
        /* Base Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333333;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background-color: #4f46e5;
            padding: 30px 20px;
            text-align: center;
            color: white;
        }
        
        .logo {
            height: 50px;
            width: auto;
            margin-bottom: 15px;
        }
        
        .content {
            padding: 30px;
        }
        
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4f46e5;
            color: white !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin: 20px 0;
        }
        
        .footer {
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666666;
            background-color: #f5f5f5;
        }
        
        /* Responsive Styles */
        @media only screen and (max-width: 600px) {
            .content {
                padding: 20px;
            }
            
            .button {
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <!-- Favicon comme logo -->
            <img src="cid:favicon.webp" alt="Logo" class="logo">
            <h1>Réinitialisation de mot de passe</h1>
        </div>
        
        <div class="content">
            <p>Bonjour {{ $data['user']->name }},</p>
            
            <p>Nous avons reçu une demande de réinitialisation de mot de passe pour votre compte.</p>
            
            <p>Cliquez sur le bouton ci-dessous pour définir un nouveau mot de passe :</p>
            
            <div style="text-align: center;">
                <a href="{{ $data['actionLink'] }}" class="button">
                    Réinitialiser mon mot de passe
                </a>
            </div>
            
            <p>Ce lien expirera dans 24 heures. Si vous n'avez pas demandé cette réinitialisation, veuillez ignorer cet email.</p>
            
            <p>Si le bouton ne fonctionne pas, copiez et collez ce lien dans votre navigateur :</p>
            <p style="word-break: break-all;">{{ $data['actionLink'] }}</p>
        </div>
        
        <div class="footer">
            <p>© <?php echo date('Y'); ?> Votre Entreprise. Tous droits réservés.</p>
            <p>
                <a href="https://votresite.com/mentions-legales" style="color: #4f46e5; text-decoration: none;">Mentions légales</a> | 
                <a href="https://votresite.com/confidentialite" style="color: #4f46e5; text-decoration: none;">Politique de confidentialité</a>
            </p>
        </div>
    </div>
</body>
</html>