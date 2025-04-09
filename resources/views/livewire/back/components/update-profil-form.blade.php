<div>
    <form wire:submit.prevent="updateProfile">
        <h4>Informations personnelles</h4>
        <div class="mb-3">
            <label for="name" class="form-label">Nom complet</label>
            <input type="text" id="name" class="form-control" placeholder="Entrez votre nom complet"
                wire:model="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" id="username" class="form-control" wire:model="username"
                placeholder="Entrez votre nom d'utilisateur">
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" wire:model="email" disabled>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea id="bio" class="form-control" wire:model="bio" placeholder="Entrez votre bio..."></textarea>
            @error('bio')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">
                <i class="bx bx-cloud-upload text-lg"></i>
                <span>Glissez-déposez une image ou cliquez pour sélectionner</span>
            </label>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-20 h-20 border border-dashed border-gray-300 rounded-full bg-gray-50 overflow-hidden">
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" class="object-cover w-full h-full rounded-full" alt="Preview">
                    @else
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                             stroke-width="1.5" viewBox="0 0 24 24" stroke-linecap="round"
                             stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="10" r="3"></circle>
                            <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"></path>
                        </svg>
                    @endif 
                </div>

                <div class="flex-1">
                    <input id="photo" type="file" wire:model.lazy="photo"
                           class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4
                           file:rounded-full file:border-0 file:text-sm file:font-semibold
                           file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    <div wire:loading wire:target="photo" class="text-sm text-gray-500 mt-1">Chargement...</div>
                    @error('photo')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary py-2" wire:loading.attr="disabled">
            <span wire:loading.remove>
                <i class="bi bi-box-arrow-in-right me-2"></i>Mettre à jour
            </span>
            <span wire:loading>
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                Mise à jour...
            </span>
        </button>

    </form>

</div>
