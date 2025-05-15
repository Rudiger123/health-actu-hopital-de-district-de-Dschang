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
                            <<h4><a href="" class="stretched-link">{{ __('services.cardiology') }}</a></h4>
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
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"
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
        <section id="testimonials" class="testimonials section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ __('services.testimonials_title') }}</h2>
                <p>{{ __('services.testimonials_desc') }}</p>
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
                                                                                                                       <img src="assets/images/doctors/doctor-1.jpg" class="img-fluid" alt="">
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
                                                                                                                       <img src="assets/images/doctors/doctor-2.jpg" class="img-fluid" alt="">
                                                                                                                       
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
                                                                                                                       <img src="assets/images/doctors/doctor-3.jpg" class="img-fluid" alt="">
                                                                                                                       
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
                                                                                                                       <img src="assets/images/doctors/doctor-4.jpg" class="img-fluid" alt="">
                                                                                                                       
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
                                                                                                               <h2>{{ __('services.gallery_title') }}</h2>
                                                                                                               <p>{{ __('services.gallery_desc') }}</p>
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
                                                                                                                   <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/images/gallery/gallery-1.jpeg"><img src="assets/images/gallery/gallery-1.jpeg" class="img-fluid" alt=""></a></div>
                                                                                                                   <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/images/gallery/gallery-2.jpeg"><img src="assets/images/gallery/gallery-2.jpeg" class="img-fluid" alt=""></a></div>
                                                                                                                   <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/images/gallery/gallery-3.jpeg"><img src="assets/images/gallery/gallery-3.jpeg" class="img-fluid" alt=""></a></div>
                                                                                                                 </div>
                                                                                                                 <div class="swiper-pagination"></div>
                                                                                                               </div>
           
                                                                                                             </div>
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
