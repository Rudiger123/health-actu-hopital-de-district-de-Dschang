<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Filtres période -->
        <div class="mb-4">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary {{ $timeRange === 'week' ? 'active' : '' }}"
                    wire:click="updateTimeRange('week')">
                    <i class="bi bi-calendar-week me-1"></i> {{ __('menu.week') }}
                </button>
                <button type="button" class="btn btn-outline-primary {{ $timeRange === 'month' ? 'active' : '' }}"
                    wire:click="updateTimeRange('month')">
                    <i class="bi bi-calendar-month me-1"></i> {{ __('menu.month') }}
                </button>
                <button type="button" class="btn btn-outline-primary {{ $timeRange === 'year' ? 'active' : '' }}"
                    wire:click="updateTimeRange('year')">
                    <i class="bi bi-calendar me-1"></i> {{ __('menu.year') }}
                </button>
            </div>
        </div>

        <div class="row">
            <!-- Carte de bienvenue -->
            <div class="col-xxl-8 mb-4 order-0">
                <div class="card bg-primary text-white">
                    <div class="d-flex align-items-start row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-white mb-3">{{ __('dashboard.welcome_team') }} 👋</h5>
                                <p class="mb-4 text-white-75">
                                    {{ __('dashboard.post_stats', ['count' => $recentPosts->count()]) }}<br>
                                    {{ __('dashboard.last_post') }}:
                                    "{{ $recentPosts->first()->title ?? __('dashboard.no_recent_posts') }}"
                                </p>
                                <a href="{{ route('admin.posts') }}" class="btn btn-light btn-sm">
                                    <i class="bi bi-plus-circle me-1"></i> {{ __('menu.new_post') }}
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('back/assets/img/man-with-laptop.png') }}" height="160"
                                    alt="{{ __('dashboard.medical_team') }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistiques rapides -->
            <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
                <div class="row">
                    <!-- Articles publiés -->
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-title d-flex justify-content-between mb-3">
                                    <span>{{ __('menu.published_posts') }}</span>
                                    <i class="bi bi-newspaper text-primary fs-4"></i>
                                </div>
                                <h3 class="card-title mb-1">{{ number_format($totalPosts) }}</h3>
                                <small class="{{ $postsIncrease >= 0 ? 'text-success' : 'text-danger' }} fw-medium">
                                    <i class="bi bi-arrow-{{ $postsIncrease >= 0 ? 'up' : 'down' }}"></i>
                                    {{ abs($postsIncrease) }}%
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Commentaires -->
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="card-title d-flex justify-content-between mb-3">
                                    <span>{{ __('menu.comments') }}</span>
                                    <i class="bi bi-chat-square-text text-info fs-4"></i>
                                </div>
                                <h3 class="card-title mb-1">{{ number_format($totalComments) }}</h3>
                                <small class="{{ $commentsIncrease >= 0 ? 'text-success' : 'text-danger' }} fw-medium">
                                    <i class="bi bi-arrow-{{ $commentsIncrease >= 0 ? 'up' : 'down' }}"></i>
                                    {{ abs($commentsIncrease) }}%
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activité récente -->
            <div class="col-12 col-xxl-8 order-2 order-md-3 order-xxl-2 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-clock-history me-2"></i>{{ __('menu.recent_activity') }}
                        </h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.posts') }}">{{ __('menu.view_all_posts') }}</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('admin.commentsManager') }}">{{ __('menu.view_all_comments') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="activityTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="posts-tab" data-bs-toggle="tab"
                                    data-bs-target="#posts" type="button" role="tab">
                                    <i class="bi bi-newspaper me-1"></i> {{ __('menu.posts') }}
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="comments-tab" data-bs-toggle="tab"
                                    data-bs-target="#comments" type="button" role="tab">
                                    <i class="bi bi-chat-square-text me-1"></i> {{ __('menu.comments') }}
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="activityTabsContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{ __('table.title') }}</th>
                                                <th>{{ __('table.author') }}</th>
                                                <th>{{ __('table.date') }}</th>
                                                <th>{{ __('table.status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentPosts as $post)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('admin.posts') }}" class="text-primary">
                                                            {{ Str::limit($post->title, 40) }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $post->author->name }}</td>
                                                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                                                    <td>
                                                        <span
                                                            class="badge bg-{{ $post->published_at ? 'success' : 'warning' }}">
                                                            {{ $post->published_at ? __('status.published') : __('status.draft') }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center py-4">
                                                        {{ __('messages.no_records') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="comments" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{ __('table.content') }}</th>
                                                <th>{{ __('table.post') }}</th>
                                                <th>{{ __('table.author') }}</th>
                                                <th>{{ __('table.date') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentComments as $comment)
                                                <tr>
                                                    <td>{{ Str::limit($comment->content, 30) }}</td>
                                                    <td>{{ Str::limit($comment->post->title, 20) }}</td>
                                                    <td>{{ $comment->guest_name }}</td>
                                                    <td>{{ $comment->created_at->format('d/m/Y') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center py-4">
                                                        {{ __('messages.no_comments') }}</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistiques secondaires -->
            <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2 mb-4">
                <div class="row">
                    <!-- Catégories populaires -->
                    <div class="col-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="bi bi-tags me-2"></i>{{ __('menu.popular_categories') }}
                                </h5>
                            </div>
                            <div class="card-body">
                                @forelse($popularCategories as $category)
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span>{{ $category->name }}</span>
                                        <span
                                            class="badge bg-primary rounded-pill">{{ $category->posts_count }}</span>
                                    </div>
                                @empty
                                    <p class="text-muted mb-0">{{ __('messages.no_categories') }}</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Auteurs actifs -->
                    <div class="col-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="bi bi-people me-2"></i>{{ __('menu.active_authors') }}
                                </h5>
                            </div>
                            <div class="card-body">
                                @forelse($activeAuthors as $author)
                                    <div class="d-flex align-items-center mb-3">
                                        @if ($author->picture)
                                            <div class="avatar me-3">
                                                <img src="{{ asset('storage/' . $author->picture) }}"
                                                    alt="{{ $author->name }}" class="rounded-circle">
                                            </div>
                                        @else
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold">
                                                    {{ substr($author->name, 0, 1) }}
                                                </div>
                                            </div>
                                        @endif

                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">{{ $author->name }}</h6>
                                            <small class="text-muted">{{ $author->posts()->count() }}
                                                {{ __('menu.posts') }}</small>
                                        </div>
                                        <span class="badge bg-{{ $author->status == App\UserStatus::Active ? 'success' : 'danger' }} rounded-pill">
                                            <i class="bi bi-check-circle"></i>
                                            <small class="text-muted">{{ $author->status }}</small>
                                        </span>
                                    </div>
                                @empty
                                    <p class="text-muted mb-0">{{ __('messages.no_active_authors') }}</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
