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
    
        style="background-image: url('{{ asset('assets/images/blog-4.jpg') }}');">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-gray-800 bg-opacity-60"></div>

            <!-- Breadcrumbs + Text -->
            <div class="relative z-10 flex flex-col justify-center items-center text-center h-full px-4 text-white">
                <!-- Breadcrumbs -->
                <nav class="mb-4" aria-label="breadcrumb">
                    <ol class="flex space-x-2 text-sm md:text-base">
                        <li>
                            <a href="{{ route('home') }}" class="hover:underline flex items-center">
                                <i class="bi bi-house mr-1"></i> Accueil
                            </a>
                        </li>
                        <li>/</li>
                        <li>
                            <a href="{{ route('blog.index') }}" class="hover:underline">Blog</a>
                        </li>
                        <li>/</li>
                        <li class="font-semibold text-gray-300">{{ $tag->name }}</li>
                    </ol>
                </nav>

                <!-- Title and Description -->
                <div class="title-wrapper">
                    <h1 class="text-gray-300">Articles avec le tag : {{ $tag->name }}</h1>
                    <p>
                        Nous avons trouvé <strong>{{ $posts->total() }}</strong>
                        résultats pour le tag <strong>"{{ $tag->name }}"</strong>
                    </p>
                </div>
            </div>
        </div>

        <!-- Search Results Posts Section -->
        <section id="search-results-posts" class="search-results-posts section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                @if ($posts->count() > 0)
                    <div class="row gy-4">
                        @foreach ($posts as $post)
                            <div class="col-lg-4">
                                <article class="post-item">
                                    <div class="post-img">
                                        <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                            class="img-fluid">
                                    </div>

                                    <p class="post-category">{{ $post->category->name }}</p>

                                    <h2 class="title">
                                        <a href="{{ route('blog.show', $post->slug) }}">
                                            {{ Str::limit($post->title, 60, '...') }}
                                        </a>
                                    </h2>

                                    <div class="d-flex align-items-center">
                                        @if ($post->author->picture)
                                            <img src="{{ asset('storage/' . $post->author->picture) }}" alt=""
                                                class="img-fluid post-author-img flex-shrink-0">
                                        @else
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold">
                                                    {{ substr($post->author->name, 0, 1) }}
                                                </div>
                                            </div>
                                        @endif
                                        <div class="post-meta">
                                            <p class="post-author">{{ $post->author->name }}</p>
                                            <p class="post-date">
                                                <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                                                    {{ $post->created_at->translatedFormat('d M Y') }}
                                                </time>
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-results text-center py-5">
                        <i class="bi bi-tag text-muted" style="font-size: 4rem"></i>
                        <h3 class="mt-4">Aucun article trouvé</h3>
                        <p class="text-muted">Aucun résultat pour le tag "{{ $tag->name }}"</p>
                        <a href="{{ route('blog.index') }}" class="btn btn-primary">
                            Retour au blog
                        </a>
                    </div>
                @endif
            </div>

        </section>

        @if ($posts->hasPages())
            <!-- Pagination Section -->
            <section id="pagination-3" class="pagination-3 section">
                <div class="container">
                    <div class="d-flex justify-content-center">
                        {{ $posts->onEachSide(1)->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </section>
        @endif

    </main>

@endsection
