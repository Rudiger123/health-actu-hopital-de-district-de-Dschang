<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $subject ?? 'Votre Newsletter' }}</title>
    <style>
        /* Reset pour compatibilité email */
        * { box-sizing: border-box; }
        body, table, td, p, h1, h2, h3 { margin: 0; padding: 0; }
        
        /* Styles de base pour l'e-mail */
        body { 
            font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; 
            line-height: 1.6; 
            color: #333333; 
            background-color: #f4f4f4;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        
        .email-wrapper {
            background-color: #f4f4f4;
            padding: 20px 0;
            min-height: 100vh;
        }
        
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
            padding: 0;
            border-radius: 8px; 
            background-color: #ffffff; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            overflow: hidden;
        }
        
        .header { 
            text-align: center; 
            padding: 30px 20px; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
        }
        
        .header h1 { 
            color: #ffffff; 
            font-size: 28px; 
            font-weight: 600;
            margin: 0;
            text-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        
        .content { 
            padding: 30px 25px; 
        }
        
        .content p {
            margin-bottom: 16px;
            font-size: 16px;
            line-height: 1.7;
        }
        
        .content p:last-child {
            margin-bottom: 0;
        }
        
        .greeting {
            font-size: 18px;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        
        .newsletter-content {
            background-color: #f8f9fa;
            padding: 25px;
            border-radius: 6px;
            border-left: 4px solid #007bff;
            margin: 25px 0;
        }
        
        .signature {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }
        
        .signature p {
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .footer { 
            text-align: center; 
            padding: 25px 20px; 
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef; 
            font-size: 14px; 
            color: #6c757d; 
        }
        
        .footer p {
            margin-bottom: 10px;
        }
        
        .footer a { 
            color: #007bff; 
            text-decoration: none; 
            font-weight: 500;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        .button-link { 
            display: inline-block; 
            padding: 12px 24px; 
            background-color: #007bff; 
            color: #ffffff !important; 
            text-decoration: none; 
            border-radius: 6px; 
            font-weight: 600;
            font-size: 16px;
            margin: 15px 0;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 123, 255, 0.3);
        }
        
        .button-link:hover {
            background-color: #0056b3;
        }
        
        .divider {
            height: 1px;
            background-color: #e9ecef;
            margin: 25px 0;
        }
        
        .company-info {
            font-weight: 600;
            color: #495057;
        }
        
        .unsubscribe-section {
            margin: 15px 0;
            padding: 15px;
            background-color: #fff3cd;
            border-radius: 4px;
            border-left: 3px solid #ffc107;
        }
        
        /* Responsive */
        @media screen and (max-width: 600px) {
            .email-wrapper {
                padding: 10px;
            }
            
            .container {
                margin: 0;
            }
            
            .header {
                padding: 25px 15px;
            }
            
            .header h1 {
                font-size: 24px;
            }
            
            .content {
                padding: 25px 15px;
            }
            
            .newsletter-content {
                padding: 20px;
            }
            
            .footer {
                padding: 20px 15px;
            }
        }
        
        /* Styles pour Outlook */
        @media screen and (-webkit-min-device-pixel-ratio: 0) {
            .button-link {
                background-image: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="container">
            <div class="header">
                <h1>{{ $subject ?? '📧 Newsletter' }}</h1>
            </div>

            <div class="content">
                {{-- Salutation personnalisée --}}
                <div class="greeting">
                    Bonjour {{ $subscriber->name ?? 'cher abonné' }},
                </div>
                
                {{-- Contenu principal de la newsletter --}}
                <div class="newsletter-content">
                    @if(isset($newsletterContent))
                        @if($allowHtml ?? false)
                            {!! nl2br($newsletterContent) !!}
                        @else
                            {!! nl2br(e($newsletterContent)) !!}
                        @endif
                    @else
                        <p>Contenu de la newsletter à venir...</p>
                    @endif
                </div>

                {{-- Bouton d'action optionnel --}}
                @isset($actionButton)
                    <div style="text-align: center; margin: 25px 0;">
                        <a href="{{ $actionButton['url'] }}" class="button-link">
                            {{ $actionButton['text'] }}
                        </a>
                    </div>
                @endisset

                <div class="divider"></div>

                {{-- Signature --}}
                <div class="signature">
                    <p>Cordialement,</p>
                    <p class="company-info">
                        {{ $companyName ?? config('app.name', '[Votre Nom/Nom de l\'entreprise]') }}
                    </p>
                    @isset($companyWebsite)
                        <p><a href="{{ $companyWebsite }}" style="color: #007bff;">{{ $companyWebsite }}</a></p>
                    @endisset
                </div>
            </div>

            <div class="footer">
                <p class="company-info">
                    {{ $companyName ?? config('app.name', '[Votre Nom/Nom de l\'entreprise]') }}
                </p>
                
                @isset($companyAddress)
                    <p>{{ $companyAddress }}</p>
                @endisset

                {{-- Le lien de désabonnement --}}
                @isset($unsubscribeUrl)
                    <div class="unsubscribe-section">
                        <p style="margin: 0; font-size: 13px;">
                            <strong>Gérer vos préférences :</strong><br>
                            Si vous ne souhaitez plus recevoir nos emails, vous pouvez vous 
                            <a href="{{ $unsubscribeUrl }}">désabonner ici</a>.
                        </p>
                    </div>
                @endisset
                
                <p style="font-size: 12px; color: #868e96; margin-top: 20px;">
                    &copy; {{ date('Y') }} {{ $companyName ?? config('app.name', '[Votre entreprise]') }}. 
                    Tous droits réservés.
                </p>
            </div>
        </div>
    </div>
</body>
</html>