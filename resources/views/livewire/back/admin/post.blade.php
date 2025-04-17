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
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postModal">
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
                    @foreach($posts as $post)
                    @php
                        // Déterminer la classe de ligne en fonction du statut
                        $rowClass = match($post->status) {
                            'published' => 'table-success',
                            'pending' => 'table-warning',
                            'draft' => 'table-info',
                            default => ''
                        };
                        
                        // Déterminer la classe du badge
                        $badgeClass = match($post->status) {
                            'published' => 'bg-success',
                            'pending' => 'bg-warning text-dark',
                            'draft' => 'bg-info text-dark',
                            default => 'bg-secondary'
                        };
                    @endphp
                
                    <tr class="{{ $rowClass }}">
                        <td>{{ $post->id }}</td>
                        <td class="align-middle">
                            <div class="post-thumbnail">
                                <img src="{{ "/storage/".$post->image_path ?? asset('back/assets/img/avatars/1.png') }}" 
                                     alt="{{ $post->title }}"
                                     class="img-fluid rounded shadow-sm"
                                     style="width: 80px; height: 60px; object-fit: cover; border: 1px solid #eee;">
                            </div>
                        </td>
                        
                        <td class="align-middle">
                            <div class="post-title-wrapper">
                                <h6 class="mb-0">{{ Str::limit($post->title, 40) }}</h6>
                                @if($post->featured)
                                    <span class="badge bg-primary mt-1" style="font-size: 0.65rem; padding: 0.25rem 0.4rem;">
                                        <i class="bi bi-star-fill me-1"></i>En vedette
                                    </span>
                                @endif
                            </div>
                        </td>
                        
                        <td class="align-middle">
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar-container position-relative">
                                    <img src="{{ "/storage/".$post->author->picture ?? asset('back/assets/img/avatars/1.png') }}" 
                                         alt="{{ $post->author->name ?? 'Auteur' }}"
                                         class="rounded-circle shadow-sm"
                                         style="width: 40px; height: 40px; object-fit: cover;">
                                    
                                    @if($post->author->is_admin ?? false)
                                        <span class="position-absolute bottom-0 end-0 bg-success rounded-circle" 
                                              style="width: 12px; height: 12px; border: 2px solid white;"></span>
                                    @endif
                                </div>
                                
                                <div class="author-info">
                                    <div class="fw-semibold">{{ $post->author->name ?? 'Auteur inconnu' }}</div>
                                    <small class="text-muted">{{ optional($post->published_at)->format('d/m/Y') ?? 'Non publié' }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <span class="badge {{ $badgeClass }} badge-status">
                                @if($post->status === 'published')
                                    Publié
                                @elseif($post->status === 'pending')
                                    En attente
                                @else
                                    Brouillon
                                @endif
                            </span>
                        </td>
                        <td class="text-end">
                            @if($post->status === 'draft')
                                <!-- Boutons complets pour les brouillons -->
                                <button class="btn btn-sm btn-warning me-2" wire:click="editPost({{ $post->id }})">
                                    <i class="icon-base bx bx-edit-alt me-1"></i> Éditer
                                </button>
                                <button class="btn btn-sm btn-danger" wire:click="confirmDelete({{ $post->id }})">
                                    <i class="icon-base bx bx-trash me-1"></i> Supprimer
                                </button>
                            @else
                                <!-- Menu déroulant pour les autres statuts -->
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        ⋮
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="#" wire:click.prevent="editPost({{ $post->id }})">
                                                <i class="bx bx-edit-alt me-2"></i>Éditer
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-danger" href="javascript::void()" wire:click.prevent="confirmDelete({{ $post->id }})">
                                                <i class="bx bx-trash me-2"></i>Supprimer
                                            </a>
                                        </li>
                                        @if($post->status === 'published')
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="bx bx-show me-2"></i>Voir
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div>
        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <form wire:submit.prevent="savePost">
                        <div class="modal-header bg-light">
                            <h5 class="modal-title" id="postModalLabel">
                                <i class="bi bi-pencil-square"></i>
                                {{ $postId ? 'Modifier l\'article' : 'Créer un nouvel article' }}
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
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" wire:model.defer="title">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="content" class="form-label">Contenu</label>
                                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="10"
                                            wire:model.defer="content"></textarea>
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
                                                    @elseif($existingImage)
                                                        <!-- Image existante en base -->
                                                        <div class="image-preview-wrapper">
                                                            <img src="{{ asset('storage/' . $existingImage) }}"
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
                                                            <p class="mt-2 mb-0 text-muted">Aucune image sélectionnée
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
                                                    <option value="Développement">selectionner une categorie</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Tags -->
                                            <div class="mb-3">
                                                <label for="tagsInput" class="form-label">Tags</label>
                                                <input type="text" id="tagsInput" class="form-control"
                                                    placeholder="ex: Laravel, PHP, Bootstrap" data-role="tagsinput">
                                                <input type="hidden" id="tags" wire:model.defer="tags">
                                                @error('tags')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Statut -->
                                            <div class="mb-3">
                                                <label class="form-label">Statut</label>
                                                <div class="btn-group w-100" role="group">
                                                    @foreach (['draft' => 'Brouillon', 'published' => 'Publié', 'pending' => 'En attente', 'private' => 'Privé'] as $value => $label)
                                                        <input type="radio" class="btn-check" name="status"
                                                            id="status-{{ $value }}"
                                                            value="{{ $value }}" wire:model.defer="status">
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
                                                    <input class="form-check-input" type="checkbox" id="featured"
                                                        wire:model.defer="featured">
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
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle"></i> Annuler
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> {{ $postId ? 'Mettre à jour' : 'Enregistrer' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <style>
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

        @push('adminjs')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const tagsInput = $('#tagsInput');

                    // Initialisation
                    tagsInput.tagsinput({
                        confirmKeys: [32, 44, 13], // Espace, virgule et Enter
                        trimValue: true,
                        tagClass: 'badge bg-primary me-1'
                    });

                    // Empêcher la soumission du formulaire avec Enter
                    tagsInput.on('keydown', function(e) {
                        if (e.keyCode === 13) {
                            e.preventDefault();
                            const value = tagsInput.val().trim();
                            if (value) {
                                tagsInput.tagsinput('add', value);
                                tagsInput.val('');
                            }
                            return false;
                        }
                    });

                    // Synchronisation avec Livewire
                    tagsInput.on('itemAdded itemRemoved', function() {
                        $('#tags').val(tagsInput.tagsinput('items').join(','));
                        $('#tags').trigger('input');
                    });

                    // Initialisation avec les tags existants
                    @if ($tags)
                        const initialTags = "{{ $tags }}".split(',');
                        initialTags.forEach(tag => {
                            if (tag.trim()) {
                                tagsInput.tagsinput('add', tag.trim());
                            }
                        });
                    @endif
                });
            </script>
        @endpush




    </div>
