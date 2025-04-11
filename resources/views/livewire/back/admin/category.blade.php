<div>
    <div class="container-fluid py-4 container-xxl flex-grow-1 container-p-y">
        <div class="mb-4">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <h2 class="h4 fw-semibold text-dark m-0">Gestion des Catégories</h2>
                </div>
                <div class="col-12 col-md-6">
                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <!-- Bouton Catégorie Parent -->
                        <button class="btn btn-outline-primary w-100 w-sm-auto" data-bs-toggle="modal" data-bs-target="#addParentCategoryModal">
                            <i class="fas fa-layer-plus me-2"></i>
                            <span class="d-none d-sm-inline">Nouvelle Catégorie Parent</span>
                            <span class="d-inline d-sm-none">Nouveau Parent</span>
                        </button>
        
                        <!-- Bouton Sous-Catégorie -->
                        <button class="btn btn-outline-success w-100 w-sm-auto" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                            <i class="fas fa-plus me-2"></i>
                            <span class="d-none d-sm-inline">Nouvelle Sous-Catégorie</span>
                            <span class="d-inline d-sm-none">Sous-Cat</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Tableau des Catégories Parents -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0 pb-0">
                        <h5 class="mb-0 text-primary">Catégories Parents</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($parentCategories as $parent)
                                        <tr>
                                            <td class="text-sm">{{ $parent->id }}</td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $parent->name }}</p>
                                            </td>
                                            <td class="text-sm">
                                                <p class="text-sm text-muted mb-0">{{ Str::limit($parent->description, 50) }}</p>
                                            </td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-outline-warning me-2" wire:click="editParent({{ $parent->id }})" data-bs-toggle="modal" data-bs-target="#editParentCategoryModal">
                                                    <i class="fas fa-edit me-1"></i> Modifier
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" wire:click="confirmDeleteParent({{ $parent->id }})" data-bs-toggle="modal" data-bs-target="#deleteParentCategoryModal">
                                                    <i class="fas fa-trash me-1"></i> Supprimer
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-folder-open fa-2x text-muted mb-2"></i>
                                                    <p class="text-muted">Aucune catégorie parent trouvée</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des Sous-Catégories -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-0 pb-0">
                        <h5 class="mb-0 text-primary">Sous-Catégories</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catégorie Parent</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td class="text-sm">{{ $category->id }}</td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">{{ $category->name }}</p>
                                            </td>
                                            <td class="text-sm">
                                                <p class="text-sm text-muted mb-0">{{ Str::limit($category->description, 50) }}</p>
                                            </td>
                                            <td class="text-sm">
                                                <span class="badge bg-primary">{{ $category->parent->name ?? 'N/A' }}</span>
                                            </td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-outline-warning me-2" wire:click="editCategory({{ $category->id }})" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                                    <i class="fas fa-edit me-1"></i> Modifier
                                                </button>
                                                <button class="btn btn-sm btn-outline-danger" wire:click="confirmDeleteCategory({{ $category->id }})" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">
                                                    <i class="fas fa-trash me-1"></i> Supprimer
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                <div class="d-flex flex-column align-items-center">
                                                    <i class="fas fa-folder-open fa-2x text-muted mb-2"></i>
                                                    <p class="text-muted">Aucune sous-catégorie trouvée</p>
                                                </div>
                                            </td>
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

    <!-- Modals (conservés identiques) -->

    <!-- Modal Ajouter Catégorie Parent -->
    <div wire:ignore.self class="modal fade" id="addParentCategoryModal" tabindex="-1" aria-labelledby="addParentCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <form wire:submit.prevent="storeParent">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="addParentCategoryModalLabel">Ajouter une Catégorie Parent</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="parentName" class="form-label">Nom <span class="text-danger">*</span></label>
                            <input type="text" id="parentName" class="form-control" wire:model.defer="parentName" placeholder="Nom de la catégorie">
                            @error('parentName') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading wire:target="storeParent" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Ajouter Sous-Catégorie -->
    <div wire:ignore.self class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <form wire:submit.prevent="storeCategory">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="addCategoryModalLabel">Ajouter une Sous-Catégorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Nom <span class="text-danger">*</span></label>
                            <input type="text" id="categoryName" class="form-control" wire:model.defer="categoryName" placeholder="Nom de la sous-catégorie">
                            @error('categoryName') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="categoryDescription" class="form-label">Description</label>
                            <textarea id="categoryDescription" class="form-control" wire:model.defer="categoryDescription" rows="3" placeholder="Description (optionnelle)"></textarea>
                            @error('categoryDescription') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="parentCategory" class="form-label">Catégorie Parent <span class="text-danger">*</span></label>
                            <select id="parentCategory" class="form-select" wire:model.defer="parentCategoryId">
                                <option value="">Sélectionner une catégorie parent</option>
                                @foreach ($parentCategories as $parent)
                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                @endforeach
                            </select>
                            @error('parentCategoryId') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading wire:target="storeCategory" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>