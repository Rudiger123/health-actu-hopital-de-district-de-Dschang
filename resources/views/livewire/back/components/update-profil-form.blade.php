<div>
    <form wire:submit="updateProfile">
        <h4>Informations personnelles</h4>
        <div class="mb-3">
            <label for="name" class="form-label">Nom complet</label>
            <input type="text" id="name" class="form-control" placeholder="Enter your fullname"
                wire:model.defer="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
             <input type="text" id="username" class="form-control"
                wire:model.defer="username" placeholder="Enter your username...">
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control"
                wire:model.defer="email" disabled>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea id="bio" class="form-control" wire:model.defer="bio" placeholder="enter your bio......"></textarea>
            @error('bio')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary py-2" wire:loading.attr="disabled">
            <span wire:loading.remove>
                <i class="bi bi-box-arrow-in-right me-2"></i>Mettre à jour
            </span>
            <span wire:loading>
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                mise à jour...
            </span>
        </button>
    </form>
</div>
