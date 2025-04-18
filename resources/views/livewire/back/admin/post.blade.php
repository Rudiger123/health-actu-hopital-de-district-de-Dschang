<div>
    <!-- En-tête -->
    <div class="container-fluid py-4 container-xxl flex-grow-1 container-p-y">
        <div class="py-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#" class="text-primary fw-semibold">Gestion des articles</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Create Button -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold">Posts</h3>
            <button class="btn btn-primary" wire:click="addPost">
                + Create Post
            </button>
        </div>

        <!-- Table -->
        <div class="table-responsive bg-white shadow rounded">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#ID</th>
                        <th>image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        @php
                            // Déterminer la classe de ligne en fonction du statut
                            $rowClass = match ($post->status) {
                                'published' => 'table-success',
                                'pending' => 'table-warning',
                                'draft' => 'table-info',
                                default => '',
                            };

                            // Déterminer la classe du badge
                            $badgeClass = match ($post->status) {
                                'published' => 'bg-success',
                                'pending' => 'bg-warning text-dark',
                                'draft' => 'bg-info text-dark',
                                default => 'bg-secondary',
                            };
                        @endphp

                        <tr class="{{ $rowClass }}">
                            <td>{{ $post->id }}</td>
                            <td class="align-middle">
                                <div class="post-thumbnail">
                                    <img src="{{ '/storage/' . $post->image_path ?? asset('back/assets/img/avatars/1.png') }}"
                                        alt="{{ $post->title }}" class="img-fluid rounded shadow-sm"
                                        style="width: 80px; height: 60px; object-fit: cover; border: 1px solid #eee;">
                                </div>
                            </td>

                            <td class="align-middle">
                                <div class="post-title-wrapper">
                                    <h6 class="mb-0">{{ Str::limit($post->title, 40) }}</h6>
                                    @if ($post->featured)
                                        <span class="badge bg-primary mt-1"
                                            style="font-size: 0.65rem; padding: 0.25rem 0.4rem;">
                                            <i class="bi bi-star-fill me-1"></i>En vedette
                                        </span>
                                    @endif
                                </div>
                            </td>

                            <td class="align-middle">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-container position-relative">
                                        <img src="{{ '/storage/' . $post->author->picture ?? asset('back/assets/img/avatars/1.png') }}"
                                            alt="{{ $post->author->name ?? 'Auteur' }}" class="rounded-circle shadow-sm"
                                            style="width: 40px; height: 40px; object-fit: cover;">

                                        @if ($post->author->is_admin ?? false)
                                            <span class="position-absolute bottom-0 end-0 bg-success rounded-circle"
                                                style="width: 12px; height: 12px; border: 2px solid white;"></span>
                                        @endif
                                    </div>

                                    <div class="author-info">
                                        <div class="fw-semibold">{{ $post->author->name ?? 'Auteur inconnu' }}</div>
                                        <small
                                            class="text-muted">{{ optional($post->published_at)->format('d/m/Y') ?? 'Non publié' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <span class="badge {{ $badgeClass }} badge-status">
                                    @if ($post->status === 'published')
                                        Publié
                                    @elseif($post->status === 'pending')
                                        En attente
                                    @else
                                        Brouillon
                                    @endif
                                </span>
                            </td>
                            <td class="text-end">
                                @if ($post->status === 'draft')
                                    <!-- Boutons complets pour les brouillons -->
                                    <button class="btn btn-sm btn-warning me-2"
                                        wire:click="editPost({{ $post->id }})">
                                        <i class="icon-base bx bx-edit-alt me-1"></i> Éditer
                                    </button>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="confirmDelete({{ $post->id }})">
                                        <i class="icon-base bx bx-trash me-1"></i> Supprimer
                                    </button>
                                @else
                                    <!-- Menu déroulant pour les autres statuts -->
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown">
                                            ⋮
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="#"
                                                    wire:click.prevent="editPost({{ $post->id }})">
                                                    <i class="bx bx-edit-alt me-2"></i>Éditer
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item text-danger" href="javascript::void()"
                                                    wire:click.prevent="confirmDelete({{ $post->id }})">
                                                    <i class="bx bx-trash me-2"></i>Supprimer
                                                </a>
                                            </li>
                                            @if ($post->status === 'published')
                                                <li>
                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#postPreviewModal"
                                                        wire:click="loadPost({{ $post->id }})">
                                                        <i class="bx bx-show me-2"></i>Voir
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-muted">
                                Aucune article trouvé
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="container-fluid container-p-y">
            {{ $posts->links() }}
        </div>
        
    </div>

    <!-- Modal -->
    <div>


        @if (!$isUpdatePostMode)
            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel"
                aria-hidden="true" data-backdrop="static" data-keyboard = "false">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <form wire:submit.prevent="savePost">
                            <div class="modal-header bg-light py-4">
                                <h5 class="modal-title" id="postModalLabel">
                                    <i class="bi bi-pencil-square"></i>
                                    Créer un nouvel article
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Colonne de gauche -->
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Titre</label>
                                            <input type="text" placeholder="entrez le titre de votre article...."
                                                class="form-control @error('title') is-invalid @enderror"
                                                id="title" wire:model.defer="title">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="content" class="form-label">Contenu</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="10"
                                                wire:model.defer="content" placeholder="entrez le contenu de votre article...."></textarea>
                                            @error('content')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Colonne de droite -->
                                    <div class="col-md-4">
                                        <div class="card border-0 shadow-sm">
                                            <div class="card-body">
                                                <!-- Image -->
                                                <!-- Image -->
                                                <div class="mb-3">
                                                    <label class="form-label">Image de couverture</label>
                                                    <div class="image-upload-container mb-3">
                                                        @if ($image)
                                                            <!-- Image temporaire uploadée -->
                                                            <div class="image-preview-wrapper">
                                                                <img src="{{ $image->temporaryUrl() }}"
                                                                    class="img-fluid rounded border"
                                                                    alt="Preview image uploadée">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1"
                                                                    wire:click="removeImage">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </div>
                                                        @else
                                                            <!-- Image par défaut -->
                                                            <div
                                                                class="default-image-wrapper text-center py-4 bg-light rounded border">
                                                                <i class="bi bi-image text-muted"
                                                                    style="font-size: 3rem;"></i>
                                                                <p class="mt-2 mb-0 text-muted">Aucune image
                                                                    sélectionnée
                                                                </p>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <input type="file"
                                                        class="form-control @error('image') is-invalid @enderror"
                                                        wire:model="image" accept="image/*">
                                                    @error('image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <small class="text-muted">Format recommandé: 1200x630px (2MB
                                                        max)</small>
                                                </div>


                                                <!-- Catégorie -->
                                                <div class="mb-3">
                                                    <label for="category" class="form-label">Catégorie</label>
                                                    <select class="form-select @error('category') is-invalid @enderror"
                                                        id="category" wire:model.defer="category">
                                                        <option value="Développement">selectionner une categorie
                                                        </option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Champs Tags -->
                                                <div class="mb-3">
                                                    <label for="tagsSelect" class="form-label">Tags</label>
                                                    <select id="tagsSelect" class="form-select" multiple
                                                        wire:model.defer="selectedTags">
                                                        @foreach ($availableTags as $tag)
                                                            <option value="{{ $tag['id'] }}">{{ $tag['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <small class="text-muted">Sélectionnez un ou plusieurs tags
                                                        existants ou ajoutez-en de nouveaux ci-dessous.</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="newTag" class="form-label">Ajouter un nouveau
                                                        tag</label>
                                                    <div class="d-flex flex-wrap align-items-center gap-2">
                                                        <!-- Champ d'entrée -->
                                                        <input type="text" id="newTag"
                                                            class="form-control flex-grow-1"
                                                            placeholder="Nom du nouveau tag"
                                                            wire:model.defer="newTag">

                                                        <!-- Bouton -->
                                                        <button type="button" class="btn btn-secondary"
                                                            wire:click="addNewTag">Ajouter</button>
                                                    </div>
                                                    <small class="text-muted">Entrez un nom de tag et appuyez sur
                                                        "Ajouter" pour l'ajouter à la liste.</small>
                                                </div>

                                                <!-- Statut -->
                                                <div class="mb-3">
                                                    <label class="form-label">Statut</label>
                                                    <div class="btn-group w-100" role="group">
                                                        @foreach (['draft' => 'Brouillon', 'published' => 'Publié', 'pending' => 'En attente', 'private' => 'Privé'] as $value => $label)
                                                            <input type="radio" class="btn-check" name="status"
                                                                id="status-{{ $value }}"
                                                                value="{{ $value }}"
                                                                wire:model.defer="status">
                                                            <label
                                                                class="btn btn-outline-{{ $this->getStatusColor($value) }}"
                                                                for="status-{{ $value }}">
                                                                {{ $label }}
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                    @error('status')
                                                        <span class="text-danger small">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Options -->
                                                <div class="mb-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="featured" wire:model.defer="featured">
                                                        <label class="form-check-label" for="featured">
                                                            Mettre en vedette
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="allow_comments" wire:model.defer="allow_comments">
                                                        <label class="form-check-label" for="allow_comments">
                                                            Autoriser les commentaires
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer bg-light py-4">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle"></i> Annuler
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <form wire:submit="updatePost">
                            <div class="modal-header bg-light py-4">
                                <h5 class="modal-title" id="postModalLabel">
                                    <i class="bi bi-pencil-square"></i>
                                    Modifier l'article
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Colonne de gauche -->
                                    <div class="col-md-8">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Titre</label>
                                            <input type="text" placeholder="Entrez le titre de votre article....."
                                                class="form-control @error('title') is-invalid @enderror"
                                                id="title" wire:model="title">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="content" class="form-label">Contenu</label>
                                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="10"
                                                wire:model="content"></textarea>
                                            @error('content')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Colonne de droite -->
                                    <div class="col-md-4">
                                        <div class="card border-0 shadow-sm">
                                            <div class="card-body">
                                                <!-- Image -->
                                                <div class="mb-3">
                                                    <label class="form-label">Image de couverture</label>
                                                    <div class="image-upload-container mb-3">
                                                        @if ($image)
                                                            <!-- Image temporaire uploadée -->
                                                            <div class="image-preview-wrapper">
                                                                <img src="{{ $image->temporaryUrl() }}"
                                                                    class="img-fluid rounded border"
                                                                    alt="Preview image uploadée">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1"
                                                                    wire:click="removeImage">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </div>
                                                        @elseif(is_string($existingImagePath))
                                                            <!-- Image existante en base -->
                                                            <div class="image-preview-wrapper">
                                                                <img src="{{ asset('storage/' . $existingImagePath) }}"
                                                                    class="img-fluid rounded border"
                                                                    alt="Image existante">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1"
                                                                    wire:click="removeImage">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>
                                                            </div>
                                                        @else
                                                            <!-- Image par défaut -->
                                                            <div
                                                                class="default-image-wrapper text-center py-4 bg-light rounded border">
                                                                <i class="bi bi-image text-muted"
                                                                    style="font-size: 3rem;"></i>
                                                                <p class="mt-2 mb-0 text-muted">Aucune image
                                                                    sélectionnée
                                                                </p>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <input type="file"
                                                        class="form-control @error('image') is-invalid @enderror"
                                                        wire:model="image" accept="image/*">
                                                    @error('image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <small class="text-muted">Format recommandé: 1200x630px (2MB
                                                        max)</small>
                                                </div>


                                                <!-- Catégorie -->
                                                <div class="mb-3">
                                                    <label for="category" class="form-label">Catégorie</label>
                                                    <select class="form-select @error('category') is-invalid @enderror"
                                                        id="category" wire:model="category">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Champs Tags -->
                                                <div class="mb-3">
                                                    <label for="tagsSelect" class="form-label">Tags</label>
                                                    <select id="tagsSelect" class="form-select" multiple
                                                        wire:model.defer="selectedTags">
                                                        @foreach ($availableTags as $tag)
                                                            <option value="{{ $tag['id'] }}">{{ $tag['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <small class="text-muted">Sélectionnez un ou plusieurs tags
                                                        existants ou ajoutez-en de nouveaux ci-dessous.</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="newTag" class="form-label">Ajouter un nouveau
                                                        tag</label>
                                                    <div class="d-flex flex-wrap align-items-center gap-2">
                                                        <!-- Champ d'entrée -->
                                                        <input type="text" id="newTag"
                                                            class="form-control flex-grow-1"
                                                            placeholder="Nom du nouveau tag"
                                                            wire:model.defer="newTag">

                                                        <!-- Bouton -->
                                                        <button type="button" class="btn btn-secondary"
                                                            wire:click="addNewTag">Ajouter</button>
                                                    </div>
                                                    <small class="text-muted">Entrez un nom de tag et appuyez sur
                                                        "Ajouter" pour l'ajouter à la liste.</small>
                                                </div>

                                                <!-- Statut -->
                                                <div class="mb-3">
                                                    <label class="form-label">Statut</label>
                                                    <div class="btn-group w-100" role="group">
                                                        @foreach (['draft' => 'Brouillon', 'published' => 'Publié', 'pending' => 'En attente', 'private' => 'Privé'] as $value => $label)
                                                            <input type="radio" class="btn-check" name="status"
                                                                id="status-{{ $value }}"
                                                                value="{{ $value }}" wire:model="status">
                                                            <label
                                                                class="btn btn-outline-{{ $this->getStatusColor($value) }}"
                                                                for="status-{{ $value }}">
                                                                {{ $label }}
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                    @error('status')
                                                        <span class="text-danger small">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <!-- Options -->
                                                <div class="mb-3">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="featured" wire:model="featured">
                                                        <label class="form-check-label" for="featured">
                                                            Mettre en vedette
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="allow_comments" wire:model="allow_comments">
                                                        <label class="form-check-label" for="allow_comments">
                                                            Autoriser les commentaires
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer bg-light py-4">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle"></i> Annuler
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Mettre à jour
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endif



        <!-- Modal de prévisualisation -->
        <div class="modal fade" id="postPreviewModal" tabindex="-1" aria-labelledby="postPreviewModalLabel"
            aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content shadow-lg">
                    <div class="modal-header text-white bg-light py-4">
                        <h5 class="modal-title" id="postPreviewModalLabel">Prévisualisation de l'article</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        @if ($currentPost)
                            <article class="blog-preview">
                                <!-- Titre -->
                                <h1 class="mb-3 fw-bold text-primary">{{ $currentPost->title }}</h1>

                                <!-- Auteur et date -->
                                <div class="d-flex align-items-center mb-4">
                                    @if ($currentPost->author->picture)
                                        <img src="{{ '/storage/' . $currentPost->author->picture }}"
                                            alt="{{ $currentPost->author->name ?? 'Auteur' }}"
                                            class="rounded-circle shadow-sm border border-secondary"
                                            style="width: 50px; height: 50px; object-fit: cover; margin-right: 15px;">
                                    @endif
                                    <div>
                                        <h5 class="mb-0 text-dark fw-bold">{{ $currentPost->author->name }}</h5>
                                        <small class="text-muted d-block">
                                            {{ $currentPost->published_at ? $currentPost->published_at?->format('F j, Y') : 'Non publié' }}
                                        </small>
                                    </div>
                                </div>

                                <!-- Image -->
                                @if ($currentPost->image_path)
                                    <img src="{{ asset('storage/' . $currentPost->image_path) }}"
                                        class="img-fluid rounded mb-4 shadow-sm" alt="Image de l'article">
                                @endif

                                <!-- Contenu -->
                                <div class="content">
                                    <p class="text-muted mb-2">Contenu :</p>
                                    <div class="border-start border-primary ps-3">
                                        {!! Str::markdown($currentPost->content) !!}
                                    </div>
                                </div>

                                <!-- Catégorie et statut -->
                                <div class="mt-4">
                                    <span class="badge bg-info text-dark me-2">Catégorie :
                                        {{ $currentPost->category->name ?? 'Non spécifiée' }}</span>
                                    <span
                                        class="badge bg-{{ $currentPost->status === 'published' ? 'success' : 'warning' }}">
                                        {{ $currentPost->status === 'published' ? 'Publié' : 'Brouillon' }}
                                    </span>
                                </div>

                                <!-- Tags -->
                                @if ($currentPost->tags())
                                    <div class="tags mt-4">
                                        <p class="text-muted mb-2">Tags :</p>
                                        @foreach ($currentPost->tags as $tag)
                                            <span class="badge bg-secondary me-1">{{ $tag->name }}</span>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Métadonnées supplémentaires -->
                                <div class="mt-4">
                                    <p class="text-muted mb-2">Autres informations :</p>
                                    <ul class="list-unstyled">
                                        <li><strong>Slug :</strong> {{ $currentPost->slug }}</li>
                                        <li><strong>Article en vedette :</strong>
                                            {{ $currentPost->featured ? 'Oui' : 'Non' }}</li>
                                        <li><strong>Commentaires autorisés :</strong>
                                            {{ $currentPost->allow_comments ? 'Oui' : 'Non' }}</li>
                                    </ul>
                                </div>
                            </article>
                        @else
                            <!-- Chargement -->
                            <div class="text-center py-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Chargement...</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="modal-footer bg-light py-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary">
                            <i class="bi bi-pencil-square"></i> Éditer
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <style>
            .blog-preview {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                line-height: 1.6;
                color: #333;
            }

            .blog-preview h1 {
                font-size: 2.2rem;
                font-weight: 700;
                color: #2c3e50;
                margin-bottom: 1.5rem;
            }

            .blog-preview .content {
                font-size: 1.1rem;
            }

            .blog-preview .content p {
                margin-bottom: 1.5rem;
            }

            .blog-preview img {
                max-height: 400px;
                object-fit: cover;
                width: 100%;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .article-preview {
                transition: all 0.3s ease;
            }

            .preview-title {
                color: #333;
                font-weight: 700;
                line-height: 1.3;
            }

            .image-preview {
                transition: all 0.3s ease;
                border: 1px dashed #dee2e6;
            }

            .image-preview:hover {
                border-color: #adb5bd;
            }

            .bootstrap-tagsinput {
                width: 100%;
                padding: 0.375rem 0.75rem;
                min-height: calc(1.5em + 0.75rem + 2px);
            }

            .bootstrap-tagsinput .tag {
                background-color: #0d6efd;
                color: white;
                padding: 0.2rem 0.4rem;
                border-radius: 0.25rem;
                margin-right: 0.3rem;
                margin-bottom: 0.2rem;
                display: inline-block;
            }

            .bootstrap-tagsinput .tag [data-role="remove"] {
                margin-left: 0.5rem;
                cursor: pointer;
            }

            .bootstrap-tagsinput .tag [data-role="remove"]:after {
                content: "×";
                padding: 0 0.2rem;
                font-size: 1rem;
            }

            .bootstrap-tagsinput input {
                border: none;
                box-shadow: none;
                outline: none;
                background-color: transparent;
                padding: 0;
                margin: 0;
                width: auto !important;
                max-width: inherit;
            }

            .image-upload-container {
                position: relative;
                min-height: 150px;
            }

            .image-preview-wrapper {
                position: relative;
                border: 1px dashed #dee2e6;
                border-radius: 8px;
                overflow: hidden;
                background-color: #f8f9fa;
            }

            .image-preview-wrapper img {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }

            .default-image-wrapper {
                height: 200px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                border: 1px dashed #dee2e6;
                transition: all 0.3s ease;
            }

            .default-image-wrapper:hover {
                border-color: #adb5bd;
                background-color: #f1f3f5;
            }
        </style>





    </div>
