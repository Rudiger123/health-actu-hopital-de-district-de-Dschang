<div>
    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <!-- Category Postst Section -->
                <section id="category-postst" class="category-postst section">

                    <div class="container" data-aos="fade-up" data-aos-delay="100">
                        <div class="row gy-4">

                            @foreach ($posts as $post)
                                <div class="col-lg-6">
                                    <article>

                                        <div class="post-img">
                                            <img src="{{ asset('storage/' . $post->image_path) }}" alt=""
                                                class="img-fluid">
                                        </div>

                                        <p class="post-category">{{ $post->category->name }}</p>

                                        <h2 class="title">
                                            <a href="{{ route('blog.show', $post->slug) }}">
                                                {{ Str::words($post->title, 5, '...') }}</a>
                                        </h2>

                                        <div class="d-flex align-items-center">
                                            @if ($post->author->picture)
                                                <img src="{{ asset('storage/' . $post->author->picture) }}"
                                                    alt="" class="img-fluid post-author-img flex-shrink-0">
                                            @else
                                                <div class="flex-shrink-0 mx-4">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold">
                                                        {{ substr($post->author->name, 0, 1) }}
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="post-meta">
                                                <p class="post-author">{{ $post->author->name }}</p>
                                                <p class="post-date">
                                                    <time
                                                        datetime="2022-01-01">{{ $post->created_at->format('d F Y \à H:i') }}</time>
                                                </p>
                                            </div>
                                        </div>

                                    </article>
                                </div><!-- End post list item -->
                            @endforeach

                        </div>
                    </div>

                </section><!-- /Category Postst Section -->

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
            </div>

            <div class="col-lg-4 sidebar">

                <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="search-widget widget-item">
                        <h3 class="widget-title">{{ __('blog.search_title') }}</h3>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="{{ __('blog.search_placeholder') }}"
                                wire:model.defer="query" wire:keydown.enter="searchPosts">
                    
                            <button class="btn btn-primary" wire:click="search">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div><!--/Search Widget -->

                    <!-- Categories Widget -->
                    <x-front.category-sidebar></x-front.category-sidebar>
                    <!--/Categories Widget -->

                    <!-- Recent Posts Widget -->
                    <div class="recent-posts-widget widget-item">
                        <h3 class="widget-title">{{ __('blog.recent_posts') }}</h3>
                    
                        @foreach ($recentPosts as $post)
                            <div class="post-item">
                                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                    class="flex-shrink-0">
                                <div>
                                    <h4><a href="{{ route('blog.show', $post->slug) }}">
                                            {{ Str::words($post->title, 6, '...') }}</a></h4>
                                    <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                                        {{ $post->created_at->translatedFormat('j F Y') }}
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

</div>
</div>
