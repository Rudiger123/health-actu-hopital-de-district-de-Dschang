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


        <div class="container pt-16">
            <div class="row">

                <div class="col-lg-8">

                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container" data-aos="fade-up">

                            <article class="article">

                                <div class="hero-img" data-aos="zoom-in">
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Featured blog image"
                                        class="img-fluid" loading="lazy">
                                    <div class="meta-overlay">
                                        <div class="meta-categories">
                                            <a href="#" class="category">{{ $post->category->name }}</a>
                                            <span class="divider">•</span>
                                            <span class="reading-time"><i class="bi bi-clock"></i> 6 min read</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                                    <div class="content-header">
                                        <h1 class="title">{{ $post->title }}</h1>

                                        <div class="author-info">
                                            <div class="author-details">

                                                @if ($post->author->picture)
                                                    <img src="{{ asset('storage/' . $post->author->picture) }}"
                                                        alt="Author image" class="author-img">
                                                @else
                                                    <div class="flex-shrink-0">
                                                        <div
                                                            class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold">
                                                            {{ substr($post->author->name, 0, 1) }}
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="info">
                                                    <h4>{{ $post->author->name }}</h4>
                                                    <span class="role">{{ $post->author->username }}</span>
                                                </div>
                                            </div>
                                            <div class="post-meta">
                                                <span class="date"><i class="bi bi-calendar3"></i>
                                                    {{ $post->created_at->format('d F Y \à H:i') }}</span>
                                                <span cla ss="divider">•</span>
                                                <span class="comments"><i class="bi bi-chat-text"></i>
                                                    {{ $post->comments()->count() }} {{ __('comments') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p>
                                            {{ $post->content }}
                                        </p>

                                    </div>

                                    <div class="meta-bottom">
                                        <div class="tags-section">
                                            <h4>{{ __('Related Topics') }}</h4>
                                            <div class="tags">
                                                @foreach ($post->tags as $tag)
                                                    <a href="#" class="tag">{{ $tag->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="share-section">
                                            <h4>{{ __('Share Article') }}</h4>
                                            <div class="social-links">
                                                <!-- Twitter (X) -->
                                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode(__('Check out this page:') . ' ' . (isset($shareTitle) ? $shareTitle : config('app.name'))) }}"
                                                    class="twitter" target="_blank" rel="noopener noreferrer"
                                                    title="{{ __('Share on Twitter') }}">
                                                    <i class="bi bi-twitter-x"></i>
                                                </a>

                                                <!-- Facebook -->
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                                    class="facebook" target="_blank" rel="noopener noreferrer"
                                                    title="{{ __('Share on Facebook') }}">
                                                    <i class="bi bi-facebook"></i>
                                                </a>

                                                <!-- LinkedIn -->
                                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                                    class="linkedin" target="_blank" rel="noopener noreferrer"
                                                    title="{{ __('Share on LinkedIn') }}">
                                                    <i class="bi bi-linkedin"></i>
                                                </a>

                                                <a href="https://wa.me/?text={{ urlencode(__('Check this out:') . ' ' . url()->current()) }}"
                                                    class="whatsapp" title="{{ __('Share on WhatsApp') }}">
                                                    <i class="bi bi-whatsapp"></i>
                                                </a>

                                                <!-- Copy Link -->
                                                <a href="#" class="copy-link" title="{{ __('Copy Link') }}"
                                                    onclick="event.preventDefault(); copyToClipboard('{{ url()->current() }}')">
                                                    <i class="bi bi-link-45deg"></i>
                                                </a>
                                            </div>

                                            <script>
                                                function copyToClipboard(text) {
                                                    navigator.clipboard.writeText(text).then(() => {
                                                        // Notification toast temporaire
                                                        const notification = document.createElement('div');
                                                        notification.className = 'copy-notification';
                                                        notification.textContent = '{{ __('Link copied to clipboard!') }}';
                                                        document.body.appendChild(notification);

                                                        setTimeout(() => {
                                                            notification.remove();
                                                        }, 2000);
                                                    }).catch(err => {
                                                        console.error('Error copying text: ', err);
                                                        alert('{{ __('Failed to copy link. Please try again.') }}');
                                                    });
                                                }
                                            </script>

                                            <style>
                                                .social-links {
                                                    display: flex;
                                                    gap: 12px;
                                                }

                                                .social-links a {
                                                    display: inline-flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    width: 36px;
                                                    height: 36px;
                                                    border-radius: 50%;
                                                    color: white;
                                                    font-size: 18px;
                                                    transition: transform 0.2s, opacity 0.2s;
                                                }

                                                .social-links a:hover {
                                                    transform: scale(1.1);
                                                    opacity: 0.9;
                                                }

                                                .social-links .twitter {
                                                    background-color: #000000;
                                                }

                                                /* Twitter/X couleur noire */
                                                .social-links .facebook {
                                                    background-color: #3b5998;
                                                }

                                                .social-links .linkedin {
                                                    background-color: #0077b5;
                                                }

                                                .social-links .copy-link {
                                                    background-color: #6c757d;
                                                }

                                                .copy-notification {
                                                    position: fixed;
                                                    bottom: 20px;
                                                    left: 50%;
                                                    transform: translateX(-50%);
                                                    background: rgba(0, 0, 0, 0.8);
                                                    color: white;
                                                    padding: 10px 20px;
                                                    border-radius: 5px;
                                                    z-index: 1000;
                                                    animation: fadeInOut 2s ease-in-out;
                                                }

                                                @keyframes fadeInOut {
                                                    0% {
                                                        opacity: 0;
                                                    }

                                                    10% {
                                                        opacity: 1;
                                                    }

                                                    90% {
                                                        opacity: 1;
                                                    }

                                                    100% {
                                                        opacity: 0;
                                                    }
                                                }
                                            </style>
                                        </div>
                                    </div>

                                </div>

                            </article>

                        </div>
                    </section><!-- /Blog Details Section -->

                    <!-- Blog Author Section -->
                    <section id="blog-author" class="blog-author section">

                        <div class="container" data-aos="fade-up">
                            <div class="author-box">
                                <div class="row align-items-center">
                                    <div class="col-lg-3 col-md-4 text-center">
                                        <img src="{{ asset('storage/' . $post->author->picture) }}"
                                            class="author-img rounded-circle" alt="" loading="lazy">

                                        <div class="author-social-links mt-3">
                                            <a href="https://twitter.com/#" class="twitter"><i
                                                    class="bi bi-twitter-x"></i></a>
                                            <a href="https://linkedin.com/#" class="linkedin"><i
                                                    class="bi bi-linkedin"></i></a>
                                            <a href="https://github.com/#" class="github"><i class="bi bi-github"></i></a>
                                            <a href="https://facebook.com/#" class="facebook"><i
                                                    class="bi bi-facebook"></i></a>
                                            <a href="https://instagram.com/#" class="instagram"><i
                                                    class="bi bi-instagram"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-9 col-md-8">
                                        <div class="author-content">
                                            <h3 class="author-name">{{ $post->author->name }}</h3>
                                            <span class="author-title">{{ $post->author->type }}</span>

                                            <div class="author-bio mt-3">
                                                {{ Str::words($post->author->bio, 20, '...') }}
                                            </div>

                                            <div class="author-website mt-3">

                                                <a href="{{ route('author_posts', $post->author->username) }}"
                                                    class="more-posts">
                                                    {{ __('Read More from') }} {{ $post->author->name }} <i
                                                        class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section><!-- /Blog Author Section -->

                    @livewire('blog.comments-section', [
                        'post' => $post,
                    ])

                </div>

                <div class="col-lg-4 sidebar">

                    <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

                        <!-- Search Widget -->
                        <div class="search-widget widget-item">

                            <h3 class="widget-title">{{ __('search') }}</h3>
                            @livewire('partials.search-bar')

                        </div><!--/Search Widget -->

                        <!-- Categories Widget -->
                        <x-front.category-sidebar></x-front.category-sidebar>
                        <!--/Categories Widget -->

                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">

                            <h3 class="widget-title">Related Posts</h3>

                            @foreach ($relatedPosts as $post)
                                <div class="post-item">
                                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                        class="flex-shrink-0">
                                    <div>
                                        <h4><a href="{{ route('blog.show', $post->slug) }}">
                                                {{ Str::words($post->title, 6, '...') }}</a></h4>
                                        <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                                            {{ $post->created_at->format('M j, Y') }}
                                        </time>
                                    </div>
                                </div><!-- End recent post item-->
                            @endforeach


                        </div><!--/Recent Posts Widget -->

                        <!-- Tags Widget -->
                        <x-front.tag-sidebar></x-front.tag-sidebar>
                        <!--/Tags Widget -->

                    </div>

                </div>

            </div>
        </div>

    </main>
@endsection
