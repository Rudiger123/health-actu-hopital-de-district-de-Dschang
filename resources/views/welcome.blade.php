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
                                {{ __('hero.badge') }}
                            </div>

                            <h1 class="mb-4">
                                {{ __('hero.title') }}
                                <span class="accent-text">{{ __('hero.city') }}</span>
                            </h1>

                            <p class="mb-4 mb-md-5">
                                {{ __('hero.subtitle') }}
                            </p>

                            <div class="hero-buttons">
                                <a href="{{ route('services') }}" class="btn btn-primary me-0 me-sm-2 mx-1">
                                    {{ __('hero.get_started') }}
                                </a>
                                <a href="{{ route('blog.index') }}" class="btn btn-link mt-2 mt-sm-0 glightbox">
                                    <i class="bi bi-play-circle me-1"></i>
                                    {{ __('hero.news') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                            <img src="assets/images/hopital.jpeg" alt="Hero Image" class="img-fluid rounded">
                        </div>
                    </div>
                </div>

                <!-- Stats -->
                <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
                    @foreach (__('hero.stats') as $stat)
                        <div class="col-lg-3 col-md-6">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="{{ $stat['icon'] }}"></i>
                                </div>
                                <div class="stat-content">
                                    <h4>{{ $stat['title'] }}</h4>
                                    <p class="mb-0">{{ $stat['text'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- About Section -->
        <section id="about" class="about section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4 align-items-center justify-content-between">
                    <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                        <span class="about-meta">@lang('welcome.about.title')</span>
                        <h2 class="about-title">@lang('welcome.about.heading')</h2>
                        <p class="about-description">
                            @lang('welcome.about.description')
                        </p>

                        <div class="row feature-list-wrapper">
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    @foreach (__('welcome.about.features.list1') as $feature)
                                        <li><i class="bi bi-check-circle-fill"></i> @lang($feature)</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    @foreach (__('welcome.about.features.list2') as $feature)
                                        <li><i class="bi bi-check-circle-fill"></i> @lang($feature)</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="info-wrapper">
                            <div class="row gy-4">
                                <div class="col-lg-7">
                                    <div class="contact-info d-flex align-items-center gap-2">
                                        <i class="bi bi-telephone-fill"></i>
                                        <div>
                                            <p class="contact-label">@lang('welcome.contact.label')</p>
                                            <p class="contact-number">@lang('welcome.contact.number')</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="image-wrapper">
                            <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                                <img src="{{ asset('assets/images/guide-2.jpg') }}" alt="@lang('welcome.images.business_meeting')"
                                    class="img-fluid main-image rounded-4">
                                <img src="{{ asset('assets/images/guide-1.jpg') }}" alt="@lang('welcome.images.team_discussion')"
                                    class="img-fluid small-image rounded-10">
                            </div>
                            <div class="experience-badge floating">
                                <h3>@lang('welcome.experience.years', ['years' => 15])</h3>
                                <p>@lang('welcome.experience.text')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       <!-- Features Section -->
<section id="features" class="features section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('features.our_establishment') }}</h2>
        <p>{{ __('features.intro_text') }}</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="d-flex justify-content-center">
            <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                        <h4>{{ __('features.about_us') }}</h4>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                        <h4>{{ __('features.our_services') }}</h4>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                        <h4>{{ __('features.live_news') }}</h4>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

            <div class="tab-pane fade active show" id="features-tab-1">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                        <h3>{{ __('features.commitment_title') }}</h3>
                        <p class="fst-italic">{{ __('features.commitment_text') }}</p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>{{ __('features.commitment_item_1') }}</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>{{ __('features.commitment_item_2') }}</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>{{ __('features.commitment_item_3') }}</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="assets/images/engagement.jpeg" alt="" class="img-fluid rounded-lg">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="features-tab-2">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                        <h3>{{ __('features.services_title') }}</h3>
                        <p class="fst-italic">{{ __('features.services_text') }}</p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>{{ __('features.services_item_1') }}</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>{{ __('features.services_item_2') }}</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>{{ __('features.services_item_3') }}</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>{{ __('features.services_item_4') }}</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="assets/images/guide-3.jpg" alt="" class="img-fluid rounded-lg">
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="features-tab-3">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                        <h3>{{ __('features.news_title') }}</h3>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> <span>{!! __('features.news_item_1') !!}</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>{!! __('features.news_item_2') !!}</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>{!! __('features.news_item_3') !!}</span></li>
                        </ul>
                        <p class="fst-italic">{{ __('features.news_text') }}</p>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                        <img src="assets/images/actualités.jpg" alt="" class="img-fluid rounded-lg">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


        <section id="features-cards" class="features-cards section">
            <div class="container">
                <div class="row gy-4">

                    @foreach (__('general.features') as $index => $feature)
                        <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 100 }}">
                            <div
                                class="feature-box 
                                @if ($index === 0) orange
                                @elseif($index === 1) blue
                                @elseif($index === 2) green
                                @elseif($index === 3) red @endif">
                                <i
                                    class="
                                    @if ($index === 0) bi bi-award
                                    @elseif($index === 1) bi bi-patch-check
                                    @elseif($index === 2) bi bi-sunrise
                                    @elseif($index === 3) bi bi-shield-check @endif"></i>
                                <h4>{{ $feature['title'] }}</h4>
                                <p>{{ $feature['description'] }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>


        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row content justify-content-center align-items-center position-relative">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="display-4 mb-4">{{ __('general.slogan') }}</h2>
                        <p class="mb-4">{{ __('general.hospital_description') }}</p>
                        <a href="{{ route('blog.index') }}" class="btn btn-cta">{{ __('general.discover_news') }}</a>
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

        @include('components.certifications')

        <!-- Direction Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>@lang('welcome.team.title')</h2>
                <p>@lang('welcome.team.description')</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row g-5">

                    @php
                        $testimonials = __('direction');
                    @endphp

                    @foreach ($testimonials as $index => $testimonial)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                            <div class="testimonial-item">
                                <img src="{{ asset($testimonial['image']) }}" class="testimonial-img"
                                    alt="{{ $testimonial['name'] }}">
                                <h3>{{ $testimonial['name'] }}</h3>
                                <h4>{{ $testimonial['position'] }}</h4>
                                <div class="stars">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>{{ $testimonial['message'] }}</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </section>

        <!-- Stats Section -->
        <section id="stats" class="stats section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">

                    <!-- Statistique 1 : Patients accompagnés -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="800" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{{ __('general.patients') }}</p>
                        </div>
                    </div>

                    <!-- Statistique 2 : Urgences traitées -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{{ __('general.emergencies') }}</p>
                        </div>
                    </div>

                    <!-- Statistique 3 : Naissances accompagnées -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="200" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{{ __('general.births') }}</p>
                        </div>
                    </div>

                    <!-- Statistique 4 : Professionnels de santé -->
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>{{ __('general.staff') }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- Services Section -->
        <section id="services" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('general.title') }}</h2>
                <p>{{ __('general.intro') }}</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-4">

                    <!-- Service 1 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-heart-pulse"></i>
                            </div>
                            <div>
                                <h3>{{ __('general.consult_title') }}</h3>
                                <p>{{ __('general.consult_desc') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service 2 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-ambulance"></i>
                            </div>
                            <div>
                                <h3>{{ __('general.emergency_title') }}</h3>
                                <p>{{ __('general.emergency_desc') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service 3 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-people"></i>
                            </div>
                            <div>
                                <h3>{{ __('general.mother_title') }}</h3>
                                <p>{{ __('general.mother_desc') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service 4 -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-clipboard-data"></i>
                            </div>
                            <div>
                                <h3>{{ __('general.lab_title') }}</h3>
                                <p>{{ __('general.lab_desc') }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>


        <!-- Faq Section -->
        <section class="faq-9 faq section" id="faq">
            <div class="container">
                <div class="row">
                    <!-- Colonne de gauche : Titre et description -->
                    <div class="col-lg-5" data-aos="fade-up">
                        <h2 class="faq-title">{{ __('faq.title') }}</h2>
                        <p class="faq-description">{{ __('faq.description') }}</p>
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

                            <div class="faq-item faq-active">
                                <h3>{{ __('faq.q1.title') }}</h3>
                                <div class="faq-content">
                                    <p>{{ __('faq.q1.answer') }}</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                            <div class="faq-item">
                                <h3>{{ __('faq.q2.title') }}</h3>
                                <div class="faq-content">
                                    <p>{{ __('faq.q2.answer') }}</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                            <div class="faq-item">
                                <h3>{{ __('faq.q3.title') }}</h3>
                                <div class="faq-content">
                                    <p>{{ __('faq.q3.answer') }}</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                            <div class="faq-item">
                                <h3>{{ __('faq.q4.title') }}</h3>
                                <div class="faq-content">
                                    <p>{{ __('faq.q4.answer') }}</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                            <div class="faq-item">
                                <h3>{{ __('faq.q5.title') }}</h3>
                                <div class="faq-content">
                                    <p>{{ __('faq.q5.answer') }}</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                            <div class="faq-item">
                                <h3>{{ __('faq.q6.title') }}</h3>
                                <div class="faq-content">
                                    <p>{{ __('faq.q6.answer') }}</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Faq Section -->


        <section id="call-to-action-2" class="call-to-action-2 section dark-background">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>{{ __('general.call_to_action_2.title') }}</h3>
                            <p>{{ __('general.call_to_action_2.description') }}</p>
                            <a class="cta-btn" href="/contact">{{ __('general.call_to_action_2.button') }}</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section id="contact" class="contact section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('general.contact_section.title') }}</h2>
                <p>{{ __('general.contact_section.description') }}</p>
            </div><!-- End Section Title -->
        
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-4 g-lg-5">
                    <!-- Colonne de gauche : Informations de contact -->
                    <div class="col-lg-5">
                        <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                            <h3>{{ __('general.contact_section.left_column.title') }}</h3>
                            <p>{{ __('general.contact_section.left_column.intro') }}</p>
        
                            <!-- Adresse -->
                            <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="content">
                                    <h4>{{ __('general.contact_section.left_column.address.title') }}</h4>
                                    <p>{{ __('general.contact_section.left_column.address.line1') }}</p>
                                    <p>{{ __('general.contact_section.left_column.address.line2') }}</p>
                                </div>
                            </div>
        
                            <!-- Téléphone -->
                            <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div class="content">
                                    <h4>{{ __('general.contact_section.left_column.phone.title') }}</h4>
                                    <p>{{ __('general.contact_section.left_column.phone.standard') }}</p>
                                    <p>{{ __('general.contact_section.left_column.phone.emergency') }}</p>
                                </div>
                            </div>
        
                            <!-- E-mail -->
                            <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon-box">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div class="content">
                                    <h4>{{ __('general.contact_section.left_column.email.title') }}</h4>
                                    <p>{{ __('general.contact_section.left_column.email.contact') }}</p>
                                    <p>{{ __('general.contact_section.left_column.email.emergency') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Colonne de droite : Formulaire de contact -->
                    <div class="col-lg-7">
                        <div class="contact-form" wire:ignore.self data-aos="fade-up" data-aos-delay="300">
                            <h3>{{ __('general.contact_section.right_column.title') }}</h3>
                            <p>{{ __('general.contact_section.right_column.description') }}</p>
                            @livewire('blog.contactForm')
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>
@endsection
