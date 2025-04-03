<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

new class extends Component {
    public string $email = '';
    public bool $isSent = false;
    public string $statusMessage = '';

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:255'],
        ];
    }

    public function sendResetLink(): void
    {
        $this->validate();

        $status = Password::sendResetLink($this->only(['email']));

        $this->isSent = $status === Password::RESET_LINK_SENT;
        $this->statusMessage = __($status);

        if ($this->isSent) {
            $this->reset('email');
            Session::flash('status', $this->statusMessage);
        }
    }
};
?>

<div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-auth">
            <div class="modal-header">
                <div class="w-100 text-center">
                    <h5 class="modal-title">Réinitialisation du mot de passe</h5>
                    <p class="modal-subtitle text-muted">Entrez votre email pour recevoir le lien de réinitialisation
                    </p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                @if (session('status'))
                    <div class="alert alert-success mb-4">
                        {{ session('status') }}
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
                            <input wire:model="email" type="email" id="resetEmail"
                                class="form-control @error('email') is-invalid @enderror" placeholder="votre@email.com"
                                autofocus required>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2" wire:loading.attr="disabled">
                        <span wire:loading.remove>
                            <i class="bi bi-send-fill me-2"></i>Envoyer le lien
                        </span>
                        <span wire:loading>
                            <span class="spinner-border spinner-border-sm me-2" role="status"
                                aria-hidden="true"></span>
                            Envoi en cours...
                        </span>
                    </button>
                </form>

                <div class="text-center mt-3">
                    <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#loginModal"
                        data-bs-dismiss="modal">
                        <i class="bi bi-arrow-left me-2"></i>Retour à la connexion
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
