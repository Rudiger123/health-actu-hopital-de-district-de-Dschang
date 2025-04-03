<form wire:submit.prevent="login">
    @csrf

    <!-- Affichage des alertes -->
    <div id="login-alerts" class="mb-3" wire:ignore.self>
        @if (session('alertType') && session('alertMessage'))
            <div class="alert alert-{{ session('alertType') }}">
                {!! session('alertMessage') !!}
            </div>
        @endif

        @if ($alertType && $alertMessage)
            <div class="alert alert-{{ $alertType }}">
                {{ $alertMessage }}
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="login-email" class="form-label">
            <i class="bi bi-envelope-fill me-2"></i>Adresse Email
        </label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-envelope"></i>
            </span>
            <input wire:model="login_id" type="text" class="form-control" id="login-email"
                placeholder="Entrez votre email / username" required>
        </div>
        @error('login_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="login-password" class="form-label">
            <i class="bi bi-lock-fill me-2"></i>Mot de passe
        </label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="bi bi-key"></i>
            </span>
            <input wire:model="password" type="password" class="form-control" id="login-password"
                placeholder="*************" required>
        </div>
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>


    <div class="mb-3 form-check">
        <input wire:model="remember" type="checkbox" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">
            <i class="bi bi-check2-square me-2"></i>Se souvenir de moi
        </label>
    </div>

    <button type="submit" class="btn btn-primary btn-login w-100 py-2" wire:loading.attr="disabled">
        <span wire:loading.remove>
            <i class="bi bi-box-arrow-in-right me-2"></i>Se connecter
        </span>
        <span wire:loading>
            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
            Connexion...
        </span>
    </button>
</form>
