@extends('layouts.app')

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                            <div class="company-badge mb-4">
                                <i class="bi bi-gear-fill me-2"></i>
                                Working for your health
                            </div>

                            <h1 class="mb-4">
                                Hôpital Régional Annexe de
                                <span class="accent-text">Dschang</span>
                            </h1>

                            <p class="mb-4 mb-md-5">
                                NulSoins innovants, transparence médiatique, engagement communautaire
                            </p>

                            <div class="hero-buttons">
                                <a href="{{ route('services') }}" class="btn btn-primary me-0 me-sm-2 mx-1">Get Started</a>
                                <a href="{{ route('blog.index') }}" class="btn btn-link mt-2 mt-sm-0 glightbox">
                                    <i class="bi bi-play-circle me-1"></i>
                                    Découvrir nos actualités
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                            <img src="assets/images/hopital.jpeg" alt="Hero Image" class="img-fluid rounded">

                            {{-- <div class="customers-badge">
                                <div class="customer-avatars">
                                    <img src="assets/img/avatar-1.webp" alt="Customer 1" class="avatar">
                                    <img src="assets/img/avatar-2.webp" alt="Customer 2" class="avatar">
                                    <img src="assets/img/avatar-3.webp" alt="Customer 3" class="avatar">
                                    <img src="assets/img/avatar-4.webp" alt="Customer 4" class="avatar">
                                    <img src="assets/img/avatar-5.webp" alt="Customer 5" class="avatar">
                                    <span class="avatar more">12+</span>
                                </div>
                                <p class="mb-0 mt-2">50+ médecins et experts dans leurs domaines</p>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-trophy"></i>
                            </div>
                            <div class="stat-content">
                                <h4>3 Certifications d’Excellence</h4>
                                <p class="mb-0">
                                    Reconnus pour la qualité de nos soins et notre engagement social
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-briefcase"></i>
                            </div>
                            <div class="stat-content">
                                <h4>6 500 Interventions d’Urgence en 2023</h4>
                                <p class="mb-0">Réactivité 24h/24, 7j/7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-graph-up"></i>
                            </div>
                            <div class="stat-content">
                                <h4>80 000 Patients Accompagnés par An</h4>
                                <p class="mb-0">92% de satisfaction</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-award"></i>
                            </div>
                            <div class="stat-content">
                                <h4>6 Partenaires Internationaux</h4>
                                <p class="mb-0">Pour une santé accessible à tous</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 align-items-center justify-content-between">

                    <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                        <span class="about-meta"> A PROPOS DE NOUS </span>
                        <h2 class="about-title">Engagés pour votre santé, hier, aujourd’hui et demain</h2>
                        <p class="about-description">
                            Depuis 1985, l’Hôpital de District de Dschang œuvre pour offrir des soins accessibles, modernes
                            et humains à toute la population de l’Ouest Cameroun. Reconnu pour notre expertise en santé
                            maternelle et en lutte contre les épidémies, nous combinons technologie de pointe et proximité
                            avec les communautés.
                        </p>

                        <div class="row feature-list-wrapper">
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    <li><i class="bi bi-check-circle-fill"></i> 50 ans d’excellence : Premier hôcertifié ISO
                                        9001 dans la région</li>
                                    <li><i class="bi bi-check-circle-fill"></i> 24h/24 aux urgences : Prise en charge
                                        immédiate, même la nuit</li>
                                    <li><i class="bi bi-check-circle-fill"></i> 3 centres spécialisés : Cardiologie,
                                        pédiatrie, et chirurgie mini-invasive</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    <li><i class="bi bi-check-circle-fill"></i> 100 000 patients par an : Un réseau de 15
                                        ambulances pour couvrir les zones rurales</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Partenariat avec l’OMS : Acteur clé dans la
                                        lutte contre le paludisme</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Formation gratuite : Ateliers mensuels sur
                                        la prévention diabète/hypertension</li>
                                </ul>
                            </div>
                        </div>

                        <div class="info-wrapper">
                            <div class="row gy-4">
                                <div class="col-lg-7">
                                    <div class="contact-info d-flex align-items-center gap-2">
                                        <i class="bi bi-telephone-fill"></i>
                                        <div>
                                            <p class="contact-label">Call us anytime</p>
                                            <p class="contact-number">+237 800 800 800</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="image-wrapper">
                            <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                                <img src="assets/images/guide-2.jpg" alt="Business Meeting"
                                    class="img-fluid main-image rounded-4">
                                <img src="assets/images/guide-1.jpg" alt="Team Discussion"
                                    class="img-fluid small-image rounded-4">
                            </div>
                            <div class="experience-badge floating">
                                <h3>15+ <span>Years</span></h3>
                                <p>Of experience in healthcare</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Features Section -->
        <section id="features" class="features section  light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Notre Établissement</h2>
                <p>Découvrez l'excellence médicale au cœur de la région de l'Ouest Cameroun</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="d-flex justify-content-center">

                    <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                                <h4>Qui sommes-nous?</h4>
                            </a>
                        </li><!-- End tab nav item -->

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                                <h4>Nos services</h4>
                            </a><!-- End tab nav item -->

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                                <h4>Actualités en direct</h4>
                            </a>
                        </li><!-- End tab nav item -->

                    </ul>

                </div>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade active show" id="features-tab-1">
                        <div class="row">
                            <div
                                class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                <h3>Notre Engagement envers Votre Santé</h3>
                                <p class="fst-italic">
                                    Établissement de référence depuis 1985, l'Hôpital Régional Annexe de Dschang allie
                                    expertise médicale et humanisme pour servir les populations de la région de l'Ouest.
                                </p>
                                <ul>
                                    <li><i class="bi bi-check2-all"></i> <span>Centre agréé par le Ministère de la Santé
                                            Publique avec plateau technique de niveau régional</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Équipe pluridisciplinaire : 25 médecins
                                            spécialistes, 150 paramédicaux diplômés</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Infrastructures modernes : 150 lits
                                            d'hospitalisation, 3 salles d'opération, unité de soins intensifs</span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="assets/images/welcome image.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End tab content item -->

                    <div class="tab-pane fade" id="features-tab-2">
                        <div class="row">
                            <div
                                class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                <h3>Des Soins Complets et Spécialisés</h3>
                                <p class="fst-italic">
                                    Offre de soins intégrée couvrant l'ensemble des besoins de santé, de la prévention aux
                                    traitements complexes.
                                </p>
                                <ul>
                                    <li><i class="bi bi-check2-all"></i> <span>Urgences 24h/24 : Prise en charge des
                                            traumatismes et pathologies aiguës</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Maternité de référence : Suivi grossesse,
                                            accouchement et néonatalogie</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Services spécialisés : Cardiologie,
                                            Pédiatrie, Chirurgie viscérale</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Plateaux techniques : Scanner, Échographie
                                            Doppler, Laboratoire d'analyses</span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="assets/images/guide-3.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End tab content item -->

                    <div class="tab-pane fade" id="features-tab-3">
                        <div class="row">
                            <div
                                class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                <h3>Informations en Temps Réel</h3>
                                <ul>
                                    <li><i class="bi bi-check2-all"></i> <span><strong>Campagne de vaccination</strong> :
                                            Mois de la santé infantile jusqu'au 30 novembre</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span><strong>Nouveau service</strong> : Unité de
                                            dialyse opérationnelle depuis octobre 2023</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span><strong>Horaires fériés</strong> :
                                            Consultations sans rendez-vous les jours fériés de 8h à 13h</span></li>
                                </ul>
                                <p class="fst-italic">
                                    Suivez nos actualités sur place ou via notre page Facebook officielle pour ne rien
                                    manquer de nos services.
                                </p>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="assets/images/welcome image.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End tab content item -->

                </div>

            </div>

        </section><!-- /Features Section -->
        <!-- Features Cards Section -->
        <section id="features-cards" class="features-cards section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="feature-box orange">
                            <i class="bi bi-award"></i>
                            <h4>Nos Services Clés</h4>
                            <p>En tant qu’annexe régionale, nous complétons l’offre de soins du district par des services
                                spécialisés accessibles à tous, même dans les zones rurales</p>
                        </div>
                    </div><!-- End Feature Borx-->

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="feature-box blue">
                            <i class="bi bi-patch-check"></i>
                            <h4>transparence et médiation</h4>
                            <p>Nous croyons en une médecine transparente et inclusive. Chaque patient reçoit une explication
                                claire de son diagnostic et traitement</p>
                        </div>
                    </div><!-- End Feature Borx-->

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="feature-box green">
                            <i class="bi bi-sunrise"></i>
                            <h4>Notre Equipe medicale</h4>
                            <p>Une équipe de 35 professionnels dévoués, formés aux dernières pratiques médicales en
                                collaboration avec l’École de Santé Publique de Yaoundé</p>
                        </div>
                    </div><!-- End Feature Borx-->

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="feature-box red">
                            <i class="bi bi-shield-check"></i>
                            <h4>Impact Local en 2024</h4>
                            <p>Nos actions en chiffres pour le premier trimestre 2024</p>
                        </div>
                    </div><!-- End Feature Borx-->

                </div>

            </div>

        </section><!-- /Features Cards Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row content justify-content-center align-items-center position-relative">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="display-4 mb-4">Ensemble pour une Santé Durable</h2>
                        <p class="mb-4">L’Hôpital Régional Annexé de Dschang travaille main dans la main avec des
                            partenaires locaux et internationaux pour améliorer l’accès aux soins et promouvoir la santé
                            publique dans la région de l’Ouest Cameroun. Découvrez comment nous agissons ensemble pour un
                            impact durable</p>
                        <a href="{{ route('blog.index') }}" class="btn btn-cta">Découvrir nos actualités</a>
                    </div>

                    <!-- Abstract Background Elements -->
                    <div class="shape shape-1">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M47.1,-57.1C59.9,-45.6,68.5,-28.9,71.4,-10.9C74.2,7.1,71.3,26.3,61.5,41.1C51.7,55.9,35,66.2,16.9,69.2C-1.3,72.2,-21,67.8,-36.9,57.9C-52.8,48,-64.9,32.6,-69.1,15.1C-73.3,-2.4,-69.5,-22,-59.4,-37.1C-49.3,-52.2,-32.8,-62.9,-15.7,-64.9C1.5,-67,34.3,-68.5,47.1,-57.1Z"
                                transform="translate(100 100)"></path>
                        </svg>
                    </div>

                    <div class="shape shape-2">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M41.3,-49.1C54.4,-39.3,66.6,-27.2,71.1,-12.1C75.6,3,72.4,20.9,63.3,34.4C54.2,47.9,39.2,56.9,23.2,62.3C7.1,67.7,-10,69.4,-24.8,64.1C-39.7,58.8,-52.3,46.5,-60.1,31.5C-67.9,16.4,-70.9,-1.4,-66.3,-16.6C-61.8,-31.8,-49.7,-44.3,-36.3,-54C-22.9,-63.7,-8.2,-70.6,3.6,-75.1C15.4,-79.6,28.2,-58.9,41.3,-49.1Z"
                                transform="translate(100 100)"></path>
                        </svg>
                    </div>

                    <!-- Dot Pattern Groups -->
                    <div class="dots dots-1">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <pattern id="dot-pattern" x="0" y="0" width="20" height="20"
                                patternUnits="userSpaceOnUse">
                                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                            </pattern>
                            <rect width="100" height="100" fill="url(#dot-pattern)"></rect>
                        </svg>
                    </div>

                    <div class="dots dots-2">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <pattern id="dot-pattern-2" x="0" y="0" width="20" height="20"
                                patternUnits="userSpaceOnUse">
                                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                            </pattern>
                            <rect width="100" height="100" fill="url(#dot-pattern-2)"></rect>
                        </svg>
                    </div>

                    <div class="shape shape-3">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M43.3,-57.1C57.4,-46.5,71.1,-32.6,75.3,-16.2C79.5,0.2,74.2,19.1,65.1,35.3C56,51.5,43.1,65,27.4,71.7C11.7,78.4,-6.8,78.3,-23.9,72.4C-41,66.5,-56.7,54.8,-65.4,39.2C-74.1,23.6,-75.8,4,-71.7,-13.2C-67.6,-30.4,-57.7,-45.2,-44.3,-56.1C-30.9,-67,-15.5,-74,0.7,-74.9C16.8,-75.8,33.7,-70.7,43.3,-57.1Z"
                                transform="translate(100 100)"></path>
                        </svg>
                    </div>
                </div>

            </div>

        </section><!-- /Call To Action Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>DIRECTION DE L'HÔPITAL</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row g-5">

                    <!-- Témoignage 1 : Dr. Jean Dupont – Médecin Chef -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                alt="Dr. Jean Dupont">
                            <h3>Dr. Jean Dupont</h3>
                            <h4>Médecin Chef</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Chaque jour, je suis inspiré par la résilience de nos patients et le dévouement de
                                    notre équipe. À l’Hôpital de Dschang, nous ne soignons pas seulement des maladies, nous
                                    redonnons de l’espoir à toute une communauté.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <!-- Témoignage 2 : Mme Marie Ngo – Directrice Administrative -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                alt="Mme Marie Ngo">
                            <h3>Mme Marie Ngo</h3>
                            <h4>Directrice Administrative</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Notre mission va au-delà des soins médicaux. Nous construisons un système de santé
                                    inclusif, où chaque patient, qu’il vienne de la ville ou des villages les plus reculés,
                                    reçoit une attention digne et respectueuse.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <!-- Témoignage 3 : Dr. Amina Ousman – Chef du Service Pédiatrique -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                alt="Dr. Amina Ousman">
                            <h3>Dr. Amina Ousman</h3>
                            <h4>Chef du Service Pédiatrique</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Voir un enfant guérir et retrouver le sourire est la plus grande récompense. Grâce à
                                    notre programme Mère-Enfant, nous avons réduit de 30% la mortalité infantile dans la
                                    région.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <!-- Témoignage 4 : M. Paul Tchoupo – Responsable Logistique -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="testimonial-item">
                            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                alt="M. Paul Tchoupo">
                            <h3>M. Paul Tchoupo</h3>
                            <h4>Responsable Logistique</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Notre réseau d’ambulances et de relais communautaires permet d’atteindre les zones les
                                    plus isolées. La santé est un droit, pas un privilège, et nous travaillons chaque jour
                                    pour le rendre accessible à tous.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
            </div>

        </section><!-- /Testimonials Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <!-- Statistique 1 : Patients accompagnés -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="800" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Patients Accompagnés</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <!-- Statistique 2 : Interventions d'urgence -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="+150" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Urgences Traitées</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <!-- Statistique 3 : Naissances accompagnées -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="+200" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Naissances Accompagnées</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <!-- Statistique 4 : Professionnels de santé -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Professionnels de Santé</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Services Section -->
        <section id="services" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Nos Services Médicaux</h2>
                <p>L’Hôpital Régional Annexé de Dschang propose une gamme complète de services pour répondre aux besoins de
                    santé de la population.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4">

                    <!-- Service 1 : Consultations Générales et Spécialisées -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-heart-pulse"></i> <!-- Icône adaptée -->
                            </div>
                            <div>
                                <h3>Consultations Générales et Spécialisées</h3>
                                <p>Des consultations accessibles à tous, avec des médecins généralistes et spécialistes
                                    (cardiologie, pédiatrie, gynécologie). Prise en charge des maladies chroniques comme le
                                    diabète et l’hypertension.</p>
                            </div>
                        </div>
                    </div><!-- End Service Card -->

                    <!-- Service 2 : Urgences 24h/24 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-ambulance"></i> <!-- Icône adaptée -->
                            </div>
                            <div>
                                <h3>Urgences 24h/24</h3>
                                <p>Un service d’urgences opérationnel jour et nuit, équipé pour traiter les fractures, les
                                    brûlures, les crises hypertensives et les morsures de serpent.</p>
                            </div>
                        </div>
                    </div><!-- End Service Card -->

                    <!-- Service 3 : Programme Mère-Enfant -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-people"></i> <!-- Icône adaptée -->
                            </div>
                            <div>
                                <h3>Programme Mère-Enfant</h3>
                                <p>Un accompagnement complet pour les femmes enceintes et les nouveau-nés, avec des
                                    consultations prénatales gratuites et un suivi postnatal personnalisé.</p>
                            </div>
                        </div>
                    </div><!-- End Service Card -->

                    <!-- Service 4 : Laboratoire d’Analyses Médicales -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-clipboard-data"></i> <!-- Icône adaptée -->
                            </div>
                            <div>
                                <h3>Laboratoire d’Analyses Médicales</h3>
                                <p>Un laboratoire moderne pour des analyses rapides et fiables : dépistage du VIH,
                                    paludisme, tuberculose, et bilans sanguins complets.</p>
                            </div>
                        </div>
                    </div><!-- End Service Card -->

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Faq Section -->
        <section class="faq-9 faq section" id="faq">

            <div class="container">
                <div class="row">

                    <!-- Colonne de gauche : Titre et description -->
                    <div class="col-lg-5" data-aos="fade-up">
                        <h2 class="faq-title">Vous avez une question ? Consultez notre FAQ</h2>
                        <p class="faq-description">Nous répondons aux questions les plus fréquentes sur nos services, nos
                            horaires, et nos programmes de santé.</p>
                        <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                            <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Colonne de droite : Liste des questions -->
                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                        <div class="faq-container">

                            <!-- Question 1 : Horaires d’ouverture -->
                            <div class="faq-item faq-active">
                                <h3>Quels sont les horaires d’ouverture de l’hôpital ?</h3>
                                <div class="faq-content">
                                    <p>L’hôpital est ouvert 24h/24 pour les urgences. Les consultations générales ont lieu
                                        du lundi au vendredi, de 8h à 17h, et le samedi de 8h à 13h.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <!-- Question 2 : Prise en charge des urgences -->
                            <div class="faq-item">
                                <h3>Comment fonctionne la prise en charge des urgences ?</h3>
                                <div class="faq-content">
                                    <p>Les urgences sont traitées en priorité selon la gravité des cas. Une ambulance
                                        gratuite est disponible pour les patients critiques. Le temps d’attente moyen est de
                                        20 minutes.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <!-- Question 3 : Programmes gratuits -->
                            <div class="faq-item">
                                <h3>Quels sont les programmes de santé gratuits proposés ?</h3>
                                <div class="faq-content">
                                    <p>Nous offrons des consultations prénatales gratuites, des campagnes de vaccination
                                        (PEV), et des dépistages du VIH et de la tuberculose.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <!-- Question 4 : Accès aux spécialistes -->
                            <div class="faq-item">
                                <h3>Comment prendre rendez-vous avec un spécialiste ?</h3>
                                <div class="faq-content">
                                    <p>Vous pouvez prendre rendez-vous avec un spécialiste (cardiologue, pédiatre, etc.) en
                                        appelant notre standard au +237 XXX XXX XXX ou en vous présentant à l’accueil.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <!-- Question 5 : Laboratoire d’analyses -->
                            <div class="faq-item">
                                <h3>Quels types d’analyses sont réalisés au laboratoire ?</h3>
                                <div class="faq-content">
                                    <p>Notre laboratoire effectue des analyses sanguines, des dépistages du paludisme, du
                                        VIH, de la tuberculose, et des bilans de santé complets. Les résultats sont
                                        disponibles en 24h.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <!-- Question 6 : Partenariats et dons -->
                            <div class="faq-item">
                                <h3>Comment soutenir l’hôpital ou devenir partenaire ?</h3>
                                <div class="faq-content">
                                    <p>Vous pouvez faire un don, devenir bénévole, ou proposer un partenariat en contactant
                                        notre service administratif au +237 XXX XXX XXX ou par e-mail à
                                        contact@hopitaldschang.cm.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>
                    </div>

                </div>
            </div>
        </section><!-- /Faq Section -->

        <!-- Call To Action 2 Section -->
        <section id="call-to-action-2" class="call-to-action-2 section dark-background">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Rejoignez Notre Mission</h3>
                            <p>L’Hôpital Régional Annexé de Dschang s’engage à offrir des soins de qualité accessibles à
                                tous. Que vous soyez un patient, un partenaire ou un bénévole, vous pouvez contribuer à
                                notre mission de santé publique.</p>
                            <a class="cta-btn" href="/contact">Nous Contacter</a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Call To Action 2 Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contactez-Nous</h2>
                <p>Nous sommes à votre écoute pour répondre à vos questions, prendre des rendez-vous ou discuter de
                    partenariats.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4 g-lg-5">
                    <!-- Colonne de gauche : Informations de contact -->
                    <div class="col-lg-5">
                        <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                            <h3>Coordonnées</h3>
                            <p>Pour toute question ou demande, n’hésitez pas à nous contacter par téléphone, e-mail ou en
                                vous rendant directement à l’hôpital.</p>

                            <!-- Adresse -->
                            <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="content">
                                    <h4>Notre Adresse</h4>
                                    <p>Hôpital Régional Annexé de Dschang</p>
                                    <p>BP 123, Dschang, Ouest Cameroun</p>
                                </div>
                            </div>

                            <!-- Téléphone -->
                            <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div class="content">
                                    <h4>Numéro de Téléphone</h4>
                                    <p>+237 XXX XXX XXX (Standard)</p>
                                    <p>+237 XXX XXX XXX (Urgences)</p>
                                </div>
                            </div>

                            <!-- E-mail -->
                            <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon-box">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div class="content">
                                    <h4>Adresse E-mail</h4>
                                    <p>contact@hopitaldschang.cm</p>
                                    <p>urgence@hopitaldschang.cm</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Colonne de droite : Formulaire de contact -->
                    <div class="col-lg-7">
                        <div class="contact-form" wire:ignore.self data-aos="fade-up" data-aos-delay="300">
                            <h3>Envoyez-nous un Message</h3>
                            <p>Remplissez le formulaire ci-dessous pour nous poser une question, prendre un rendez-vous ou
                                discuter d’un partenariat.</p>
                            @livewire('blog.contactForm')
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>
@endsection
