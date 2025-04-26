<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        @dd($test)
        <!-- Filtres période -->
        <div class="mb-4">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary {{ $timeRange === 'week' ? 'active' : '' }}"
                    wire:click="$emit('timeRangeUpdated', 'week')">
                    <i class="bi bi-calendar-week me-1"></i> Semaine
                </button>
                <button type="button" class="btn btn-outline-primary {{ $timeRange === 'month' ? 'active' : '' }}"
                    wire:click="$emit('timeRangeUpdated', 'month')">
                    <i class="bi bi-calendar-month me-1"></i> Mois
                </button>
                <button type="button" class="btn btn-outline-primary {{ $timeRange === 'year' ? 'active' : '' }}"
                    wire:click="$emit('timeRangeUpdated', 'year')">
                    <i class="bi bi-calendar me-1"></i> Année
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
                                <h5 class="card-title text-white mb-3">Bienvenue, Équipe Médicale! 👋</h5>
                                <p class="mb-4 text-white-75">
                                    Vous avez publié <strong>{{ $recentPosts->count() }} articles</strong> cette
                                    période.<br>
                                    Dernier article : "{{ $recentPosts->first()->title ?? 'Aucun article récent' }}"
                                </p>
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-light btn-sm">
                                    <i class="bi bi-plus-circle me-1"></i> Nouvel Article
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('images/medical-team.png') }}" height="160" alt="Équipe médicale"
                                    class="img-fluid">
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
                                    <span>Articles Publiés</span>
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
                                    <span>Commentaires</span>
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
                            <i class="bi bi-clock-history me-2"></i>Activité Récente
                        </h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('admin.posts.index') }}">Voir tous les
                                        articles</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.comments.index') }}">Voir tous les
                                        commentaires</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="activityTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="posts-tab" data-bs-toggle="tab"
                                    data-bs-target="#posts" type="button" role="tab">
                                    <i class="bi bi-newspaper me-1"></i> Articles
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="comments-tab" data-bs-toggle="tab"
                                    data-bs-target="#comments" type="button" role="tab">
                                    <i class="bi bi-chat-square-text me-1"></i> Commentaires
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="activityTabsContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Auteur</th>
                                                <th>Date</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentPosts as $post)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('admin.posts.edit', $post->id) }}"
                                                            class="text-primary">
                                                            {{ Str::limit($post->title, 40) }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $post->author->name }}</td>
                                                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
                                                    <td>
                                                        <span
                                                            class="badge bg-{{ $post->published_at ? 'success' : 'warning' }}">
                                                            {{ $post->published_at ? 'Publié' : 'Brouillon' }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center py-4">Aucun article récent
                                                    </td>
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
                                                <th>Contenu</th>
                                                <th>Article</th>
                                                <th>Auteur</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentComments as $comment)
                                                <tr>
                                                    <td>{{ Str::limit($comment->content, 30) }}</td>
                                                    <td>{{ Str::limit($comment->post->title, 20) }}</td>
                                                    <td>{{ $comment->user->name }}</td>
                                                    <td>{{ $comment->created_at->format('d/m/Y') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center py-4">Aucun commentaire
                                                        récent</td>
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
                                    <i class="bi bi-tags me-2"></i>Catégories Populaires
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
                                    <p class="text-muted mb-0">Aucune catégorie avec des articles</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Auteurs actifs -->
                    <div class="col-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="bi bi-people me-2"></i>Auteurs Actifs
                                </h5>
                            </div>
                            <div class="card-body">
                                @forelse($activeAuthors as $author)
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="avatar me-3">
                                            <img src="{{ $author->profile_photo_url }}" alt="{{ $author->name }}"
                                                class="rounded-circle"
                                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($author->name) }}&color=7F9CF5&background=EBF4FF'">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">{{ $author->name }}</h6>
                                            <small class="text-muted">{{ $author->posts_count }} articles</small>
                                        </div>
                                        <span class="badge bg-success rounded-pill">
                                            <i class="bi bi-check-circle"></i>
                                        </span>
                                    </div>
                                @empty
                                    <p class="text-muted mb-0">Aucun auteur actif récemment</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('adminjs')
        <script>
            document.addEventListener('livewire:load', function() {
                // Initialisation des tooltips Bootstrap
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });
            });
        </script>
    @endpush

    @push('admincss')
        <style>
            /* Animation des cartes */
            .card {
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .card:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            }

            /* Style des onglets */
            .nav-tabs .nav-link {
                border: none;
                color: #6c757d;
                font-weight: 500;
            }

            .nav-tabs .nav-link.active {
                color: #4f46e5;
                border-bottom: 2px solid #4f46e5;
                background-color: transparent;
            }

            /* Avatar rond */
            .avatar {
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .avatar img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        </style>
    @endpush


</div>
