<div>
    <form wire:submit.prevent="updatePassword()">
        <h4>Changer le mot de passe</h4>
        <div class="mb-3">
            <label for="current_password" class="form-label">Mot de passe
                actuel</label>
            <input type="password" id="current_password" class="form-control"
                wire:model.defer="current_password">
            @error('current_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Nouveau mot de passe</label>
            <input type="password" id="new_password" class="form-control"
                wire:model.defer="new_password">
            @error('new_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirmer le mot de
                passe</label>
            <input type="password" id="confirm_password" class="form-control"
                wire:model.defer="confirm_password">
            @error('confirm_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary py-2" wire:loading.attr="disabled">
            <span wire:loading.remove>
                <i class="bi bi-box-arrow-in-right me-2"></i>Mettre à jour le mot de passe
            </span>
            <span wire:loading>
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                mise à jour...
            </span>
        </button>
    </form>
</div>
