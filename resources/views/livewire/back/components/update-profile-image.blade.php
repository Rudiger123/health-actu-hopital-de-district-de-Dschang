
    <!-- Colonne de Profil -->
    <div class="col-lg-4" style="background-color:white">
        <div class="profile-card text-center p-4">
            <div class="avatar-container mb-4" style="position: relative; display: inline-block;">
                <img src="{{ "/storage/".$user->picture ?? asset('back/assets/img/avatars/1.png') }}" 
                     style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #f0f0f0;">
            </div>
            <h3 class="profile-name"> {{ $user->name }} </h3>
            <p class="profile-email text-muted">  {{ $user->email }} </p>
            <div class="profile-badge">  {{ $user->type }} </div>
    
            <div class="profile-stats mt-4" style="display: flex; justify-content: center; gap: 20px;">
                @php
                $count = 0;
                $like = 0;

                foreach ($user->posts as $post) {
                    $count = $count + $post->comments()->count();
                    foreach ($post->comments as $comment) {
                        $like = $like + $comment->likes()->count();
                    }
                }
            @endphp
                <div class="stat-item">
                    <div class="stat-number" style="font-weight: bold; font-size: 18px;">{{ $user->posts()->count() }}</div>
                    <div class="stat-label" style="font-size: 14px; color: #6c757d;">Articles</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number" style="font-weight: bold; font-size: 18px;">{{$count}}</div>
                    <div class="stat-label" style="font-size: 14px; color: #6c757d;">Commentaires</div>
                </div>
            </div>
            <div class="social-links mt-4">
                <h5 class="section-title" style="font-size: 16px; margin-bottom: 12px;">Réseaux Sociaux</h5>
                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ $socialLinks->facebook }}" style="width: 36px; height: 36px; border-radius: 50%; background-color: #3b5998; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="bx bxl-facebook"></i></a>
                    <a href="{{ $socialLinks->twitter}}" style="width: 36px; height: 36px; border-radius: 50%; background-color: #1da1f2; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="bx bxl-twitter"></i></a>
                    <a href="{{ $socialLinks->instagram }}" style="width: 36px; height: 36px; border-radius: 50%; background-color: #e1306c; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="bx bxl-instagram"></i></a>
                    <a href="{{ $socialLinks->linkedin }}" style="width: 36px; height: 36px; border-radius: 50%; background-color: #0077b5; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
   
