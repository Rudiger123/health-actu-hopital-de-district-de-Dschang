<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title ?? 'Nouvel article de blog' }}</title>
    <style>
        /* Reset CSS pour compatibilité email */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            background-color: #f5f6fa;
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 0;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            /* Amélioration pour les clients mail */
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        .header {
            text-align: center;
            padding: 30px 25px 25px;
            border-bottom: 2px solid #e8f0fe;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
        }

        .header h1 {
            color: #ffffff;
            font-size: 24px;
            margin: 0;
            font-weight: 600;
            text-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .content {
            padding: 30px 25px;
            color: #34495e;
        }

        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .intro {
            font-size: 16px;
            margin-bottom: 25px;
            color: #5a6c7d;
        }

        .content h2 {
            color: #1a73e8;
            font-size: 22px;
            margin: 25px 0 15px 0;
            line-height: 1.3;
        }

        .content p {
            margin-bottom: 18px;
            font-size: 16px;
            line-height: 1.7;
        }

        .excerpt {
            background-color: #f8f9fa;
            padding: 20px;
            border-left: 4px solid #1a73e8;
            margin: 20px 0;
            border-radius: 0 6px 6px 0;
            font-style: italic;
            color: #495057;
        }

        .button-container {
            text-align: center;
            margin: 30px 0;
        }

        .button {
            display: inline-block;
            padding: 14px 28px;
            background-color: #1a73e8;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(26, 115, 232, 0.3);
            /* Propriétés pour Outlook */
            mso-padding-alt: 0;
            mso-text-raise: 0;
        }

        .button:hover {
            background-color: #1557b0;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(26, 115, 232, 0.4);
        }

        .divider {
            height: 1px;
            background-color: #e9ecef;
            margin: 30px 0;
        }

        .social-message {
            background-color: #e8f4fd;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            text-align: center;
        }

        .social-message p {
            margin: 0;
            color: #1a73e8;
            font-weight: 500;
        }

        .footer {
            text-align: center;
            padding: 25px;
            border-top: 2px solid #e8f0fe;
            font-size: 14px;
            color: #7f8c8d;
            background-color: #f8f9fa;
        }

        .footer p {
            margin: 10px 0;
        }

        .footer a {
            color: #1a73e8;
            text-decoration: none;
            font-weight: 500;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .unsubscribe {
            margin: 15px 0;
            font-size: 13px;
        }

        .copyright {
            margin-top: 15px;
            font-size: 12px;
            color: #95a5a6;
        }

        /* Media Queries pour responsive */
        @media screen and (max-width: 600px) {
            .container {
                margin: 10px;
                border-radius: 8px;
            }
            
            .header, .content, .footer {
                padding: 20px 15px;
            }
            
            .header h1 {
                font-size: 20px;
            }
            
            .content h2 {
                font-size: 18px;
            }
            
            .button {
                padding: 12px 20px;
                font-size: 14px;
            }
        }

        /* Styles spécifiques pour Outlook */
        @media screen and (-webkit-min-device-pixel-ratio: 0) {
            .button {
                background-image: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ $post->title ?? '📖 Nouvel Article Disponible !' }}</h1>
        </div>

        <div class="content">
            <div class="greeting">
                Bonjour {{ $subscriberName ?? 'cher lecteur' }},
            </div>
            
            <div class="intro">
                Nous avons le plaisir de partager avec vous notre dernier article qui pourrait vous intéresser !
            </div>

            @isset($post)
                <h2>{{ $post->title }}</h2>
                
                <div class="excerpt">
                    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 180) }}
                </div>

                <div class="button-container">
                    <a href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="button">
                        📖 Lire l'article complet
                    </a>
                </div>

                <div class="divider"></div>

                <div class="social-message">
                    <p>
                        💡 Cet article vous a plu ? N'hésitez pas à le partager avec vos amis et collègues !
                    </p>
                </div>
            @else
                <p>Découvrez les dernières nouveautés sur notre site !</p>
                <div class="button-container">
                    <a href="{{ route('home') }}" class="button">Visiter notre site</a>
                </div>
            @endisset
        </div>

        <div class="footer">
            <p>
                <strong>{{ config('app.name', 'Notre Blog') }}</strong><br>
                Votre source d'informations et d'inspiration
            </p>
            
            @isset($unsubscribeUrl)
                <p class="unsubscribe">
                    Si vous ne souhaitez plus recevoir nos emails, vous pouvez vous 
                    <a href="{{ $unsubscribeUrl }}">désabonner ici</a>.
                </p>
            @endisset
            
            <p class="copyright">
                &copy; {{ date('Y') }} {{ config('app.name', 'Notre Blog') }}. Tous droits réservés.
            </p>
        </div>
    </div>
</body>

</html>