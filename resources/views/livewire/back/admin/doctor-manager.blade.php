<div class='container'>
    {{-- Message de session --}}
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mb-4">Gestion des Docteurs</h2>

    <div class="d-flex justify-content-between mb-3">
        <h4>Liste des Docteurs</h4>
        <button class="btn btn-primary" wire:click="createDoctor">Ajouter un Docteur</button>
    </div>

    {{-- Formulaire d'ajout/édition --}}
    @if ($showForm)
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5>{{ $isEditing ? 'Modifier le Docteur' : 'Ajouter un Nouveau Docteur' }}</h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="{{ $isEditing ? 'updateDoctor' : 'storeDoctor' }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom Complet</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model.defer="name" placeholder="Nom du docteur">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="specialty" class="form-label">Spécialité</label>
                        <input type="text" class="form-control @error('specialty') is-invalid @enderror" id="specialty" wire:model.defer="specialty" placeholder="Ex: Cardiologie, Pédiatrie">
                        @error('specialty') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" wire:model.defer="phone" placeholder="Numéro de téléphone">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" wire:model.live="email" placeholder="Adresse email">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Biographie</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" rows="3" wire:model.defer="bio" placeholder="Brève biographie du docteur"></textarea>
                        @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Photo de Profil (Optionnel)</label>
                        <input type="file" class="form-control @error('profile_picture') is-invalid @enderror" id="profile_picture" wire:model="profile_picture">
                        @error('profile_picture') <div class="invalid-feedback">{{ $message }}</div> @enderror

                        @if ($profile_picture)
                            <p class="mt-2">Aperçu de la nouvelle image :</p>
                            <img src="{{ $profile_picture->temporaryUrl() }}" class="img-thumbnail" style="max-width: 150px;">
                        @elseif ($old_profile_picture)
                            <p class="mt-2">Image actuelle :</p>
                            <img src="{{ Storage::url($old_profile_picture) }}" class="img-thumbnail" style="max-width: 150px;">
                        @endif
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_active" wire:model.defer="is_active">
                        <label class="form-check-label" for="is_active">Actif</label>
                    </div>

                    <button type="submit" class="btn btn-success">{{ $isEditing ? 'Mettre à jour' : 'Enregistrer' }}</button>
                    <button type="button" class="btn btn-secondary" wire:click="cancel">Annuler</button>
                </form>
            </div>
        </div>
    @endif

    {{-- Tableau des docteurs --}}
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Spécialité</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Photo</th>
                    <th>Actif</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->id }}</td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->specialty ?? 'N/A' }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->phone ?? 'N/A' }}</td>
                        <td>
                            @if ($doctor->profile_picture)
                                <img src="{{ Storage::url($doctor->profile_picture) }}" alt="Photo de {{ $doctor->name }}" class="img-thumbnail rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-{{ $doctor->is_active ? 'success' : 'danger' }}">
                                {{ $doctor->is_active ? 'Oui' : 'Non' }}
                            </span>
                            <button class="btn btn-sm btn-link" wire:click="toggleActive({{ $doctor->id }})">Changer</button>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info me-2" wire:click="editDoctor({{ $doctor->id }})">Modifier</button>
                            <button class="btn btn-sm btn-danger" wire:click="deleteDoctor({{ $doctor->id }})" wire:confirm="Êtes-vous sûr de vouloir supprimer ce docteur ?">Supprimer</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Aucun docteur trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Liens de pagination Livewire --}}
    <div class="mt-4">
        {{ $doctors->links('pagination::bootstrap-5') }}
    </div>
</div>