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
            $image1 = 'assets/images/blog-1.jpg';
            $image2 = 'assets/images/blog-2.jpg';
            $image3 = 'assets/images/blog-3.jpg';

            $titel1 = __('blog.hero.titel1');
            $text1 = __('blog.hero.text1');
            $titel2 = __('blog.hero.titel2');
            $text2 = __('blog.hero.text2');
            $titel3 = __('blog.hero.titel3');
            $text3 = __('blog.hero.text3');
        @endphp

        <x-layouts.hero :image1="$image1" :image2="$image2" :image3="$image3" :text1="$text1" :text2="$text2"
            :text3="$text3" :titel1="$titel1" :titel2="$titel2" :titel3="$titel3"></x-layouts.hero>
        <section id="blog-hero" class="blog-hero mission-section">
            <div class="container" data-aos="fade-up">
                <div class="mission-statement">
                    <!-- Carte Principale -->
                    <div class="mission-card" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pulse-effect"></div>
                        <img src="assets/images/IMG-20250509-WA0033.jpg" alt="{{ __('blog.mission.title') }}"
                            class="mission-hero-img">

                        <div class="mission-content">
                            <div class="icon-container">
                                <i class="bi bi-heart-pulse-fill heartbeat-anim"></i>
                            </div>
                            <h2 class="mission-title">{{ __('blog.mission.title') }}</h2>
                            <p class="mission-text">{!! __('blog.mission.text') !!}</p>

                            <div class="mission-pillars">
                                @foreach (__('blog.mission.pillars') as $pillar)
                                    <div class="pillar" data-aos="fade-right" data-aos-delay="200">
                                        <div class="pillar-icon">
                                            @php
                                                $icons = [
                                                    '1' => 'bi-lightbulb-fill',
                                                    '2' => 'bi-people-fill',
                                                    '3' => 'bi-search-heart-fill',
                                                ];
                                            @endphp
                                            <i class="bi {{ $icons[$loop->iteration] ?? 'bi-lightbulb-fill' }}"></i>
                                        </div>
                                        <h3>{{ $pillar['title'] }}</h3>
                                        <p>{{ $pillar['text'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Bandeau Engagements -->
                    <div class="commitment-band" data-aos="fade-up" data-aos-delay="500">
                        <div class="commitment-item">
                            <span class="commitment-number">100%</span>
                            <span class="commitment-text">{{ __('blog.mission.commitments.validated_info') }}</span>
                        </div>
                        <div class="commitment-separator"></div>
                        <div class="commitment-item">
                            <span class="commitment-number">0</span>
                            <span class="commitment-text">{{ __('blog.mission.commitments.no_sponsored') }}</span>
                        </div>
                        <div class="commitment-separator"></div>
                        <div class="commitment-item">
                            <span class="commitment-number">∞</span>
                            <span class="commitment-text">{{ __('blog.mission.commitments.determination') }}</span>
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
                <h2>{{ __('blog.news_section.title') }}</h2>
                <div>
                    <span class="description-title" style="color: #007bff;">
                        {{ __('blog.news_section.subtitle') }}
                    </span>
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
                                    {{-- @dump($post) --}}
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
                                    <div class="blog-post-content">
                                        <div class="post-meta">
                                            <span><i class="bi bi-person"></i> {{ $post->author->name }}</span>
                                            <span>
                                                <i class="bi bi-clock"></i>
                                                {{ $post->created_at->isoFormat('DD MMMM YYYY [à] HH:mm') }}
                                            </span>
                                            <span><i class="bi bi-chat-dots"></i> {{ $post->comments()->count() }}
                                                {{ __('blog.comments') }}</span>
                                        </div>
                                        <h2>
                                            <a href="{{ route('blog.show', $post->slug) }}">
                                                {{ Str::words($post->title, 5, '...') }}
                                            </a>
                                        </h2>
                                        <p>{{ Str::limit(strip_tags($post->content), 100) }}</p>
                                        <a href="{{ route('blog.show', $post->slug) }}" class="read-more">
                                            {{ __('blog.read_more') }} <i class="bi bi-arrow-right"></i>
                                        </a>
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
                        <span class="badge text-uppercase mb-2">{{ __('blog.badge') }}</span>
                        <h2>{{ __('blog.title') }}</h2>
                        <p class="my-4">{{ __('blog.text') }}</p>
                    </div>

                    <div class="content-right position-relative" data-aos="fade-left" data-aos-delay="300">
                        <img src="assets/images/news.jpg" alt="Actualités Médicales"
                            class="img-fluid rounded-4 w-24 h-10">
                        <div class="floating-card">
                            <div class="card-icon">
                                <i class="bi bi-newspaper"></i>
                            </div>
                            <div class="card-content">
                                <span class="stats-number">100%</span>
                                <span class="stats-text">{{ __('blog.stat') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="decoration">
                        <div class="circle-1"></div>
                        <div class="circle-2"></div>
                    </div>

                </div>
            </div>
        </section>



        <!-- Latest Posts Section -->
        <section id="latest-posts" class="latest-posts section">

            <!-- Section Title -->
            <div class="container section-title-1" data-aos="fade-up">
                <h2>{{ __('blog.section_title') }}</h2>
                <div>
                    <span class="description-title" style="color: #007bff;">
                        {{ __('blog.section_subtitle') }}
                    </span>
                </div>
            </div><!-- End Section Title -->


            <div class="container" data-aos="fade-up" data-aos-delay="100">
                @livewire('front.post-view')
            </div>

        </section><!-- /Latest Posts Section -->

        @livewire('blog.newsletter-form')

    </main>
@endsection
