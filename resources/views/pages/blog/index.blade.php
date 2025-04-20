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
        $image1 = 'assets/img/departments-1.jpg';
        $titel1 = 'Les Dernières Avancées Médicales';
        $text1 =
            'Découvrez les nouvelles technologies et innovations dans le domaine médical qui améliorent la qualité des soins et le confort des patients.';

        $image2 = 'assets/img/departments-2.jpg';
        $titel2 = 'Conseils Santé & Prévention';
        $text2 =
            "Nos experts partagent des conseils pratiques pour adopter un mode de vie sain et prévenir les maladies les plus courantes.";

        $image3 = 'assets/img/departments-3.jpg';
        $titel3 = 'Témoignages de Patients';
        $text3 =
            'Lisez les histoires inspirantes de nos patients qui ont retrouvé la santé grâce aux soins prodigués par nos équipes médicales.';
    @endphp


        {{-- hero section  --}}
        <x-layouts.hero :image1="$image1" :image2="$image2" :image3="$image3" :text1="$text1" :text2="$text2"
            :text3="$text3" :titel1="$titel1" :titel2="$titel2" :titel3="$titel3"></x-layouts.hero>
        {{-- end hero section --}}

        <!-- Blog Hero Section -->
        <section id="blog-hero" class="blog-hero section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="blog-grid">

                    <article class="blog-item" data-aos="fade-up" data-aos-delay="200">
                        <img src="assets/img/blog/blog-post-1.webp" alt="Blog Image" class="img-fluid">
                        <div class="blog-content">
                            <div class="post-meta">
                                <span class="date">Jan. 10th, 2025</span>
                                <span class="category">Santé Mentale</span>
                            </div>
                            <h3 class="post-title">
                                <a href="blog-details.html"
                                    title="L'Importance de la Santé Mentale dans nos Vies">L'Importance de la Santé Mentale
                                    dans nos Vies</a>
                            </h3>
                        </div>
                    </article><!-- End Blog Item -->

                    <article class="blog-item" data-aos="fade-up" data-aos-delay="300">
                        <img src="assets/img/blog/blog-post-2.webp" alt="Blog Image" class="img-fluid">
                        <div class="blog-content">
                            <div class="post-meta">
                                <span class="date">Jan. 15th, 2025</span>
                                <span class="category">Nutrition</span>
                            </div>
                            <h3 class="post-title">
                                <a href="blog-details.html" title="Manger Sainement : Un Guide Pratique">Manger Sainement :
                                    Un Guide Pratique</a>
                            </h3>
                        </div>
                    </article><!-- End Blog Item -->

                    <article class="blog-item" data-aos="fade-up" data-aos-delay="400">
                        <img src="assets/img/blog/blog-post-3.webp" alt="Blog Image" class="img-fluid">
                        <div class="blog-content">
                            <div class="post-meta">
                                <span class="date">Jan. 20th, 2025</span>
                                <span class="category">Technologie Médicale</span>
                            </div>
                            <h3 class="post-title">
                                <a href="blog-details.html" title="Les Nouvelles Technologies au Service de la Santé">Les
                                    Nouvelles Technologies au Service de la Santé</a>
                            </h3>
                        </div>
                    </article><!-- End Blog Item -->

                </div>

            </div>

        </section><!-- /Blog Hero Section -->


        <!-- Featured Posts Section -->
        <section id="featured-posts" class="featured-posts section">

            <!-- Section Title -->
            <div class="container section-title-1" data-aos="fade-up">
                <h2>Actualités Médicales</h2>
                <div><span>Découvrez nos</span> <span class="description-title">articles incontournables</span></div>
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
                                    <img src="{{ asset("storage/".$post->image_path) }}" alt="Médecine de demain">
                                    <div class="blog-post-content">
                                        <div class="post-meta">
                                            <span><i class="bi bi-person"></i> {{ $post->author->name }}</span>
                                            <span>
                                                <i class="bi bi-clock"></i>
                                                {{ $post->created_at->format('d F Y \à H:i') }}
                                              </span>                                              
                                            <span><i class="bi bi-chat-dots"></i> 12 Commentaires</span>
                                        </div>
                                        <h2>  <a href="#">{{ $post->title }}</a></h2>
                                        <p>{{ $post->content }}</p>
                                        <a href="{{ route('blog.show', $post->slug) }}" class="read-more">Lire plus <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div><!-- End slide item -->
                        @endforeach

                        < </div>
                    </div>
                </div>
        </section><!-- /Featured Posts Section -->

        {{-- <!-- Category Section Section -->
        <section id="category-section" class="category-section section">

            <!-- Section Title -->
            <div class="container section-title-1" data-aos="fade-up">
                <h2>Actualités & Santé</h2>
                <div> <span class="description-title">Restez informé avec nos experts médicaux</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <!-- Featured Posts -->
                <div class="row gy-4 mb-4">
                    <div class="col-lg-4">
                        <article class="featured-post">
                            <div class="post-img">
                                <img src="assets/img/blog/blog-post-2.webp" alt="Recherche Médicale" class="img-fluid"
                                    loading="lazy">
                            </div>
                            <div class="post-content">
                                <div class="category-meta">
                                    <span class="post-category">Recherche Médicale</span>
                                    <div class="author-meta">
                                        <img src="assets/img/blog/blog-post-2.webp" alt="Dr. Sophie B." class="author-img">
                                        <span class="author-name">Dr. Sophie B.</span>
                                        <span class="post-date">28 Février 2025</span>
                                    </div>
                                </div>
                                <h2 class="title">
                                    <a href="blog-details.html">Les avancées révolutionnaires dans le traitement des
                                        maladies cardiaques</a>
                                </h2>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-4">
                        <article class="featured-post">
                            <div class="post-img">
                                <img src="assets/img/blog/blog-post-2.webp" alt="Santé Mentale" class="img-fluid"
                                    loading="lazy">
                            </div>
                            <div class="post-content">
                                <div class="category-meta">
                                    <span class="post-category">Santé Mentale</span>
                                    <div class="author-meta">
                                        <img src="assets/img/blog/blog-post-2.webp" alt="Dr. Paul M." class="author-img">
                                        <span class="author-name">Dr. Paul M.</span>
                                        <span class="post-date">10 Mars 2025</span>
                                    </div>
                                </div>
                                <h2 class="title">
                                    <a href="blog-details.html">Comment réduire le stress au quotidien : conseils de
                                        spécialistes</a>
                                </h2>
                            </div>
                        </article>
                    </div>

                    <div class="col-lg-4">

                        <article class="featured-post">
                            <div class="post-img">
                                <img src="assets/img/blog/blog-post-2.webp" alt="Pédiatrie" class="img-fluid"
                                    loading="lazy">
                            </div>
                            <div class="post-content">
                                <div class="category-meta">
                                    <span class="post-category">Pédiatrie</span>
                                    <div class="author-meta">
                                        <img src="assets/img/person/doctor-3.webp" alt="Dr. Alice N." class="author-img">
                                        <span class="author-name">Dr. Alice N.</span>
                                        <span class="post-date">5 Avril 2025</span>
                                    </div>
                                </div>
                                <h2 class="title">
                                    <a href="blog-details.html">Vaccination infantile : Ce que chaque parent doit
                                        savoir</a>
                                </h2>
                            </div>
                        </article>

                    </div>
                </div>

                <!-- List Posts -->
                <div class="row">
                    <div class="col-xl-4 col-lg-6">
                        @foreach (range(1, 3) as $loop)
                            <article class="list-post">
                                <div class="post-img">
                                    <img src="assets/img/blog/blog-post-3.webp" alt="Diabète" class="img-fluid"
                                        loading="lazy">
                                </div>
                                <div class="post-content">
                                    <div class="category-meta">
                                        <span class="post-category">Diabétologie</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="blog-details.html">Nouveaux traitements pour mieux vivre avec le
                                            diabète</a>
                                    </h3>
                                    <div class="post-meta">
                                        <span class="read-time">3 mins de lecture</span>
                                        <span class="post-date">20 Mars 2025</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="col-xl-4 col-lg-6">
                        @foreach (range(1, 3) as $loop)
                            <article class="list-post">
                                <div class="post-img">
                                    <img src="assets/img/blog/blog-post-2.webp" alt="Covid-19" class="img-fluid"
                                        loading="lazy">
                                </div>
                                <div class="post-content">
                                    <div class="category-meta">
                                        <span class="post-category">Prévention</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="blog-details.html">Covid-19 : les gestes barrières toujours
                                            d’actualité</a>
                                    </h3>
                                    <div class="post-meta">
                                        <span class="read-time">2 mins de lecture</span>
                                        <span class="post-date">12 Avril 2025</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="col-xl-4 col-lg-6">
                        @foreach (range(1, 3) as $loop)
                            <article class="list-post">
                                <div class="post-img">
                                    <img src="assets/img/blog/blog-post-3.webp" alt="Nutrition" class="img-fluid"
                                        loading="lazy">
                                </div>
                                <div class="post-content">
                                    <div class="category-meta">
                                        <span class="post-category">Nutrition</span>
                                    </div>
                                    <h3 class="title">
                                        <a href="blog-details.html">Les 5 super-aliments à intégrer dans votre
                                            alimentation</a>
                                    </h3>
                                    <div class="post-meta">
                                        <span class="read-time">3 mins de lecture</span>
                                        <span class="post-date">28 Avril 2025</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>

        </section><!-- /Category Section Section --> --}}

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
                        <img src="assets/img/misc/misc-1.webp" alt="Actualités Médicales" class="img-fluid rounded-4">
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
                <div><span>Découvrez Nos</span> <span class="description-title">Dernières Actualités Médicales</span></div>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                @livewire('front.post-view')
            </div>

        </section><!-- /Latest Posts Section -->

        <x-elements.newsletter></x-elements.newsletter>

    </main>
@endsection
