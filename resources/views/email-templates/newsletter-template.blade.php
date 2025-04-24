<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel article</title>
    <style>
        /* Base Styles */
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f7fafc;
            margin: 0;
            padding: 0;
        }
        
        /* Container */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        /* Header */
        .email-header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            padding: 30px 20px;
            text-align: center;
            color: white;
        }
        
        .logo {
            max-width: 150px;
            height: auto;
        }
        
        /* Content */
        .email-content {
            padding: 30px;
        }
        
        .article-card {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 25px;
            transition: transform 0.2s ease;
        }
        
        .article-card:hover {
            transform: translateY(-2px);
        }
        
        .article-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .article-body {
            padding: 20px;
        }
        
        .article-title {
            font-size: 22px;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 10px 0;
        }
        
        .article-excerpt {
            color: #64748b;
            margin-bottom: 15px;
        }
        
        /* Button */
        .cta-button {
            display: inline-block;
            background: #4f46e5;
            color: white !important;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 600;
            margin: 10px 0;
        }
        
        /* Footer */
        .email-footer {
            text-align: center;
            padding: 20px;
            background: #f1f5f9;
            color: #64748b;
            font-size: 14px;
        }
        
        .social-links {
            margin: 15px 0;
        }
        
        .social-icon {
            margin: 0 8px;
        }
        
        /* Responsive */
        @media screen and (max-width: 600px) {
            .email-content {
                padding: 20px;
            }
            
            .article-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <img src="https://votre-logo.com/logo-white.png" alt="[Nom du Blog]" class="logo">
            <h1 style="margin: 15px 0 0 0; font-size: 24px;">Nouvel article publié !</h1>
        </div>
        
        <!-- Content -->
        <div class="email-content">
            <p style="margin-top: 0;">Hello,</p>
            <p>Nous sommes ravis de partager avec vous notre dernier article :</p>
            
            <!-- Article Card -->
            <div class="article-card">
                <img src="{{ asset('/storage/'.$post->image_url)  }}" alt="{{ $post->title }}" class="article-image">
                <div class="article-body">
                    <h2 class="article-title">{{ $post->title }}</h2>
                    <p class="article-excerpt">{{ Str::words($post->content, 15, '...') }}</p>
                    <a href="{{ route('blog.show', $post->slug) }}" class="cta-button">Lire l'article</a>
                </div>
            </div>
            
            <p>Cet article a été  {{ $post->created_at->format('d F Y \à H:i') }}</p>
            <p>Bonne lecture !</p>
            
            <p style="margin-bottom: 0;">L'équipe ActuHealth</p>
        </div>
        
        <!-- Footer -->
        <div class="email-footer">
            <div class="social-links">
                <a href="[FB_LINK]" class="social-icon"><img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" width="24" alt="Facebook"></a>
                <a href="[TW_LINK]" class="social-icon"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" width="24" alt="Twitter"></a>
                <a href="[IG_LINK]" class="social-icon"><img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" width="24" alt="Instagram"></a>
            </div>
            <p>© [Année] [Nom du Blog]. Tous droits réservés.</p>
            <p>
                <a href="[LINK_UNSUBSCRIBE]" style="color: #64748b;">Se désabonner</a> | 
                <a href="[LINK_PREFERENCES]" style="color: #64748b;">Préférences</a>
            </p>
        </div>
    </div>
</body>
</html>