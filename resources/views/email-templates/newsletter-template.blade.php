<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title ?? 'Nouvel article de blog' }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            background-color: #f5f6fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }

        .header {
            text-align: center;
            padding-bottom: 25px;
            border-bottom: 2px solid #e8f0fe;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #1a73e8;
            font-size: 24px;
            margin: 0;
            font-weight: 600;
        }

        .content {
            padding: 20px 0;
            color: #34495e;
        }

        .content h2 {
            color: #1a73e8;
            font-size: 20px;
            margin-top: 0;
        }

        .content p {
            margin-bottom: 20px;
            font-size: 16px;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #1a73e8;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            margin: 10px 0;
        }

        .button:hover {
            background-color: #1557b0;
        }

        .footer {
            text-align: center;
            padding-top: 25px;
            border-top: 2px solid #e8f0fe;
            font-size: 14px;
            color: #7f8c8d;
            margin-top: 25px;
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
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ $post->title ?? 'Découvrez notre dernier article !' }}</h1>
        </div>

        <div class="content">
            <p>Bonjour,</p>
            <p>Nous avons un nouvel article passionnant sur notre blog !</p>

            @isset($post)
                <h2>{{ $post->title }}</h2>
                <p>{{ Str::limit($post->content, 200) }}</p>
                <p><a href="{{ route('blog.show', ['slug' => $post->slug]) }}" class="button">Lire l'article complet</a></p>
            @else
                <p>Découvrez les dernières nouveautés sur notre site !</p>
                <p><a href="{{ route('home') }}" class="button">Visiter notre site</a></p>
            @endisset
        </div>

        <div class="footer">
            <p>Cet e-mail a été envoyé par [Votre Nom/Nom de l'entreprise].</p>
            @isset($unsubscribeUrl)
                <p class="unsubscribe">Si vous ne souhaitez plus recevoir nos e-mails, vous pouvez vous <a
                        href="{{ $unsubscribeUrl }}">désabonner ici</a>.</p>
            @endisset
            <p class="copyright">&copy; {{ date('Y') }} [Votre Nom/Nom de l'entreprise]. Tous droits réservés.</p>
        </div>
    </div>
</body>

</html>
