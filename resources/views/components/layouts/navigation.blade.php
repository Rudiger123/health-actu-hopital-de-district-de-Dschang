@php
    $currentRoute = request()->route()->getName();
@endphp

@push('css')
    <style>
        .btn-open-login {
            background-color: #0d6efd;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: 500;
        }

        .modal-login .modal-content {
            border-radius: 10px;
            border: none;
        }

        #hospital-header {
            text-align: center;
            margin-bottom: 30px;
        }

        #title {
            color: #0d6efd;
            font-weight: 600;
        }

        #title1 {
            color: #6c757d;
        }

        .btn-login {
            background-color: #0d6efd;
            border: none;
            width: 100%;
            padding: 10px;
            font-weight: 500;
        }

        .btn-login:hover {
            background-color: #0b5ed7;
        }

        .form-control:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }

        /* Styles pour l'onglet de réinitialisation */
        .reset-tab {
            display: none;
        }

        .reset-link {
            cursor: pointer;
            color: #0d6efd;
        }

        .back-to-login {
            cursor: pointer;
            color: #0d6efd;
            display: block;
            text-align: center;
            margin-top: 15px;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
@endpush

<header id="header" class="header d-flex align-items-center fixed-top">
    <div
        class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
            <img src="assets/img/favicon.webp" alt="">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}" @class(['active' => str_starts_with($currentRoute, 'home')])>Home</a></li>
                <li><a href="{{ route('services') }}" @class(['active' => str_starts_with($currentRoute, 'services')])>Services</a></li>
                <li><a href="{{ route('blog.index') }}" @class(['active' => str_starts_with($currentRoute, 'blog.')])>Actualités</a></li>
                <li><a href="{{ route('contact') }}" @class(['active' => str_starts_with($currentRoute, 'contact')])>Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        @guest
            <a class="btn-getstarted btn-open-login cursor-pointer" style="cursor: pointer;" data-bs-toggle="modal"
                data-bs-target="#loginModal">
                Sign in
            </a>
        @endguest

        @auth
            @livewire('back.user-top-info')
        @endauth

    </div>
</header>

<!-- Modal de connexion avec Livewire -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-auth">
            <div class="mt-3">
                <div class="w-100">
                    <div style="text-align: center; margin-bottom: 30px;" id="hospital-header">
                        <h2 style="color: #0d6efd; font-weight: 600;">Hello,</h2>
                        <h2 style="color: #0d6efd; font-weight: 600;">Welcome back</h2>
                        <p class="mt-3" style="color: #6c757d;">Connectez-vous à votre compte</p>
                    </div>
                </div>
            </div>
            <div class="modal-body p-4">
                <livewire:auth.login-form />

                <div class="text-center mt-3">
                    <a class="auth-link" data-bs-toggle="modal" data-bs-target="#resetModal" data-bs-dismiss="modal">
                        Mot de passe oublié ?
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<livewire:reset-password-form />


@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            // Fermer le modal après une connexion réussie
            Livewire.on('loginSuccess', () => {
                const modal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
                modal.hide();
            });

            // Réinitialiser le formulaire quand le modal se ferme
            document.getElementById('loginModal').addEventListener('hidden.bs.modal', () => {
                Livewire.dispatch('reset-form');
            });
        });
    </script>
@endpush
