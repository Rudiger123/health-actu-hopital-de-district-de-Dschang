<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Réinitialisation de mot de passe</title>
    <style>
        /* Reset pour compatibilité email */
        * { box-sizing: border-box; }
        body, table, td, p, h1, h2, h3 { margin: 0; padding: 0; }
        
        /* Base Styles */
        body {
            font-family: Arial, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333333;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        
        .email-wrapper {
            background-color: #f7f7f7;
            padding: 20px 0;
            min-height: 100vh;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            padding: 30px 20px;
            text-align: center;
            color: white;
        }
        
        .header h1 {
            font-size: 24px;
            font-weight: 600;
            margin: 15px 0 0 0;
            text-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        
        .logo {
            height: 50px;
            width: auto;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        
        .security-icon {
            font-size: 48px;
            margin-bottom: 10px;
            display: block;
        }
        
        .content {
            padding: 30px;
        }
        
        .content p {
            margin-bottom: 18px;
            font-size: 16px;
            line-height: 1.7;
        }
        
        .content p:last-child {
            margin-bottom: 0;
        }
        
        .greeting {
            font-size: 18px;
            color: #2d3748;
            margin-bottom: 20px;
            font-weight: 500;
        }
        
        .warning-box {
            background-color: #fef5e7;
            border-left: 4px solid #f59e0b;
            padding: 15px 20px;
            margin: 25px 0;
            border-radius: 0 4px 4px 0;
        }
        
        .warning-box p {
            margin: 0;
            color: #92400e;
            font-weight: 500;
        }
        
        .security-tips {
            background-color: #f0f9ff;
            border-left: 4px solid #0ea5e9;
            padding: 15px 20px;
            margin: 25px 0;
            border-radius: 0 4px 4px 0;
        }
        
        .security-tips h3 {
            color: #0c4a6e;
            margin: 0 0 10px 0;
            font-size: 16px;
        }
        
        .security-tips ul {
            margin: 0;
            padding-left: 20px;
            color: #0c4a6e;
        }
        
        .security-tips li {
            margin-bottom: 5px;
        }
        
        .button-container {
            text-align: center;
            margin: 30px 0;
        }
        
        .button {
            display: inline-block;
            padding: 14px 28px;
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            color: white !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
            transition: all 0.3s ease;
            /* Propriétés Outlook */
            mso-padding-alt: 0;
            mso-text-raise: 0;
        }
        
        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(79, 70, 229, 0.4);
        }
        
        .link-fallback {
            background-color: #f8fafc;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #e2e8f0;
            margin: 20px 0;
        }
        
        .link-fallback p {
            margin: 0;
            font-size: 14px;
            color: #64748b;
        }
        
        .link-text {
            word-break: break-all;
            color: #4f46e5 !important;
            text-decoration: none;
            font-family: 'Courier New', monospace;
            font-size: 13px;
            background-color: #f1f5f9;
            padding: 8px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 8px;
        }
        
        .expiry-info {
            background-color: #fef2f2;
            border-left: 4px solid #ef4444;
            padding: 15px 20px;
            margin: 25px 0;
            border-radius: 0 4px 4px 0;
        }
        
        .expiry-info p {
            margin: 0;
            color: #dc2626;
            font-weight: 500;
        }
        
        .footer {
            padding: 25px 20px;
            text-align: center;
            font-size: 13px;
            color: #64748b;
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }
        
        .footer p {
            margin-bottom: 10px;
        }
        
        .footer a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 500;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        .divider {
            height: 1px;
            background-color: #e2e8f0;
            margin: 25px 0;
        }
        
        /* Responsive Styles */
        @media only screen and (max-width: 600px) {
            .email-wrapper {
                padding: 10px;
            }
            
            .email-container {
                margin: 0;
            }
            
            .header {
                padding: 25px 15px;
            }
            
            .header h1 {
                font-size: 20px;
            }
            
            .content {
                padding: 25px 15px;
            }
            
            .button {
                display: block;
                text-align: center;
                padding: 12px 20px;
                font-size: 14px;
            }
            
            .footer {
                padding: 20px 15px;
            }
        }
        
        /* Styles pour Outlook */
        @media screen and (-webkit-min-device-pixel-ratio: 0) {
            .button {
                background-image: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-container">
            <div class="header">
                @if(isset($logo) && $logo)
                    <img src="{{ $logo }}" alt="{{ config('app.name', 'Logo') }}" class="logo">
                @else
                    <span class="security-icon">🔐</span>
                @endif
                <h1>Réinitialisation de mot de passe</h1>
            </div>
            
            <div class="content">
                <div class="greeting">
                    Bonjour {{ $data['user']->name ?? 'Utilisateur' }},
                </div>
                
                <p>Nous avons reçu une demande de réinitialisation de mot de passe pour votre compte associé à l'adresse email <strong>{{ $data['user']->email ?? 'votre adresse' }}</strong>.</p>
                
                <div class="warning-box">
                    <p>⚠️ <strong>Important :</strong> Si vous n'avez pas demandé cette réinitialisation, veuillez ignorer cet email et vérifier la sécurité de votre compte.</p>
                </div>
                
                <p>Pour définir un nouveau mot de passe sécurisé, cliquez sur le bouton ci-dessous :</p>
                
                <div class="button-container">
                    <a href="{{ $data['actionLink'] }}" class="button">
                        🔐 Réinitialiser mon mot de passe
                    </a>
                </div>
                
                <div class="expiry-info">
                    <p>⏰ <strong>Attention :</strong> Ce lien expirera dans {{ $data['expiry'] ?? '24 heures' }}. Après cette période, vous devrez faire une nouvelle demande.</p>
                </div>
                
                <div class="divider"></div>
                
                <div class="link-fallback">
                    <p><strong>Le bouton ne fonctionne pas ?</strong></p>
                    <p>Copiez et collez ce lien dans votre navigateur :</p>
                    <a href="{{ $data['actionLink'] }}" class="link-text">{{ $data['actionLink'] }}</a>
                </div>
                
                <div class="security-tips">
                    <h3>💡 Conseils de sécurité :</h3>
                    <ul>
                        <li>Choisissez un mot de passe fort (12+ caractères)</li>
                        <li>Utilisez des lettres, chiffres et symboles</li>
                        <li>Ne réutilisez pas un ancien mot de passe</li>
                        <li>Activez l'authentification à deux facteurs si disponible</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer">
                <p>
                    <strong>{{ config('app.name', 'Votre Entreprise') }}</strong><br>
                    Équipe Sécurité & Support
                </p>
                
                <div class="divider" style="margin: 15px 0;"></div>
                
                <p>© {{ date('Y') }} {{ config('app.name', 'Votre Entreprise') }}. Tous droits réservés.</p>
                
                @if(isset($data['legalLinks']) && $data['legalLinks'])
                    <p>
                        <a href="{{ $data['legalLinks']['terms'] ?? '#' }}">Conditions d'utilisation</a> | 
                        <a href="{{ $data['legalLinks']['privacy'] ?? '#' }}">Politique de confidentialité</a> |
                        <a href="{{ $data['legalLinks']['security'] ?? '#' }}">Sécurité</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>