<?php
use Livewire\Volt\Component;
use function Livewire\Volt\{state};

new class extends Component {
    public function edittest()
    {
        dd('hello mon gars');
    }
};

?>

<div>
    <!-- En-tête -->
    <div class="container-fluid py-4 container-xxl flex-grow-1 container-p-y">
        <div class="row mb-4">
            <div class="col-12">
                <div
                    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                    <h2 class="mb-0">Gestion des Catégories</h2>

                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <button class="btn btn-primary" wire:click="addParentCategory">
                            <i class="fas fa-layer-plus me-2"></i>
                            Nouvelle Catégorie Parent
                        </button>
                        <button class="btn btn-primary" wire:click="">
                            <i class="fas fa-plus me-2"></i>
                            Nouvelle Sous-Catégorie
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableaux -->
        <div class="row">
            <!-- Catégories Parents -->
            <div class="col-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Catégories Parents</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Nbre Categories</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($parentCategories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>0</td>
                                            <td class="text-end">
                                                <!-- Bouton Édition -->
                                                <button class="btn btn-sm btn-warning me-2"
                                                    wire:click="editParentCategory({{ $category->id }})">
                                                    <i class="icon-base bx bx-edit-alt me-1"></i> Edit
                                                </button>

                                                <!-- Bouton Suppression -->
                                                <button class="btn btn-sm btn-danger"
                                                    wire:click="confirmDelete({{ $category->id }})">
                                                    <i class="icon-base bx bx-trash me-1"></i> Delete
                                                </button>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center py-4 text-muted">
                                                Aucune catégorie parent trouvée
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sous-Catégories -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Sous-Catégories</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Parent</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($childCategories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>0</td>
                                            <td>{{ $category->parent->name ?? '-' }}</td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-warning me-2">
                                                    <i class="icon-base bx bx-edit-alt me-1"></i> Edit
                                                </button>
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="icon-base bx bx-trash me-1"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4 text-muted">
                                                Aucune sous-catégorie trouvée
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

    <!-- Modal unique pour création/édition -->
    <div wire:ignore.self class="modal fade" id="pcategory_modal" tabindex="-1" aria-labelledby="pcategory_modalLabel"
        aria-hidden="true" data-backdrop="static" data-keyboard = "false">
        <div class="modal-dialog modal-dialog-centered">
            @if ($isUpdateParentCategoryMode)
                <form wire:submit.prevent = "updateParentCategory" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            Modifier une categorie Parent
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($isUpdateParentCategoryMode)
                            <input type="text" wire:model="pcategory_id" class="form-control" disabled>
                        @endif

                        <div class="mb-3">
                            <label for="pcategory_name" class="form-label">Nom de la catégorie</label>
                            <input type="text" id="pcategory_name" class="form-control" wire:model="pcategory_name"
                                placeholder="Nom de la catégorie">
                            @error('pcategory_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            <span wire:loading wire:target="updateParentCategory"
                                class="spinner-border spinner-border-sm"></span>
                            Mettre à jour
                        </button>
                    </div>
                </form>
            @else
                <form wire:submit = "createParentCategory" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            Ajouter une categorie Parent
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="pcategory_name" class="form-label">Nom de la catégorie</label>
                            <input type="text" id="pcategory_name" class="form-control" wire:model="pcategory_name"
                                placeholder="Nom de la catégorie">
                            @error('pcategory_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            <span wire:loading createParentCategory class="spinner-border spinner-border-sm"></span>
                            Créer
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>

</div>
