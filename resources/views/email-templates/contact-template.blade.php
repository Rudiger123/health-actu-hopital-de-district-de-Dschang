<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; }
        .header { background-color: #4f46e5; padding: 20px; text-align: center; }
        .header img { max-width: 150px; }
        .content { padding: 25px; background: #f9fafb; }
        .footer { padding: 15px; text-align: center; font-size: 12px; color: #6b7280; }
        .card { background: white; border-radius: 8px; padding: 20px; margin: 15px 0; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .label { font-weight: 600; color: #4f46e5; margin-bottom: 5px; display: block; }
        .value { margin-bottom: 15px; }
        .button { display: inline-block; padding: 10px 20px; background-color: #4f46e5; color: white; text-decoration: none; border-radius: 6px; font-weight: 500; }
        .logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">HRA de Dschang</div>
    </div>
    
    <div class="content">
        <h2 style="color: #4f46e5;">Nouveau message recu !</h2>
        <p>Bonjour Administrateur,</p>
        <p>Un visiteur a soumis ses informations via le formulaire de contact :</p>
        
        <div class="card">
            <span class="label">📌 Sujet</span>
            <p class="value"> {{ $data['subject'] }} </p>
            
            <span class="label">👤 Nom complet</span>
            <p class="value">{{ $data['name'] }}</p>
            
            <span class="label">✉️ Email</span>
            <p class="value">{{ $data['email'] }}</p>
            
            <span class="label">📞 Telephone</span>
            <p class="value">{{ $data['phone'] }}</p>
            
            <span class="label">📝 Message</span>
            <p class="value" style="background: #f3f4f6; padding: 10px; border-radius: 4px;">
                {{ $data['message'] }}
            </p>
        </div>
        
        <div style="text-align: center; margin: 25px 0;">
            <a href="https://votre-site.com/admin/messages" class="button">Voir dans l'interface admin</a>
        </div>
        
        <p>Merci de répondre dans les 24 heures pour une experience client optimale.</p>
    </div>
    
    <div class="footer">
        <p>© 2023 Votre Entreprise. Tous droits reserves.</p>
        <p>
            <a href="#" style="color: #6b7280; text-decoration: none;">Parametres de notification</a> • 
            <a href="#" style="color: #6b7280; text-decoration: none;">Aide</a>
        </p>
    </div>
</body>
</html>