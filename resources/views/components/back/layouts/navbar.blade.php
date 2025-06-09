<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <span class="text-primary">
                    <img src="{{ asset('favicon.png') }}" class="w-8" alt="">
                </span>
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">H.R.A.Dsch</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Route::is('admin.dashboard') ? 'active' : '' }} open">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div class="text-truncate" data-i18n="Dashboard">{{ __('menu.dashboard') }}</div>
            </a>
        </li>

        <!-- Articles -->
        <li class="menu-item {{ Route::is('admin.posts') ? 'active' : '' }}">
            <a href="{{ route('admin.posts') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div class="text-truncate" data-i18n="Posts">{{ __('menu.posts') }}</div>
            </a>
        </li>

        <!-- Catégories -->
        <li class="menu-item {{ Route::is('admin.categories') ? 'active' : '' }}">
            <a href="{{ route('admin.categories') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div class="text-truncate" data-i18n="Categories">{{ __('menu.categories') }}</div>
            </a>
        </li>

        <!-- Tags -->
        <li class="menu-item {{ Route::is('admin.tags') ? 'active' : '' }}">
            <a href="{{ route('admin.tags') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-tag"></i>
                <div class="text-truncate" data-i18n="Tags">{{ __('menu.tags') }}</div>
            </a>
        </li>

        <!-- Commentaires -->
        <li class="menu-item {{ Route::is('admin.commentsManager') ? 'active' : '' }}"">
            <a href="{{ route('admin.commentsManager') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-comment"></i>
                <div class="text-truncate" data-i18n="Comments">{{ __('menu.comments') }}</div>
            </a>
        </li>

        <!-- messages -->
        <li class="menu-item {{ Route::is('admin.contact-messages.index') ? 'active' : '' }}"">
            <a href="{{ route('admin.contact-messages.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message"></i>
                <div class="text-truncate" data-i18n="messages">Messages</div>
            </a>
        </li>

         <!-- newsletter -->
         <li class="menu-item {{ Route::is('admin.subscribers') ? 'active' : '' }}"">
            <a href="{{ route('admin.subscribers') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-message"></i>
                <div class="text-truncate" data-i18n="messages">Newsletters</div>
            </a>
        </li>

        <!-- Utilisateurs -->
        @can('viewAny', App\Models\User::class)
            <li class="menu-item {{ Route::is('admin.usersManager') ? 'active' : '' }}"">
                <a href="{{ route('admin.usersManager') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div class="text-truncate" data-i18n="Users">{{ __('menu.users') }}</div>
                </a>
            </li>
        @endcan

        <!-- Paramètres -->
        <li class="menu-item">
            @livewire('back.admin.general-settings')
        </li>

        {{-- <li class="menu-item mt-auto">
            <div class="fixed bottom-4 right-4">
                <a href="{{ route('home') }}" class="btn btn-primary">
                    Aller à l’espace utilisateur
                </a>
            </div>
        </li> --}}
    </ul>
</aside>
