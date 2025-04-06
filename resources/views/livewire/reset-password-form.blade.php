<div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-auth">
            <div class="modal-header">
                <div class="w-100 text-center">
                    <h5 class="modal-title">Réinitialisation du mot de passe</h5>
                    <p class="modal-subtitle text-muted">Entrez votre email pour recevoir le lien de réinitialisation</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="resetForm"></button>
            </div>
            <div class="modal-body p-4">
                @if (session('status') || $showSuccess)
                    <div class="alert alert-success mb-4" x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)">
                        {{ session('status') ?? $statusMessage }}
                    </div>
                @endif

                <form wire:submit.prevent="sendResetLink" novalidate>
                    <div class="mb-3">
                        <label for="resetEmail" class="form-label">
                            <i class="bi bi-envelope-fill me-2"></i>Adresse Email
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input wire:model="email" 
                                   type="email" 
                                   id="resetEmail"
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="votre@email.com"
                                   autofocus
                                   autocomplete="email"
                                   wire:loading.attr="disabled">
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                <i class="bi bi-exclamation-circle-fill me-2"></i>{{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" 
                            class="btn btn-primary w-100 py-2" 
                            wire:loading.attr="disabled"
                            wire:target="sendResetLink">
                        <span wire:loading.remove wire:target="sendResetLink">
                            <i class="bi bi-send-fill me-2"></i>Envoyer le lien
                        </span>
                        <span wire:loading wire:target="sendResetLink">
                            <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                            Envoi en cours...
                        </span>
                    </button>
                </form>

                <div class="text-center mt-3">
                    <a href="#" 
                       class="text-decoration-none" 
                       data-bs-toggle="modal" 
                       data-bs-target="#loginModal"
                       data-bs-dismiss="modal"
                       wire:click="resetForm">
                        <i class="bi bi-arrow-left me-2"></i>Retour à la connexion
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@script
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('reset-success', () => {
            setTimeout(() => {
                @this.resetSuccess();
            }, 5000);
        });
    });
</script>
@endscript