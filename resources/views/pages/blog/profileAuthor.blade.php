@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main-1.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/main-1.js') }}"></script>
@endpush
@section('content')
    <main class="main">

        <!-- Page Title / Banner -->
            <div class="relative h-64 md:h-96 bg-center bg-cover md:my-28 my-24"
                style="background-image: url('{{ asset('assets/images/contact-1.jpg') }}');">
                <!-- Overlay -->
                <div class="absolute inset-0 bg-gray-700 bg-opacity-60"></div>

                <!-- Breadcrumbs + Text -->
                <div class="relative z-10 flex flex-col justify-center items-center text-center h-full px-4 text-white">
                    <!-- Breadcrumbs -->
                    <nav class="mb-4" aria-label="breadcrumb">
                        <ol class="flex space-x-2 text-sm md:text-base">
                            <li>
                                <a href="{{ route('home') }}" class="hover:underline flex items-center">
                                    <i class="bi bi-house mr-1"></i> {{ __('home') }}
                                </a>
                            </li>
                            <li>/</li>
                            <li>
                                <a href="{{ route('blog.index') }}" class="hover:underline">Blog</a>
                            </li>
                            <li>/</li>
                            <li class="font-semibold text-gray-300">{{ $author->name }}</li>
                        </ol>
                    </nav>

                    <!-- Title and Description -->
                    <h1 class="text-2xl md:text-4xl font-bold text-gray-200">Profil de l'Auteur</h1>
                    <p class="mt-2 text-sm md:text-lg text-gray-200">
                        Ici une petite présentation de ce que contient la page.
                    </p>
                </div>
            </div>

            <!-- Author Profile Section -->
            <section id="author-profile" class="author-profile section">
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="author-profile-1">
                        <div class="row">
                            <!-- Author Info -->
                            <div class="col-lg-4 mb-4 mb-lg-0">
                                <div class="author-card" data-aos="fade-up">
                                    <div class="author-image">
                                        <img src="{{ asset('storage/' . $author->picture) }}" alt="{{ $author->name }}"
                                            class="img-fluid">
                                    </div>

                                    <div class="author-info">
                                        <h2>{{ $author->name }}</h2>
                                        <p class="designation">{{ $author->type }}</p>

                                        <div class="author-bio">
                                            contient un message convainquant
                                        </div>

                                        @php
                                            $count = 0;
                                            $like = 0;
                                            foreach ($author->posts as $post) {
                                                $count = $count + $post->comments()->count();
                                                foreach ($post->comments as $comment) {
                                                    $like = $like + $comment->likes()->count();
                                                }
                                            }
                                        @endphp

                                        <div class="author-stats d-flex justify-content-between text-center my-4">
                                            <div class="stat-item">
                                                <h4 class="">{{ $countPosts }}</h4>
                                                <p>Articles</p>
                                            </div>
                                            <div class="stat-item">
                                                <h4 class="">{{ $count }}</h4>
                                                <p>commentaires</p>
                                            </div>
                                            <div class="stat-item">
                                                <h4 class="">{{ $like }}</h4>
                                                <p>Likes</p>
                                            </div>
                                        </div>

                                        <div class="social-links">
                                            <div class="social-links">
                                                <a href="{{ $link?->twitter }}" class="twitter"><i
                                                        class="bi bi-twitter"></i></a>
                                                <a href="{{ $link?->facebook }}" class="facebook"><i
                                                        class="bi bi-facebook"></i></a>
                                                <a href="{{ $link?->instagram }}" class="instagram"><i
                                                        class="bi bi-instagram"></i></a>
                                                <a href="{{ $link?->linkedin }}" class="linkedin"><i
                                                        class="bi bi-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Author Content -->
                            <div class="col-lg-8">
                                <div class="author-content" data-aos="fade-up" data-aos-delay="200">
                                    <div class="content-header">
                                        <h3>À Propos</h3>
                                    </div>
                                    <div class="content-body">
                                        <p>{{ $author->bio }}</p>

                                        @if ($author->expertise)
                                            <div class="expertise-areas">
                                                <h4>Domaines d'Expertise</h4>
                                                <div class="tags">
                                                    @foreach ($author->expertise as $expertise)
                                                        <span>{{ $expertise }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                        @if ($author->posts->count() > 0)
                                            <div class="featured-articles mt-5">
                                                <h4>Articles Récents</h4>
                                                <div class="row g-4">
                                                    @foreach ($author->posts as $post)
                                                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                                            <article class="article-card">
                                                                <div class="article-img">
                                                                    <img src="{{ asset('storage/' . $post->image_path) }}"
                                                                        alt="{{ $post->title }}" class="img-fluid">
                                                                </div>
                                                                <div class="article-details">
                                                                    <div class="post-category">{{ $post->category->name }}
                                                                    </div>
                                                                    <h5>
                                                                        <a href="{{ route('blog.show', $post->slug) }}">
                                                                            {{ Str::limit($post->title, 60, '...') }}
                                                                        </a>
                                                                    </h5>
                                                                    <div class="post-meta">
                                                                        <span><i class="bi bi-clock"></i>
                                                                            {{ $post->created_at->isoFormat('D MMM Y') }}
                                                                        </span>
                                                                        <span><i class="bi bi-chat-dots"></i>
                                                                            {{ $post->comments_count }} Commentaires
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>

    <style>
        /* Author Card */
        .author-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            position: relative;
        }

        .author-image {
            width: 200px;
            height: 200px;
            margin: -100px auto 1.5rem;
            border: 5px solid #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            overflow: hidden;
        }

        .designation {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .author-bio {
            color: #444;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        /* Expertise Tags */
        .tags span {
            display: inline-block;
            background: #f8f9fa;
            padding: 5px 15px;
            border-radius: 20px;
            margin: 5px;
            font-size: 0.85rem;
        }

        /* Article Card */
        .article-card {
            border: 1px solid #eee;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .article-card:hover {
            transform: translateY(-5px);
        }

        .article-img {
            height: 200px;
            overflow: hidden;
        }

        .article-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .article-details {
            padding: 1.5rem;
        }

        .post-category {
            color: #007bff;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
    </style>


@endsection
