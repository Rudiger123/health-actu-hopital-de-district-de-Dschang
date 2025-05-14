@extends('layouts.app')


@section('content')
    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main-1.css') }}">
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/js/main-1.js') }}"></script>
    @endpush

    <main class="main">

        @php
            $image1 = 'assets/img/IMG-20250509-WA0009.jpg';
            $titel1 = 'Les Dernières Avancées Médicales';
            $text1 =
                'Découvrez les nouvelles technologies et innovations dans le domaine médical qui améliorent la qualité des soins et le confort des patients.';

            $image2 = 'assets/img/IMG-20250509-WA0009.jpg';
            $titel2 = 'Conseils Santé & Prévention';
            $text2 =
                'Nos experts partagent des conseils pratiques pour adopter un mode de vie sain et prévenir les maladies les plus courantes.';

            $image3 = 'assets/img/IMG-20250509-WA0009.jpg';
            $titel3 = 'Témoignages de Patients';
            $text3 =
                'Lisez les histoires inspirantes de nos patients qui ont retrouvé la santé grâce aux soins prodigués par nos équipes médicales.';
        @endphp


        {{-- hero section  --}}
        <x-layouts.hero :image1="$image1" :image2="$image2" :image3="$image3" :text1="$text1" :text2="$text2"
            :text3="$text3" :titel1="$titel1" :titel2="$titel2" :titel3="$titel3"></x-layouts.hero>
        {{-- end hero section --}}

        <!-- Blog Hero Section - Message Fondateur -->
        <section id="blog-hero" class="blog-hero mission-section">

            <div class="container" data-aos="fade-up">
                <div class="mission-statement">
                    <!-- Carte Principale -->
                    <div class="mission-card" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pulse-effect"></div>
                        <img src="assets/img/IMG-20250509-WA0033.jpg" alt="Notre équipe médicale" class="mission-hero-img">

                        <div class="mission-content">
                            <div class="icon-container">
                                <i class="bi bi-heart-pulse-fill heartbeat-anim"></i>
                            </div>
                            <h2 class="mission-title">Votre Santé, Notre Engagement</h2>
                            <p class="mission-text">
                                Ce blog incarne notre promesse : <span class="highlight">transmettre un savoir médical
                                    fiable</span>,
                                <span class="highlight">éclairer vos choix de santé</span> et
                                <span class="highlight">créer un dialogue bienveillant</span> entre soignants et patients.
                            </p>

                            <div class="mission-pillars">
                                <!-- Pilier 1 -->
                                <div class="pillar" data-aos="fade-right" data-aos-delay="200">
                                    <div class="pillar-icon">
                                        <i class="bi bi-lightbulb-fill"></i>
                                    </div>
                                    <h3>Éclairer</h3>
                                    <p>Décryptage des enjeux santé sans jargon</p>
                                </div>

                                <!-- Pilier 2 -->
                                <div class="pillar" data-aos="fade-right" data-aos-delay="300">
                                    <div class="pillar-icon">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <h3>Accompagner</h3>
                                    <p>Conseils pratiques pour votre bien-être</p>
                                </div>

                                <!-- Pilier 3 -->
                                <div class="pillar" data-aos="fade-right" data-aos-delay="400">
                                    <div class="pillar-icon">
                                        <i class="bi bi-search-heart-fill"></i>
                                    </div>
                                    <h3>Innover</h3>
                                    <p>Avancées médicales expliquées simplement</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bandeau Engagements -->
                    <div class="commitment-band" data-aos="fade-up" data-aos-delay="500">
                        <div class="commitment-item">
                            <span class="commitment-number">100%</span>
                            <span class="commitment-text">Informations validées par nos experts</span>
                        </div>
                        <div class="commitment-separator"></div>
                        <div class="commitment-item">
                            <span class="commitment-number">0</span>
                            <span class="commitment-text">Articles sponsorisés</span>
                        </div>
                        <div class="commitment-separator"></div>
                        <div class="commitment-item">
                            <span class="commitment-number">∞</span>
                            <span class="commitment-text">Détermination à vous informer</span>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <style>
            /* Section Mission */
            .mission-section {
                background: linear-gradient(135deg, #f8f9fa 0%, #e9f5ff 100%);
                padding: 5rem 0;
                position: relative;
                overflow: hidden;
            }

            .mission-card {
                background: white;
                border-radius: 20px;
                box-shadow: 0 15px 30px rgba(0, 98, 204, 0.1);
                overflow: hidden;
                position: relative;
                max-width: 1200px;
                margin: 0 auto;
            }

            .pulse-effect {
                position: absolute;
                width: 100%;
                height: 100%;
                background: radial-gradient(circle at center, rgba(0, 123, 255, 0.1) 0%, transparent 70%);
                animation: pulse 8s infinite;
                z-index: 0;
            }

            @keyframes pulse {
                0% {
                    transform: scale(0.95);
                    opacity: 0.7;
                }

                50% {
                    transform: scale(1.05);
                    opacity: 0.3;
                }

                100% {
                    transform: scale(0.95);
                    opacity: 0.7;
                }
            }

            .mission-hero-img {
                width: 100%;
                height: 300px;
                object-fit: cover;
                object-position: center;
            }

            .mission-content {
                padding: 3rem;
                position: relative;
                z-index: 1;
            }

            .icon-container {
                width: 80px;
                height: 80px;
                background: #007bff;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: -70px auto 2rem auto;
                box-shadow: 0 10px 20px rgba(0, 123, 255, 0.3);
            }

            .heartbeat-anim {
                color: white;
                font-size: 2.5rem;
                animation: heartbeat 1.5s infinite;
            }

            @keyframes heartbeat {
                0% {
                    transform: scale(1);
                }

                25% {
                    transform: scale(1.1);
                }

                50% {
                    transform: scale(1);
                }

                75% {
                    transform: scale(1.1);
                }

                100% {
                    transform: scale(1);
                }
            }

            .mission-title {
                text-align: center;
                color: #2c3e50;
                font-weight: 700;
                margin-bottom: 1.5rem;
                font-size: 2.5rem;
            }

            .mission-text {
                text-align: center;
                font-size: 1.2rem;
                line-height: 1.6;
                color: #555;
                max-width: 800px;
                margin: 0 auto 3rem auto;
            }

            .highlight {
                color: #007bff;
                font-weight: 600;
            }

            .mission-pillars {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
                margin-top: 3rem;
            }

            .pillar {
                text-align: center;
                padding: 2rem;
                border-radius: 15px;
                transition: transform 0.3s, box-shadow 0.3s;
            }

            .pillar:hover {
                transform: translateY(-10px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            }

            .pillar-icon {
                width: 70px;
                height: 70px;
                background: linear-gradient(135deg, #007bff 0%, #00b4ff 100%);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem auto;
                color: white;
                font-size: 1.8rem;
            }

            .commitment-band {
                display: flex;
                justify-content: space-around;
                background: white;
                border-radius: 15px;
                padding: 2rem;
                margin-top: 3rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            }

            .commitment-item {
                text-align: center;
                flex: 1;
            }

            .commitment-number {
                display: block;
                font-size: 2.5rem;
                font-weight: 700;
                color: #007bff;
                line-height: 1;
            }

            .commitment-text {
                font-size: 1rem;
                color: #555;
                margin-top: 0.5rem;
            }

            .commitment-separator {
                width: 1px;
                background: #eee;
                margin: 0 1rem;
            }
        </style>


        <!-- Featured Posts Section -->
        <section id="featured-posts" class="featured-posts section">

            <!-- Section Title -->
            <div class="container section-title-1" data-aos="fade-up">
                <h2>Actualités Médicales</h2>
                <div><span class="description-title" style="color: #007bff;">Découvrez nos articles incontournables</span>
                </div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="blog-posts-slider swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 800,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 3,
              "spaceBetween": 30,
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 20
                },
                "768": {
                  "slidesPerView": 2,
                  "spaceBetween": 20
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 30
                }
              }
            }
          </script>
                    <div class="swiper-wrapper">

                        @foreach ($posts as $post)
                            <div class="swiper-slide">
                                <div class="blog-post-item">
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Médecine de demain">
                                    <div class="blog-post-content">
                                        <div class="post-meta">
                                            <span><i class="bi bi-person"></i> {{ $post->author->name }}</span>
                                            <span>
                                                <i class="bi bi-clock"></i>
                                                {{ $post->created_at->format('d F Y \à H:i') }}
                                            </span>
                                            <span><i class="bi bi-chat-dots"></i> {{ $post->comments()->count() }}
                                                Commentaires </span>
                                        </div>
                                        <h2> <a href="{{ route('blog.show', $post->slug) }}">
                                                {{ Str::words($post->title, 5, '...') }}</a></h2>
                                        <p>{{ $post->content }}</p>
                                        <a href="{{ route('blog.show', $post->slug) }}" class="read-more">Lire plus <i
                                                class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div><!-- End slide item -->
                        @endforeach

                        < </div>
                    </div>
                </div>
        </section><!-- /Featured Posts Section -->

        <!-- Call To Action 2 Section -->
        <section id="appel-a-laction-blog" class="call-to-action-2 section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="advertise-1 d-flex flex-column flex-lg-row gap-4 align-items-center position-relative">

                    <div class="content-left flex-grow-1" data-aos="fade-right" data-aos-delay="200">
                        <span class="badge text-uppercase mb-2">Ne Manquez Rien !</span>
                        <h2>Plongez au Cœur de l'Information Médicale Locale</h2>
                        <p class="my-4">Votre source fiable pour les dernières actualités de santé, les avancées
                            médicales et les événements marquants de l'Hôpital Annexe. Restez informé pour mieux prendre
                            soin de vous et de vos proches.</p>
                    </div>

                    <div class="content-right position-relative" data-aos="fade-left" data-aos-delay="300">
                        <img src="assets/img/IMG-20250509-WA0024.jpg" alt="Actualités Médicales"
                            class="img-fluid rounded-4 w-24 h-10">
                        <div class="floating-card">
                            <div class="card-icon">
                                <i class="bi bi-newspaper"></i> <!-- Icône de journal pour plus de pertinence -->
                            </div>
                            <div class="card-content">
                                <span class="stats-number">100%</span>
                                <span class="stats-text">Actualités Vérifiées</span>
                            </div>
                        </div>
                    </div>

                    <div class="decoration">
                        <div class="circle-1"></div>
                        <div class="circle-2"></div>
                    </div>

                </div>

            </div>

        </section><!-- /Call To Action 2 Section -->


        <!-- Latest Posts Section -->
        <section id="latest-posts" class="latest-posts section">

            <!-- Section Title -->
            <div class="container section-title-1" data-aos="fade-up">
                <h2>Nos Derniers Articles</h2>
                <div><span class="description-title" style="color: #007bff;">Découvrez Nos Dernières Actualités
                        Médicales</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                @livewire('front.post-view')
            </div>

        </section><!-- /Latest Posts Section -->

        @livewire('blog.newsletter-form')

    </main>
@endsection
