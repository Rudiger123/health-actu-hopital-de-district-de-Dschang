<div class="container mt-5">
    {{-- Message de session --}}
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mb-4">Gestion des Témoignages</h2>

    <div class="d-flex justify-content-between mb-3">
        <h4>Liste des Témoignages</h4>
        <button class="btn btn-primary" wire:click="createTestimonial">Ajouter un Témoignage</button>
    </div>

    {{-- Formulaire d'ajout/édition --}}
    @if ($showForm)
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5>{{ $isEditing ? 'Modifier le Témoignage' : 'Ajouter un Nouveau Témoignage' }}</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="{{ $isEditing ? 'updateTestimonial' : 'storeTestimonial' }}">
                    <div class="mb-3">
                        <label for="author_name" class="form-label">Nom de l'Auteur</label>
                        <input type="text" class="form-control @error('author_name') is-invalid @enderror" id="author_name" wire:model.defer="author_name" placeholder="Nom de l'auteur">
                        @error('author_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author_title" class="form-label">Titre de l'Auteur (ex: Patient, Médecin)</label>
                        <input type="text" class="form-control @error('author_title') is-invalid @enderror" id="author_title" wire:model.defer="author_title" placeholder="Titre de l'auteur">
                        @error('author_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Contenu du Témoignage</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="5" wire:model.defer="content" placeholder="Contenu du témoignage"></textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image de l'Auteur (Optionnel)</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" wire:model="image">
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror

                        @if ($image)
                            <p class="mt-2">Aperçu de la nouvelle image :</p>
                            <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail" style="max-width: 150px;">
                        @elseif ($old_image)
                            <p class="mt-2">Image actuelle :</p>
                            <img src="{{ Storage::url($old_image) }}" class="img-thumbnail" style="max-width: 150px;">
                        @endif
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_approved" wire:model.defer="is_approved">
                        <label class="form-check-label" for="is_approved">Approuvé</label>
                    </div>

                    <button type="submit" class="btn btn-success">{{ $isEditing ? 'Mettre à jour' : 'Enregistrer' }}</button>
                    <button type="button" class="btn btn-secondary" wire:click="cancel">Annuler</button>
                </form>
            </div>
        </div>
    @endif

    {{-- Tableau des témoignages --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Auteur</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Image</th>
                    <th>Approuvé</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->id }}</td>
                        <td>{{ $testimonial->author_name }}</td>
                        <td>{{ $testimonial->author_title ?? 'N/A' }}</td>
                        <td>{{ Str::limit($testimonial->content, 70) }}</td>
                        <td>
                            @if ($testimonial->image)
                                <img src="{{ Storage::url($testimonial->image) }}" alt="Image de {{ $testimonial->author_name }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-{{ $testimonial->is_approved ? 'success' : 'warning' }}">
                                {{ $testimonial->is_approved ? 'Oui' : 'Non' }}
                            </span>
                            <button class="btn btn-sm btn-link" wire:click="toggleApproved({{ $testimonial->id }})">Changer</button>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info me-2" wire:click="editTestimonial({{ $testimonial->id }})">Modifier</button>
                            <button class="btn btn-sm btn-danger" wire:click="deleteTestimonial({{ $testimonial->id }})" wire:confirm="Êtes-vous sûr de vouloir supprimer ce témoignage ?">Supprimer</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Aucun témoignage trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
            
        </table>
        {{ $testimonials->links('pagination::bootstrap-5') }}
    </div>
</div>