<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? 'Votre Newsletter' }}</title>
    <style>
        /* Styles de base pour l'e-mail */
        body { font-family: sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .header { text-align: center; padding-bottom: 20px; border-bottom: 1px solid #eee; }
        .header h1 { color: #0056b3; font-size: 24px; }
        .content { padding: 20px 0; }
        .footer { text-align: center; padding-top: 20px; border-top: 1px solid #eee; font-size: 0.9em; color: #666; }
        .footer a { color: #0056b3; text-decoration: none; }
        .button-link { display: inline-block; padding: 10px 20px; background-color: #007bff; color: #ffffff; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $subject ?? 'Nouvelle Communication' }}</h1>
        </div>

        <div class="content">
            {{-- Salutation personnalisée --}}
            <p>Bonjour {{ $subscriber->name ?? 'abonné' }},</p>
            <br>
            {{-- Contenu de la newsletter inséré --}}
            {!! nl2br(e($newsletterContent)) !!} {{-- nl2br pour les sauts de ligne, e() pour échapper le HTML --}}
            <br><br>
            <p>Cordialement,</p>
            <p>[Votre Nom/Nom de l'entreprise]</p>
        </div>

        <div class="footer">
            <p>Cet e-mail vous a été envoyé par [Votre Nom/Nom de l'entreprise].</p>
            {{-- Le lien de désabonnement --}}
            @isset($unsubscribeUrl)
                <p>Si vous ne souhaitez plus recevoir nos e-mails, vous pouvez vous <a href="{{ $unsubscribeUrl }}">désabonner ici</a>.</p>
            @endisset
            <p>&copy; {{ date('Y') }} [Votre Nom/Nom de l'entreprise]. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>