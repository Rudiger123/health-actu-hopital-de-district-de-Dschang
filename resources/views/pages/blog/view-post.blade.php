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
                                    <img src="{{ asset("storage/".$post->image_path) }}" alt="Featured blog image" class="img-fluid"
                                        loading="lazy">
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
                                                <img src="{{ asset("storage/".$post->author->picture) }}" alt="Author image" class="author-img">
                                                <div class="info">
                                                    <h4>{{ $post->author->name }}</h4>
                                                    <span class="role">{{ $post->author->username }}</span>
                                                </div>
                                            </div>
                                            <div class="post-meta">
                                                <span class="date"><i class="bi bi-calendar3"></i> {{ $post->created_at->format('d F Y \à H:i') }}</span>
                                                <span class="divider">•</span>
                                                <span class="comments"><i class="bi bi-chat-text"></i> 18 Comments</span>
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
                                            <h4>Related Topics</h4>
                                            <div class="tags">
                                                @foreach ($post->tags as $tag)
                                                <a href="#" class="tag">{{ $tag->name }}</a>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="share-section">
                                            <h4>Share Article</h4>
                                            <div class="social-links">
                                                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                                <a href="#" class="copy-link" title="Copy Link"><i
                                                        class="bi bi-link-45deg"></i></a>
                                            </div>
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
                                        <img src="{{ asset("storage/".$post->author->picture) }}" class="author-img rounded-circle"
                                            alt="" loading="lazy">

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
                                                {{ $post->author->bio }}
                                            </div>

                                            <div class="author-website mt-3">

                                                <a href="#" class="more-posts">
                                                    Read More from Sarah <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section><!-- /Blog Author Section -->

                    {{-- comments section --}}

                </div>

                <div class="col-lg-4 sidebar">

                    <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

                        <!-- Search Widget -->
                        <div class="search-widget widget-item">

                            <h3 class="widget-title">Search</h3>
                            <form action="">
                                <input type="text">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>

                        </div><!--/Search Widget -->

                        <!-- Categories Widget -->
                        <div class="categories-widget widget-item">

                            <h3 class="widget-title">Categories</h3>
                            <ul class="mt-3">
                                <li><a href="#">General <span>(25)</span></a></li>
                                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                                <li><a href="#">Travel <span>(5)</span></a></li>
                                <li><a href="#">Design <span>(22)</span></a></li>
                                <li><a href="#">Creative <span>(8)</span></a></li>
                                <li><a href="#">Educaion <span>(14)</span></a></li>
                            </ul>

                        </div><!--/Categories Widget -->

                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">

                            <h3 class="widget-title">Recent Posts</h3>

                            <div class="post-item">
                                <img src="assets/img/blog/blog-post-square-1.webp" alt="" class="flex-shrink-0">
                                <div>
                                    <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                            <div class="post-item">
                                <img src="assets/img/blog/blog-post-square-2.webp" alt="" class="flex-shrink-0">
                                <div>
                                    <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                            <div class="post-item">
                                <img src="assets/img/blog/blog-post-square-3.webp" alt="" class="flex-shrink-0">
                                <div>
                                    <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                            <div class="post-item">
                                <img src="assets/img/blog/blog-post-square-4.webp" alt="" class="flex-shrink-0">
                                <div>
                                    <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                            <div class="post-item">
                                <img src="assets/img/blog/blog-post-square-5.webp" alt="" class="flex-shrink-0">
                                <div>
                                    <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                        </div><!--/Recent Posts Widget -->

                        <!-- Tags Widget -->
                        <div class="tags-widget widget-item">

                            <h3 class="widget-title">Tags</h3>
                            <ul>
                                <li><a href="#">App</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Mac</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Studio</a></li>
                                <li><a href="#">Smart</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>

                        </div><!--/Tags Widget -->

                    </div>

                </div>

            </div>
        </div>

    </main>
@endsection
