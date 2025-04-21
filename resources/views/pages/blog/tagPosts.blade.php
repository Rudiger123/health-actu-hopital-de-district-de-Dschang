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

        <!-- Page Title -->
        <div class="page-title">
            <div class="breadcrumbs">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">
                                <i class="bi bi-house"></i> Accueil
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('blog.index') }}">Blog</a>
                        </li>
                        <li class="breadcrumb-item active current">{{ $tag->name }}</li>
                    </ol>
                </nav>
            </div>

            <div class="title-wrapper">
                <h1>Articles avec le tag : {{ $tag->name }}</h1>
                <p>
                    Nous avons trouvé <strong>{{ $posts->total() }}</strong>
                    résultats pour le tag <strong>"{{ $tag->name }}"</strong>
                </p>
            </div>
        </div><!-- End Page Title -->

        <!-- Search Results Posts Section -->
        <section id="search-results-posts" class="search-results-posts section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                @if ($posts->count() > 0)
                    <div class="row gy-4">
                        @foreach ($posts as $post)
                            <div class="col-lg-4">
                                <article class="post-item">
                                    <div class="post-img">
                                        <img src="{{ asset("storage/".$post->image_path) }}" alt="{{ $post->title }}"
                                            class="img-fluid">
                                    </div>

                                    <p class="post-category">{{ $post->category->name }}</p>

                                    <h2 class="title">
                                        <a href="{{ route('blog.show', $post->slug) }}">
                                            {{ Str::limit($post->title, 60, '...') }}
                                        </a>
                                    </h2>

                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset("storage/".$post->author->picture) }}"
                                            alt="{{ $post->author->name }}"
                                            class="img-fluid post-author-img flex-shrink-0">
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
