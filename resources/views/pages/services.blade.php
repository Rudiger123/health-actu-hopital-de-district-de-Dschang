@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/main-1.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/main-1.js') }}"></script>
@endpush

@section('content')
    <main class="main">

        @php
            $image1 = 'assets/img/departments-1.jpg';
            $titel1 = 'Services Médicaux Complets';
            $text1 =
                'Notre hôpital offre une gamme complète de services médicaux avec des équipements modernes et un personnel qualifié pour prendre soin de votre santé.';

            $image2 = 'assets/img/departments-2.jpg';
            $titel2 = 'Urgences 24h/24';
            $text2 =
                "Un service d'urgences médicales disponible en permanence avec une équipe réactive et des installations adaptées pour une prise en charge immédiate.";

            $image3 = 'assets/img/departments-3.jpg';
            $titel3 = 'Médecins Spécialisés';
            $text3 =
                'Des professionnels de santé expérimentés dans diverses spécialités médicales pour un diagnostic précis et un traitement personnalisé.';
        @endphp

        {{-- hero section  --}}
        <x-layouts.hero :image1="$image1" :image2="$image2" :image3="$image3" :text1="$text1" :text2="$text2"
            :text3="$text3" :titel1="$titel1" :titel2="$titel2" :titel3="$titel3"></x-layouts.hero>
        {{-- end hero section --}}



        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section">
            <div class="container">
                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-heart-pulse"></i></div>
                            <h4><a href="" class="stretched-link">Cardiologie</a></h4>
                            <p>Unité de cardiologie équipée d'ECG, échocardiographie et holter tensionnel</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-capsule"></i></div>
                            <h4><a href="" class="stretched-link">Pharmacie</a></h4>
                            <p>Approvisionnement garanti en médicaments essentiels et spécialisés</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-activity"></i></div> <!-- Alternative pour Urgences -->
                            <h4><a href="" class="stretched-link">Urgences</a></h4>
                            <p>SMUR 24h/24 avec équipe polyvalente et plateau technique complet</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-droplet"></i></div> <!-- Alternative pour Laboratoire -->
                            <h4><a href="" class="stretched-link">Laboratoire</a></h4>
                            <p>Biologie médicale certifiée ISO avec analyseurs automatisés</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>
            </div>
        </section><!-- /Featured Services Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section accent-background">
            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Urgence médicale ? Besoin d'aide immédiate ?</h3>
                            <p>En cas d'urgence vitale, composez immédiatement notre numéro d'urgence disponible 24h/24.
                                Notre équipe médicale est prête à intervenir à tout moment.</p>
                            <a class="cta-btn" href="tel:+237677894523">Appeler les urgences</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Call To Action Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>À Propos de Nous</h2>
                <p>Découvrez notre établissement de santé et notre engagement pour votre bien-être</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="Hôpital Régional Annexe de Dschang">
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
                    </div>
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>Un établissement de santé de référence dans la région</h3>
                        <p class="fst-italic">
                            L'Hôpital Régional Annexe de Dschang s'engage à fournir des soins de qualité accessibles à tous.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>Équipements médicaux modernes et performants</span>
                            </li>
                            <li><i class="bi bi-check2-all"></i> <span>Équipe médicale qualifiée et expérimentée</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>Services complets couvrant toutes les spécialités
                                    médicales principales</span></li>
                        </ul>
                        <p>
                            Fondé en 1985, notre hôpital n'a cessé de se développer pour répondre aux besoins de santé de la
                            population.
                            Nous mettons tout en œuvre pour offrir des soins personnalisés dans un environnement accueillant
                            et sécurisé.
                        </p>
                    </div>
                </div>
            </div>
        </section><!-- /About Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="fas fa-user-md flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Médecins</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="far fa-hospital flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Services</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="fas fa-flask flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Laboratoires</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="fas fa-award flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="28" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Certifications</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->
                </div>
            </div>
        </section><!-- /Stats Section -->

        <!-- Features Section -->
        <section id="features" class="features section">
            <div class="container">
                <div class="row justify-content-around gy-4">
                    <div class="features-image col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/features.jpg" alt="Équipements hospitaliers">
                    </div>

                    <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <h3>Des équipements médicaux de pointe</h3>
                        <p>Notre hôpital dispose des dernières technologies médicales pour assurer des diagnostics précis et
                            des traitements efficaces.</p>

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-person-heart flex-shrink-0"></i>
                            <div>
                                <h4><a href="" class="stretched-link">Soins personnalisés</a></h4>
                                <p>Une approche médicale centrée sur le patient avec un suivi individualisé</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-activity flex-shrink-0"></i>
                            <div>
                                <h4><a href="" class="stretched-link">Urgences 24h/24</a></h4>
                                <p>Service d'urgences médicales disponible en permanence avec une équipe dédiée</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-people-fill flex-shrink-0"></i>
                            <div>
                                <h4><a href="" class="stretched-link">Professionnels qualifiés</a></h4>
                                <p>Une équipe médicale expérimentée et régulièrement formée aux nouvelles pratiques</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
                            <i class="bi bi-shield-check flex-shrink-0"></i>
                            <div>
                                <h4><a href="" class="stretched-link">Hygiène stricte</a></h4>
                                <p>Protocoles d'hygiène rigoureux pour la sécurité des patients et du personnel</p>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                </div>
            </div>
        </section><!-- /Features Section -->


        <!-- Services Section -->
        <section id="services" class="services section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Nos Services</h2>
                <p>Découvrez l'ensemble de nos services médicaux spécialisés</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-heart-pulse"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Cardiologie</h3>
                            </a>
                            <p>Diagnostic et traitement des maladies cardiovasculaires avec équipements modernes</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-capsule"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Pharmacie</h3>
                            </a>
                            <p>Dispensation de médicaments et conseils pharmaceutiques personnalisés</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-hospital"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Hospitalisation</h3>
                            </a>
                            <p>Chambres individuelles avec tout le confort nécessaire pour votre rétablissement</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-droplet"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Laboratoire</h3>
                            </a>
                            <p>Analyses biologiques et tests diagnostiques avec résultats rapides et fiables</p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-person-bounding-box"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Rééducation</h3>
                            </a>
                            <p>Programmes de réadaptation fonctionnelle avec kinésithérapeutes expérimentés</p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-clipboard2-pulse"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Consultations</h3>
                            </a>
                            <p>Consultations spécialisées dans diverses disciplines médicales sur rendez-vous</p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div><!-- End Service Item -->
                </div>
            </div>
        </section><!-- /Services Section -->

        <!-- Tabs Section -->
        <section id="tabs" class="tabs section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Nos Départements</h2>
                <p>Explorez nos différents services spécialisés</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a id="nav-link" class="nav-link active show" data-bs-toggle="tab"
                                    href="#tabs-tab-1">Cardiologie</a>
                            </li>
                            <li class="nav-item">
                                <a id="nav-link" class="nav-link" data-bs-toggle="tab" href="#tabs-tab-2">Pédiatrie</a>
                            </li>
                            <li class="nav-item">
                                <a id="nav-link" class="nav-link" data-bs-toggle="tab" href="#tabs-tab-3">Chirurgie</a>
                            </li>
                            <li class="nav-item">
                                <a id="nav-link" class="nav-link" data-bs-toggle="tab" href="#tabs-tab-4">Maternité</a>
                            </li>
                            <li class="nav-item">
                                <a id="nav-link" class="nav-link" data-bs-toggle="tab" href="#tabs-tab-5">Imagerie</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-tab-1">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Cardiologie</h3>
                                        <p class="fst-italic">Un département équipé pour le diagnostic et le traitement des
                                            maladies cardiovasculaires</p>
                                        <p>Notre service de cardiologie dispose d'équipements de pointe pour les examens
                                            cardiaques (ECG, échocardiographie, tests d'effort). Notre équipe de
                                            cardiologues expérimentés prend en charge les pathologies cardiaques avec une
                                            approche personnalisée.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-1.jpg" alt="Service de cardiologie"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-tab-2">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Pédiatrie</h3>
                                        <p class="fst-italic">Un environnement adapté aux plus jeunes patients</p>
                                        <p>Notre département pédiatrique offre des soins spécialisés pour les enfants, de la
                                            naissance à l'adolescence. L'équipe pédiatrique est formée pour répondre aux
                                            besoins spécifiques des enfants dans un cadre chaleureux et rassurant.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-2.jpg" alt="Service de pédiatrie"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-tab-3">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Chirurgie</h3>
                                        <p class="fst-italic">Blocs opératoires équipés pour diverses interventions</p>
                                        <p>Notre service chirurgical propose une gamme complète d'interventions réalisées
                                            par des chirurgiens spécialisés. Les salles d'opération sont équipées des
                                            dernières technologies pour assurer sécurité et précision lors des
                                            interventions.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-3.jpg" alt="Bloc opératoire" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-tab-4">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Maternité</h3>
                                        <p class="fst-italic">Accompagnement complet de la grossesse à l'accouchement</p>
                                        <p>Notre maternité offre un suivi personnalisé de la grossesse, des salles
                                            d'accouchement modernes et un accompagnement post-natal. L'équipe médicale est
                                            dédiée à offrir les meilleures conditions pour la mère et le nouveau-né.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-4.jpg" alt="Service de maternité"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-tab-5">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Imagerie Médicale</h3>
                                        <p class="fst-italic">Diagnostic par imagerie de haute technologie</p>
                                        <p>Notre service d'imagerie médicale dispose d'un scanner, d'un IRM et d'équipements
                                            de radiologie numérique pour des diagnostics précis. Les examens sont réalisés
                                            par des radiologues expérimentés dans le respect des normes de sécurité.</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/departments-5.jpg" alt="Service d'imagerie"
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Tabs Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper" data-speed="600" data-delay="5000"
                    data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                }
              }
            }
          </script>
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item" "="">
                                                                                            <p>
                                                                                              <i class=" bi bi-quote quote-icon-left"></i>
                                                                                                <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                                                                                                <i class="bi bi-quote quote-icon-right"></i>
                                                                                                </p>
                                                                                                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                                                                                                <h3>Saul Goodman</h3>
                                                                                                <h4>Ceo &amp; Founder</h4>
                                                                                              </div>
                                                                                            </div><!-- End testimonial item -->

                                                                                            <div class="swiper-slide">
                                                                                              <div class="testimonial-item">
                                                                                                <p>
                                                                                                  <i class="bi bi-quote quote-icon-left"></i>
                                                                                                  <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                                                                                                  <i class="bi bi-quote quote-icon-right"></i>
                                                                                                </p>
                                                                                                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                                                                                                <h3>Sara Wilsson</h3>
                                                                                                <h4>Designer</h4>
                                                                                              </div>
                                                                                            </div><!-- End testimonial item -->

                                                                                            <div class="swiper-slide">
                                                                                              <div class="testimonial-item">
                                                                                                <p>
                                                                                                  <i class="bi bi-quote quote-icon-left"></i>
                                                                                                  <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                                                                                                  <i class="bi bi-quote quote-icon-right"></i>
                                                                                                </p>
                                                                                                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                                                                                                <h3>Jena Karlis</h3>
                                                                                                <h4>Store Owner</h4>
                                                                                              </div>
                                                                                            </div><!-- End testimonial item -->

                                                                                            <div class="swiper-slide">
                                                                                              <div class="testimonial-item">
                                                                                                <p>
                                                                                                  <i class="bi bi-quote quote-icon-left"></i>
                                                                                                  <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                                                                                                  <i class="bi bi-quote quote-icon-right"></i>
                                                                                                </p>
                                                                                                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                                                                                                <h3>Matt Brandon</h3>
                                                                                                <h4>Freelancer</h4>
                                                                                              </div>
                                                                                            </div><!-- End testimonial item -->

                                                                                            <div class="swiper-slide">
                                                                                              <div class="testimonial-item">
                                                                                                <p>
                                                                                                  <i class="bi bi-quote quote-icon-left"></i>
                                                                                                  <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                                                                                                  <i class="bi bi-quote quote-icon-right"></i>
                                                                                                </p>
                                                                                                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                                                                                                <h3>John Larson</h3>
                                                                                                <h4>Entrepreneur</h4>
                                                                                              </div>
                                                                                            </div><!-- End testimonial item -->

                                                                                          </div>
                                                                                          <div class="swiper-pagination"></div>
                                                                                        </div>

                                                                                      </div>

                                                                                    </section><!-- /Testimonials Section -->

                                                                                    <!-- Doctors Section -->
                                                                                    <section id="doctors" class="doctors section">

                                                                                      <!-- Section Title -->
                                                                                      <div class="container section-title" data-aos="fade-up">
                                                                                        <h2>Doctors</h2>
                                                                                        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
                                                                                      </div><!-- End Section Title -->

                                                                                      <div class="container">

                                                                                        <div class="row gy-4">

                                                                                          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                                                                            <div class="team-member">
                                                                                              <div class="member-img">
                                                                                                <img src="assets/img/doctors/doctors-1.jpg" class="img-fluid" alt="">
                                                                                                <div class="social">
                                                                                                  <a href=""><i class="bi bi-twitter-x"></i></a>
                                                                                                  <a href=""><i class="bi bi-facebook"></i></a>
                                                                                                  <a href=""><i class="bi bi-instagram"></i></a>
                                                                                                  <a href=""><i class="bi bi-linkedin"></i></a>
                                                                                                </div>
                                                                                              </div>
                                                                                              <div class="member-info">
                                                                                                <h4>Walter White</h4>
                                                                                                <span>Chief Medical Officer</span>
                                                                                              </div>
                                                                                            </div>
                                                                                          </div><!-- End Team Member -->

                                                                                          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                                                                                            <div class="team-member">
                                                                                              <div class="member-img">
                                                                                                <img src="assets/img/doctors/doctors-2.jpg" class="img-fluid" alt="">
                                                                                                <div class="social">
                                                                                                  <a href=""><i class="bi bi-twitter-x"></i></a>
                                                                                                  <a href=""><i class="bi bi-facebook"></i></a>
                                                                                                  <a href=""><i class="bi bi-instagram"></i></a>
                                                                                                  <a href=""><i class="bi bi-linkedin"></i></a>
                                                                                                </div>
                                                                                              </div>
                                                                                              <div class="member-info">
                                                                                                <h4>Sarah Jhonson</h4>
                                                                                                <span>Anesthesiologist</span>
                                                                                              </div>
                                                                                            </div>
                                                                                          </div><!-- End Team Member -->

                                                                                          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                                                                                            <div class="team-member">
                                                                                              <div class="member-img">
                                                                                                <img src="assets/img/doctors/doctors-3.jpg" class="img-fluid" alt="">
                                                                                                <div class="social">
                                                                                                  <a href=""><i class="bi bi-twitter-x"></i></a>
                                                                                                  <a href=""><i class="bi bi-facebook"></i></a>
                                                                                                  <a href=""><i class="bi bi-instagram"></i></a>
                                                                                                  <a href=""><i class="bi bi-linkedin"></i></a>
                                                                                                </div>
                                                                                              </div>
                                                                                              <div class="member-info">
                                                                                                <h4>William Anderson</h4>
                                                                                                <span>Cardiology</span>
                                                                                              </div>
                                                                                            </div>
                                                                                          </div><!-- End Team Member -->

                                                                                          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                                                                                            <div class="team-member">
                                                                                              <div class="member-img">
                                                                                                <img src="assets/img/doctors/doctors-4.jpg" class="img-fluid" alt="">
                                                                                                <div class="social">
                                                                                                  <a href=""><i class="bi bi-twitter-x"></i></a>
                                                                                                  <a href=""><i class="bi bi-facebook"></i></a>
                                                                                                  <a href=""><i class="bi bi-instagram"></i></a>
                                                                                                  <a href=""><i class="bi bi-linkedin"></i></a>
                                                                                                </div>
                                                                                              </div>
                                                                                              <div class="member-info">
                                                                                                <h4>Amanda Jepson</h4>
                                                                                                <span>Neurosurgeon</span>
                                                                                              </div>
                                                                                            </div>
                                                                                          </div><!-- End Team Member -->

                                                                                        </div>

                                                                                      </div>

                                                                                    </section><!-- /Doctors Section -->

                                                                                    <!-- Gallery Section -->
                                                                                    <section id="gallery" class="gallery section light-background">

                                                                                      <!-- Section Title -->
                                                                                      <div class="container section-title" data-aos="fade-up">
                                                                                        <h2>Gallery</h2>
                                                                                        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
                                                                                      </div><!-- End Section Title -->

                                                                                      <div class="container" data-aos="fade-up" data-aos-delay="100">

                                                                                        <div class="swiper init-swiper">
                                                                                          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 0
                },
                "768": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                },
                "1200": {
                  "slidesPerView": 5,
                  "spaceBetween": 20
                }
              }
            }
          </script>
                                                                                          <div class="swiper-wrapper align-items-center">
                                                                                            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-1.jpg"><img src="assets/img/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div>
                                                                                            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-2.jpg"><img src="assets/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
                                                                                            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-3.jpg"><img src="assets/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
                                                                                            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-4.jpg"><img src="assets/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
                                                                                            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-5.jpg"><img src="assets/img/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div>
                                                                                            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-6.jpg"><img src="assets/img/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div>
                                                                                            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-7.jpg"><img src="assets/img/gallery/gallery-7.jpg" class="img-fluid" alt=""></a></div>
                                                                                            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/gallery/gallery-8.jpg"><img src="assets/img/gallery/gallery-8.jpg" class="img-fluid" alt=""></a></div>
                                                                                          </div>
                                                                                          <div class="swiper-pagination"></div>
                                                                                        </div>

                                                                                      </div>


                            <!-- Faq Section -->
                            <section id="faq" class="faq section" style='background : white'>
                                <!-- Section Title -->
                                <div class="container section-title" data-aos="fade-up">
                                    <h2>Questions Fréquentes</h2>
                                    <p>Informations pratiques pour votre visite</p>
                                </div><!-- End Section Title -->

                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                                            <div class="faq-container">
                                                <div class="faq-item">
                                                    <h3>Quelles sont les heures de visite ?</h3>
                                                    <div class="faq-content">
                                                        <p>Les visites sont autorisées de 14h à 19h en semaine et de 10h à 19h le week-end. Pour les services de soins intensifs, les horaires peuvent être différents.</p>
                                                    </div>
                                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                                </div><!-- End Faq item-->

                                                <div class="faq-item">
                                                    <h3>Comment prendre rendez-vous ?</h3>
                                                    <div class="faq-content">
                                                        <p>Vous pouvez prendre rendez-vous par téléphone au 233 45 67 89 ou directement à l'accueil de l'hôpital. Certains services proposent également la prise de rendez-vous en ligne.</p>
                                                    </div>
                                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                                </div><!-- End Faq item-->

                                                <div class="faq-item">
                                                    <h3>Quels documents apporter pour une hospitalisation ?</h3>
                                                    <div class="faq-content">
                                                        <p>Pensez à apporter : pièce d'identité, carte d'assurance maladie, ordonnances en cours, résultats d'examens récents et vos effets personnels nécessaires.</p>
                                                    </div>
                                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                                </div><!-- End Faq item-->

                                                <div class="faq-item">
                                                    <h3>L'hôpital dispose-t-il d'un service d'urgences ?</h3>
                                                    <div class="faq-content">
                                                        <p>Oui, notre service d'urgences est ouvert 24h/24 et 7j/7 pour prendre en charge tout cas urgent. Composez le 677 89 45 23 pour les urgences vitales.</p>
                                                    </div>
                                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                                </div><!-- End Faq item-->

                                                <div class="faq-item">
                                                    <h3>Quelles sont les modalités de paiement ?</h3>
                                                    <div class="faq-content">
                                                        <p>Nous acceptons les paiements en espèces, par carte bancaire et les prises en charge par les mutuelles agréées. Des facilités de paiement peuvent être envisagées sur demande.</p>
                                                    </div>
                                                    <i class="faq-toggle bi bi-chevron-right"></i>
                                                </div><!-- End Faq item-->
                                            </div>
                                        </div><!-- End Faq Column-->
                                    </div>
                                </div>
                            </section><!-- /Faq Section -->


                         </main>
@endsection
