<div>
    <form wire:submit.prevent="login">
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
                <i class="bi bi-envelope-fill me-2"></i>{{ __('auth.email_label') }}
            </label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input wire:model="login_id" type="text" class="form-control" id="login-email"
                    placeholder="{{ __('auth.email_placeholder') }}" required>
            </div>
            @error('login_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="login-password" class="form-label">
                <i class="bi bi-lock-fill me-2"></i>{{ __('auth.password_label') }}
            </label>
            <div class="input-group form-password-toggle">
                <span class="input-group-text">
                    <!-- Ton SVG ici -->
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 7C8 4.23858 10.2386 2 13 2C15.7614 2 18 4.23858 18 7C18 9.76142 15.7614 12 13 12C12.5177 12 12.0513 11.9317 11.61 11.8042L9.70711 13.7071C9.51957 13.8946 9.26522 14 9 14H8V15C8 15.5523 7.55228 16 7 16H6V17C6 17.5523 5.55228 18 5 18H3C2.44772 18 2 17.5523 2 17V15C2 14.7348 2.10536 14.4804 2.29289 14.2929L8.19576 8.39003C8.0683 7.94874 8 7.48234 8 7ZM13 4C12.5858 4 12.25 4.33579 12.25 4.75C12.25 5.16421 12.5858 5.5 13 5.5C13.8284 5.5 14.5 6.17157 14.5 7C14.5 7.41421 14.8358 7.75 15.25 7.75C15.6642 7.75 16 7.41421 16 7C16 5.34315 14.6569 4 13 4Z"
                            fill="#555" />
                    </svg>
                </span>
                <input wire:model="password" type="password" class="form-control" id="login-password"
                    placeholder="{{ __('auth.password_placeholder') }}" aria-describedby="basic-default-password" required>
                <span id="basic-default-password" class="input-group-text cursor-pointer"><i
                        class="icon-base bi bi-eye-slash"></i></span>
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
        <div class="mb-3 form-check">
            <input wire:model="remember" type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">
                <i class="bi bi-check2-square me-2"></i>{{ __('auth.remember_me') }}
            </label>
        </div>
    
        <button type="submit" class="btn btn-primary btn-login w-100 py-2" wire:loading.attr="disabled">
            <span wire:loading.remove>
                <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('auth.login_button') }}
            </span>
            <span wire:loading>
                <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                {{ __('auth.login_loading') }}
            </span>
        </button>
    </form>
    

    @push('scripts')
        <script>
            var toggler = document.querySelectorAll('.form-password-toggle i');
            if (typeof toggler !== 'undefined' && toggler !== null) {
                toggler.forEach(function(el) {
                    el.addEventListener('click', function(e) {
                        e.preventDefault();
                        var formPasswordToggle = el.closest('.form-password-toggle');
                        var formPasswordToggleIcon = formPasswordToggle.querySelector('i');
                        var formPasswordToggleInput = formPasswordToggle.querySelector('input');
                        if (formPasswordToggleInput.getAttribute('type') === 'text') {
                            formPasswordToggleInput.setAttribute('type', 'password');
                            formPasswordToggleIcon.classList.replace('bi-eye', 'bi-eye-slash');
                        } else if (formPasswordToggleInput.getAttribute('type') === 'password') {
                            formPasswordToggleInput.setAttribute('type', 'text');
                            formPasswordToggleIcon.classList.replace('bi-eye-slash', 'bi-eye');
                        }
                    });
                });
            }
        </script>
    @endpush
</div>
