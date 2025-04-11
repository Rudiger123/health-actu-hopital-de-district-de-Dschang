<div>
  @section('content')

  <div class="container">  <!-- En-tête -->
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                    <h2 class="mb-0">Gestion des Catégories</h2>
                    
                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <button class="btn btn-primary" wire:click="openModal('create', 'parent')">
                            <i class="fas fa-layer-plus me-2"></i>
                            Nouvelle Catégorie Parent
                        </button>
                        <button class="btn btn-primary" wire:click="openModal('create', 'child')">
                            <i class="fas fa-plus me-2"></i>
                            Nouvelle Sous-Catégorie
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Messages -->
        @if(session()->has('successMessage'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('successMessage') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('errorMessage'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('errorMessage') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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
                                        <th>Description</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($parentCategories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ Str::limit($category->description, 50) }}</td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-warning me-2" 
                                                    wire:click="openModal('edit', 'parent', {{ $category->id }})">
                                                    <i class="bx bx-edit-alt me-1"></i> Modifier
                                                </button>
                                            
                                                <button class="btn btn-sm btn-danger" 
                                                    wire:click="confirmDelete({{ $category->id }})">
                                                    <i class="bx bx-trash me-1"></i> Supprimer
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
                                            <td>{{ Str::limit($category->description, 50) }}</td>
                                            <td>{{ $category->parent->name ?? '-' }}</td>
                                            <td class="text-end">
                                                <button class="btn btn-sm btn-warning me-2" 
                                                    wire:click="openModal('edit', 'child', {{ $category->id }})">
                                                    <i class="bx bx-edit-alt me-1"></i> Modifier
                                                </button>
                                                <button class="btn btn-sm btn-danger" 
                                                    wire:click="confirmDelete({{ $category->id }})">
                                                    <i class="bx bx-trash me-1"></i> Supprimer
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

        <!-- Modal unique pour création/édition -->
        <div class="modal fade" wire:ignore.self id="categoryModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            @if($formType === 'create')
                                Ajouter {{ $categoryType === 'parent' ? 'Catégorie Parent' : 'Sous-Catégorie' }}
                            @else
                                Modifier {{ $categoryType === 'parent' ? 'Catégorie Parent' : 'Sous-Catégorie' }}
                            @endif
                        </h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <form wire:submit.prevent="saveCategory">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Nom *</label>
                                <input type="text" class="form-control" wire:model="name">
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" wire:model="description" rows="3"></textarea>
                                @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            @if($categoryType === 'child')
                                <div class="mb-3">
                                    <label class="form-label">Catégorie Parent *</label>
                                    <select class="form-select" wire:model="parent_id">
                                        <option value="">Sélectionner un parent</option>
                                        @foreach($parentCategories as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal">Annuler</button>
                            <button type="submit" class="btn btn-primary">
                                {{ $formType === 'create' ? 'Créer' : 'Mettre à jour' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div>
        <!-- En-tête -->
        <div class="container-fluid py-4">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                        <h2 class="mb-0">Gestion des Catégories</h2>
                        
                        <div class="d-flex flex-column flex-sm-row gap-2">
                            <button class="btn btn-primary" wire:click="openCreateModal('parent')">
                                <i class="fas fa-layer-plus me-2"></i>
                                Nouvelle Catégorie Parent
                            </button>
                            <button class="btn btn-primary" wire:click="openCreateModal('child')">
                                <i class="fas fa-plus me-2"></i>
                                Nouvelle Sous-Catégorie
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Messages -->
            @if($successMessage)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $successMessage }}
                    <button type="button" class="btn-close" wire:click="$set('successMessage', '')"></button>
                </div>
            @endif
            
            @if($errorMessage)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errorMessage }}
                    <button type="button" class="btn-close" wire:click="$set('errorMessage', '')"></button>
                </div>
            @endif
    
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
                                            <th>Description</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($parentCategories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ Str::limit($category->description, 50) }}</td>
                                                <td class="text-end">
                                                    <!-- Bouton Édition -->
                                                    <button class="btn btn-sm btn-warning me-2" 
                                                        wire:click="openEditModal({{ $category->id }})">
                                                        <i class="icon-base bx bx-edit-alt me-1"></i> Edit
                                                    </button>
                                                
                                                    <!-- Bouton Suppression -->
                                                    <button class="btn btn-sm btn-danger" 
                                                        wire:click="$dispatch('confirm-delete', { id: {{ $category->id }} })"
                                                        onclick="return confirm('Supprimer cette catégorie?')">
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
                                                <td>{{ Str::limit($category->description, 50) }}</td>
                                                <td>{{ $category->parent->name ?? '-' }}</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-warning me-2" 
                                                        wire:click="openEditModal({{ $category->id }})">
                                                        <i class="icon-base bx bx-edit-alt me-1"></i> Edit
                                                    </button>
                                                    <button class="btn btn-sm btn-danger" 
                                                        wire:click="$dispatch('confirm-delete', { id: {{ $category->id }} })"
                                                        onclick="return confirm('Supprimer cette catégorie?')">
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
        <div class="modal fade" wire:ignore.self id="categoryModal" tabindex="-1" aria-hidden="true" wire:model="isModalOpen">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $formType === 'create' ? 'Ajouter' : 'Modifier' }} 
                            {{ $categoryType === 'parent' ? 'Catégorie Parent' : 'Sous-Catégorie' }}
                        </h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <form wire:submit.prevent="saveCategory">
                        <div class="modal-body">
                            <!-- Nom -->
                            <div class="mb-3">
                                <label class="form-label">Nom *</label>
                                <input type="text" class="form-control" wire:model="name">
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
    
                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" wire:model="description" rows="3"></textarea>
                                @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
    
                            <!-- Parent (seulement pour sous-catégorie) -->
                            @if($categoryType === 'child')
                            <div class="mb-3">
                                <label class="form-label">Catégorie Parent *</label>
                                <select class="form-select" wire:model="parent_id">
                                    <option value="">Sélectionner un parent</option>
                                    @foreach($parentCategories as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal">Annuler</button>
                            <button type="submit" class="btn btn-primary">
                                <span wire:loading wire:target="saveCategory" class="spinner-border spinner-border-sm"></span>
                                {{ $formType === 'create' ? 'Créer' : 'Mettre à jour' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
    </div>

    @push('adminjs')
         <!-- Script pour gérer le modal -->
         <script>
            document.addEventListener('livewire:initialized', () => {
                Livewire.on('openModal', () => {
                    const modal = new bootstrap.Modal(document.getElementById('categoryModal'));
                    modal.show();
                });
                
                Livewire.on('closeModal', () => {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('categoryModal'));
                    if (modal) modal.hide();
                });
            });
        </script>
    @endpush

  @endsection
</div>