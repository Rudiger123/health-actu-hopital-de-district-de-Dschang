<main class="main">
    <div class="page-title">
        <div class="breadcrumbs" style="background: transparent;">
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
                    <li class="breadcrumb-item active current">{{ $query }}</li>
                </ol>
            </nav>
        </div>
        <div class="title-wrapper text-center">
            <h1>Résultats de recherche</h1>
            <p>Nous avons trouvé <strong>{{ $posts->count() }}</strong> résultats pour
                "<strong>{{ $query }}</strong>"</p>
        </div>
    </div>

    <section class="search-results-posts section">
        <div class="container">
            @if ($posts->count())
                <div class="row gy-4">
                    @foreach ($posts as $post)
                        <div class="col-lg-4">
                            <article>
                                <div class="post-img">
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt=""
                                        class="img-fluid">
                                </div>

                                <p class="post-category">{{ $post->category->name }}</p>

                                <h2 class="title">
                                    <a
                                        href="{{ route('blog.show', $post->slug) }}">{{ Str::words($post->title, 10, '...') }}</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $post->author->picture) }}"
                                        class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author">{{ $post->author->name }}</p>
                                        <p class="post-date">
                                            <time
                                                datetime="{{ $post->created_at }}">{{ $post->created_at->format('d F Y à H:i') }}</time>
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-5">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="no-results text-center py-5">
                    <i class="bi bi-file-earmark-excel display-4 text-muted"></i>
                    <h3 class="mt-4">Aucun article trouvé</h3>
                    <p class="text-muted">Aucun résultat pour "<strong>{{ $query }}</strong>"</p>
                    <a href="{{ route('blog.index') }}" class="btn btn-primary">Retour au blog</a>
                </div>
            @endif
        </div>
    </section>

</main>
