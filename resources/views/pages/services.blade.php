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
            $image1 = 'assets/images/carousels/service-5.jpg';
            $image2 = 'assets/images/carousels/service-3.jpg';
            $image3 = 'assets/images/carousels/service-1.jpg';

            $titel1 = __('services.titel1');
            $text1 = __('services.text1');
            $titel2 = __('services.titel2');
            $text2 = __('services.text2');
            $titel3 = __('services.titel3');
            $text3 = __('services.text3');

        @endphp

        <x-layouts.hero :image1="$image1" :image2="$image2" :image3="$image3" :text1="$text1" :text2="$text2"
            :text3="$text3" :titel1="$titel1" :titel2="$titel2" :titel3="$titel3" />




        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section">
            <div class="container">
                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-heart-pulse"></i></div>
                            <h4><a href="" class="stretched-link">{{ __('services.cardiology') }}</a></h4>
                            <p>{{ __('services.cardiology_desc') }}</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-capsule"></i></div>
                            <h4><a href="" class="stretched-link">{{ __('services.pharmacy') }}</a></h4>
                            <p>{{ __('services.pharmacy_desc') }}</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-activity"></i></div> <!-- Alternative pour Urgences -->
                            <h4><a href="" class="stretched-link">{{ __('services.emergency') }}</a></h4>
                            <p>{{ __('services.emergency_desc') }}</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-droplet"></i></div> <!-- Alternative pour Laboratoire -->
                            <h4><a href="" class="stretched-link">{{ __('services.lab') }}</a></h4>
                            <p>{{ __('services.lab_desc') }}</p>
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
                            <h3>{{ __('services.call_to_action.title') }}</h3>
                            <p>{{ __('services.call_to_action.text') }}</p>
                            <a class="cta-btn" href="tel:+237677894523">{{ __('services.call_to_action.button') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Call To Action Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('services.about.section_title') }}</h2>
                <p>{{ __('services.about.section_subtitle') }}</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 position-relative align-self-start rounded-lg" data-aos="fade-up"
                        data-aos-delay="100">
                        <img src="assets/images/department.jpg" class="img-fluid rounded-lg"
                            alt="{{ __('services.about.section_title') }}">
                        <a href="#" class="glightbox pulsating-play-btn"
                            title="{{ __('services.about.section_title') }}"></a>
                    </div>
                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                        <h3>{{ __('services.about.heading') }}</h3>
                        <p class="fst-italic">{{ __('services.about.intro') }}</p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i>
                                <span>{{ __('services.about.features.equipments') }}</span>
                            </li>
                            <li><i class="bi bi-check2-all"></i> <span>{{ __('services.about.features.team') }}</span></li>
                            <li><i class="bi bi-check2-all"></i> <span>{{ __('services.about.features.services') }}</span>
                            </li>
                        </ul>
                        <p>{{ __('services.about.description') }}</p>
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
                                <p>{{ __('services.stats.doctors') }}</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="far fa-hospital flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>{{ __('services.stats.services') }}</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="fas fa-flask flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>{{ __('services.stats.labs') }}</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="fas fa-award flex-shrink-0"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="28" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>{{ __('services.stats.certifications') }}</p>
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
                        <img src="assets/images/circuit.jpg" alt="{{ __('services.features.image_alt') }}">
                    </div>

                    <div class="col-lg-5 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <h3>{{ __('services.features.title') }}</h3>
                        <p>{{ __('services.features.description') }}</p>

                        @foreach (__('services.features.boxes') as $box)
                            <div class="icon-box d-flex position-relative" data-aos="fade-up"
                                data-aos-delay="{{ 300 + $loop->index * 100 }}">
                                <i
                                    class="bi
                        @switch($loop->index)
                            @case(0) bi-person-heart @break
                            @case(1) bi-activity @break
                            @case(2) bi-people-fill @break
                            @case(3) bi-shield-check @break
                            @default bi-star
                        @endswitch
                    flex-shrink-0"></i>
                                <div>
                                    <h4><a href="" class="stretched-link">{{ $box['title'] }}</a></h4>
                                    <p>{{ $box['description'] }}</p>
                                </div>
                            </div><!-- End Icon Box -->
                        @endforeach
                    </div>
                </div>
            </div>
        </section><!-- /Features Section -->

        <section id="services" class="services section light-background">
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('services.title') }}</h2>
                <p>{{ __('services.subtitle') }}</p>
            </div>

            <div class="container">
                <div class="row gy-4">
                    @foreach (__('services.services') as $index => $service)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="{{ $service['icon'] }}"></i>
                                </div>
                                <a href="#" class="stretched-link" aria-label="{{ $service['name'] }}">
                                    <h3>{{ $service['name'] }}</h3>
                                </a>
                                <p>{{ $service['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- Tabs Section -->
        <section id="tabs" class="tabs section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('services.departments_title') }}</h2>
                <p>{{ __('services.departments_subtitle') }}</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            @foreach (['cardiology', 'pediatrics', 'surgery', 'maternity', 'imaging'] as $index => $dept)
                                <li class="nav-item">
                                    <a id="nav-link" class="nav-link {{ $index === 0 ? 'active show' : '' }}"
                                        data-bs-toggle="tab" href="#tabs-tab-{{ $index + 1 }}">
                                        {{ __('services.tabs.' . $dept . '.title') }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            @foreach (['cardiology', 'pediatrics', 'surgery', 'maternity', 'imaging'] as $index => $dept)
                                <div class="tab-pane {{ $index === 0 ? 'active show' : '' }}"
                                    id="tabs-tab-{{ $index + 1 }}">
                                    <div class="row">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3>{{ __('services.tabs.' . $dept . '.title') }}</h3>
                                            <p class="fst-italic">{{ __('services.tabs.' . $dept . '.italic') }}</p>
                                            <p>{{ __('services.tabs.' . $dept . '.description') }}</p>
                                        </div>
                                        <div class="col-lg-4 text-center order-1 order-lg-2">
                                            <img src="assets/images/department.jpg"
                                                alt="{{ __('services.tabs.' . $dept . '.image_alt') }}"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Tabs Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section bg-gray-50 py-16">
            <!-- Section Title -->
            <div class="container section-title text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800">{{ __('services.testimonials_title') }}</h2>
                <p class="text-gray-600 mt-2">{{ __('services.testimonials_desc') }}</p>
            </div>

            <!-- Témoignages -->
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
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 1,
                            "spaceBetween": 20
                        },
                        "768": {
                            "slidesPerView": 2,
                            "spaceBetween": 30
                        },
                        "1200": {
                            "slidesPerView": 3,
                            "spaceBetween": 40
                        }
                    }
                }
            </script>

                    <div class="swiper-wrapper">
                        @forelse ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div
                                    class="testimonial-item bg-white rounded-3xl shadow-lg p-6 text-center mx-auto max-w-md transition hover:shadow-xl">
                                    <p class="text-gray-600 italic mb-4 relative">
                                        <i
                                            class="bi bi-quote quote-icon-left text-indigo-500 text-lg absolute -left-4 top-0"></i>
                                        {{ $testimonial->content }}
                                        <i
                                            class="bi bi-quote quote-icon-right text-indigo-500 text-lg absolute -right-4 bottom-0"></i>
                                    </p>

                                    @if ($testimonial->image)
                                        <img src="{{ Storage::url($testimonial->image) }}"
                                            class="testimonial-img w-20 h-20 object-cover rounded-full mx-auto mb-3"
                                            alt="Photo de {{ $testimonial->author_name }}">
                                    @else
                                        <img src="{{ asset('img/default-avatar.png') }}"
                                            class="testimonial-img w-20 h-20 object-cover rounded-full mx-auto mb-3"
                                            alt="Photo par défaut">
                                    @endif

                                    <h3 class="text-lg font-semibold text-indigo-700 mb-1">{{ $testimonial->author_name }}
                                    </h3>
                                    <h4 class="text-sm text-gray-500">{{ $testimonial->author_title ?? 'Patient' }}</h4>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <p class="text-gray-500">Aucun témoignage disponible pour le moment.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="swiper-pagination mt-6"></div>
                </div>
            </div>
        </section>


        <!-- Doctors Section -->
        <section id="doctors" class="doctors section bg-white py-16">
            <!-- Section Title -->
            <div class="container section-title text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800">
                    {{ __('services.doctors_title') != 'services.doctors_title' ? __('services.doctors_title') : 'Notre Équipe Médicale' }}
                </h2>
                <p class="text-gray-600 mt-2">
                    {{ __('services.doctors_subtitle') != 'services.doctors_subtitle' ? __('services.doctors_subtitle') : 'Une équipe de professionnels de santé dévoués et expérimentés à votre service' }}
                </p>
            </div>

            <!-- Swiper Doctors -->
            <div class="swiper init-swiper container" data-aos="fade-up" data-aos-delay="100">
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
                        "spaceBetween": 20
                    },
                    "768": {
                        "slidesPerView": 2,
                        "spaceBetween": 30
                    },
                    "1200": {
                        "slidesPerView": 3,
                        "spaceBetween": 40
                    }
                }
            }
        </script>

                <div class="swiper-wrapper">
                    @forelse ($doctors as $doctor)
                        <div class="swiper-slide">
                            <div
                                class="team-member max-w-sm mx-auto bg-white rounded-2xl shadow-md overflow-hidden transition hover:shadow-lg h-full">
                                <div class="member-img relative">
                                    @if ($doctor->profile_picture)
                                        <img src="{{ Storage::url($doctor->profile_picture) }}"
                                            alt="Photo de {{ $doctor->name }}"
                                            class="w-full h-64 object-cover object-top transition-transform duration-300 hover:scale-105">
                                    @else
                                        <img src="{{ asset('img/default-doctor-avatar.png') }}"
                                            alt="Photo de docteur par défaut"
                                            class="w-full h-64 object-cover object-top transition-transform duration-300 hover:scale-105">
                                    @endif
                                </div>

                                <div class="member-info p-5 text-center">
                                    <h4 class="text-xl font-semibold text-indigo-800">{{ $doctor->name }}</h4>
                                    <span
                                        class="text-sm text-gray-500 block mt-1">{{ $doctor->specialty ?? 'Généraliste' }}</span>

                                    <p class="text-gray-600 text-sm mt-3 line-clamp-3">
                                        {{ Str::limit($doctor->bio, 120) ?? 'Pas de biographie disponible.' }}
                                    </p>

                                    {{-- Icônes sociales optionnelles --}}
                                    {{-- <div class="mt-4 flex justify-center space-x-3 text-gray-400 text-sm">
                                <a href="#"><i class="bi bi-twitter"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                            </div> --}}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <p class="text-gray-500">Aucun docteur disponible pour le moment.</p>
                        </div>
                    @endforelse
                </div>

                <div class="swiper-pagination mt-6"></div>
            </div>
        </section>

    <section id="gallery" class="gallery section light-background">

        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('services.gallery_title') }}</h2> 
            <p>{{ __('services.gallery_desc') }}</p> 
        </div><div class="container" data-aos="fade-up" data-aos-delay="100">

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
                    @forelse ($galleryImages as $image)
                        <div class="swiper-slide">
                            <a class="glightbox" data-gallery="images-gallery"
                                href="{{ Storage::url($image->path) }}"
                                title="{{ $image->filename ?? 'Image de la galerie' }}"> 
                                <img src="{{ Storage::url($image->path) }}" class="img-fluid"
                                    alt="{{ $image->filename ?? 'Image de la galerie' }}">
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <p>Aucune image disponible dans la galerie pour le moment.</p>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>

        <!-- Faq Section -->
        <section id="faq" class="faq section" style='background : white'>
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('services.faq_title') }}</h2>
                <p>{{ __('services.faq_desc') }}</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="faq-container">
                    <div class="faq-item">
                        <h3>{{ __('services.faq_1_question') }}</h3>
                        <div class="faq-content">
                            <p>{{ __('services.faq_1_answer') }}</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <div class="faq-item">
                        <h3>{{ __('services.faq_2_question') }}</h3>
                        <div class="faq-content">
                            <p>{{ __('services.faq_2_answer') }}</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <div class="faq-item">
                        <h3>{{ __('services.faq_3_question') }}</h3>
                        <div class="faq-content">
                            <p>{{ __('services.faq_3_answer') }}</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <div class="faq-item">
                        <h3>{{ __('services.faq_4_question') }}</h3>
                        <div class="faq-content">
                            <p>{{ __('services.faq_4_answer') }}</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <div class="faq-item">
                        <h3>{{ __('services.faq_5_question') }}</h3>
                        <div class="faq-content">
                            <p>{{ __('services.faq_5_answer') }}</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                </div>
            </div>
        </section><!-- /Faq Section -->


    </main>
@endsection
