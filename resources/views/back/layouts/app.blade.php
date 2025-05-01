<!doctype html>

<html lang="en" class="layout-menu-fixed layout-compact" data-assets-path="back/assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title> {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.webp') }}" type="image/x-icon" />

    {{--  import tailwindcss and alpinejs  --}}
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('back/assets/vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{ asset('back/assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('back/assets/css/bootstrap-tagsinput.css') }}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('back/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
   
    <!-- Page CSS -->

    @livewireStyles

    {{--  stylesheet files import  --}}
    @stack('admincss')
    {{--  stylesheet files import  --}}
    @stack('adminjs')


    <!-- Helpers -->
    <script src="{{ asset('back/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('back/assets/js/config.js') }}"></script>

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <x-back.layouts.navbar></x-back.layouts.navbar>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <x-back.layouts.menu></x-back.layouts.menu>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <main>
                        @yield('content')
                    </main>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl mt-5">
                            <footer class="footer-container text-center py-4 border-top">
                                <div class="mb-2">
                                    &copy; <span id="current-year"></span> Votre Société. Tous droits réservés.
                                </div>
                                <div class="text-muted small">
                                    Développé avec <span class="text-danger">&hearts;</span> par votre équipe
                                </div>
                            </footer>
                        </div>

                        <script>
                            // Mise à jour dynamique de l'année
                            document.getElementById('current-year').textContent = new Date().getFullYear();
                        </script>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- / Layout wrapper -->

    {{-- livewire scripts --}}
    @livewireScripts

    <!-- Core JS -->
    <script src="{{ asset('back/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('back/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('back/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('back/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('back/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('back/assets/js/bootstrap-tagsinput.js') }}"></script>
    <!-- endbuild -->

    <!-- Main JS -->
    <script src="{{ asset('back/assets/js/main.js') }}"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('showAlert', (data) => {
                Swal.fire({
                    title: data[0].title,
                    text: data[0].text,
                    icon: data[0].type,
                    confirmButtonText: 'OK'
                });
            });
        });
        document.addEventListener('DOMContentLoaded', () => {
            @if (session('toast'))
                Swal.fire({
                    icon: "{{ session('toast.type') }}",
                    title: "{{ session('toast.message') }}",
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif
        });

        
            // Écouteur pour la confirmation de suppression
            window.addEventListener('confirm-logout', event => {
                const {
                    title,
                    text
                } = event.detail;

                Swal.fire({
                    title: title || 'Confirmer la déconnexion',
                    text: text || "Êtes-vous sûr de vouloir vous déconnecter ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, deconnexion !',
                    cancelButtonText: 'Annuler'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('logout');
                    }
                });
            });
        </script>


</body>

</html>
