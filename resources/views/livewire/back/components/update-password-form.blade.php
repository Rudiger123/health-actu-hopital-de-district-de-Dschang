<div>
    <form wire:submit.prevent="updatePassword()">
        <h4>🔒 Changer le mot de passe 🔒</h4>

        <div class="mb-3">
            <label for="login-password" class="form-label">
                <i class="bi bi-lock-fill me-2"></i>Mot de passe actuel
            </label>
            <div class="input-group form-password-toggle">
                <span class="input-group-text">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 7C8 4.23858 10.2386 2 13 2C15.7614 2 18 4.23858 18 7C18 9.76142 15.7614 12 13 12C12.5177 12 12.0513 11.9317 11.61 11.8042L9.70711 13.7071C9.51957 13.8946 9.26522 14 9 14H8V15C8 15.5523 7.55228 16 7 16H6V17C6 17.5523 5.55228 18 5 18H3C2.44772 18 2 17.5523 2 17V15C2 14.7348 2.10536 14.4804 2.29289 14.2929L8.19576 8.39003C8.0683 7.94874 8 7.48234 8 7ZM13 4C12.5858 4 12.25 4.33579 12.25 4.75C12.25 5.16421 12.5858 5.5 13 5.5C13.8284 5.5 14.5 6.17157 14.5 7C14.5 7.41421 14.8358 7.75 15.25 7.75C15.6642 7.75 16 7.41421 16 7C16 5.34315 14.6569 4 13 4Z"
                            fill="orange" />
                    </svg>
                </span>
                <input wire:model.defer="current_password" type="password" class="form-control" id="login-password"
                    placeholder="*************" aria-describedby="basic-default-password" required>
                <span id="basic-default-password" class="input-group-text cursor-pointer"><i
                        class="icon-base bx bx-hide"></i></span>
            </div>
            @error('current_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="login-password" class="form-label">
                <i class="bi bi-lock-fill me-2"></i>Entrer le nouveau Mot de passe
            </label>
            <div class="input-group form-password-toggle">
                <span class="input-group-text">
                    🔒
                </span>
                <input wire:model.defer="new_password" type="password" class="form-control" id="login-password"
                    placeholder="*************" aria-describedby="basic-default-password" required>
                <span id="basic-default-password" class="input-group-text cursor-pointer"><i
                        class="icon-base bx bx-hide"></i></span>
            </div>
            @error('new_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="login-password" class="form-label">
                <i class="bi bi-lock-fill me-2"></i>Confirmer le nouveau Mot de passe
            </label>
            <div class="input-group form-password-toggle">
                <span class="input-group-text">
                    🔒
                </span>
                <input wire:model.defer="confirm_password" type="password" class="form-control" id="login-password"
                    placeholder="*************" aria-describedby="basic-default-password" required>
                <span id="basic-default-password" class="input-group-text cursor-pointer"><i
                        class="icon-base bx bx-hide"></i></span>
            </div>
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
