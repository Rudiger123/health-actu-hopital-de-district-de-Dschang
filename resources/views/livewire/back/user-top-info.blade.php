<div>
    <ul class="navbar-nav flex-row align-items-center ms-md-auto">
        <!-- User Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center py-0" href="#" 
               id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="avatar me-2">
                    <img src="{{ "/storage/".$user->picture ?? asset('back/assets/img/avatars/1.png') }}" 
                         alt="Avatar" class="rounded-circle" width="36" height="36">
                </div>
                <div class="d-none d-md-block">
                    <span class="fw-semibold">{{ $user->username }}</span>
                    <small class="text-muted d-block">Online</small>
                </div>
            </a>
            
            <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                <li class="px-3 py-2">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ "/storage/".$user->picture ?? asset('back/assets/img/avatars/1.png') }}" 
                                 alt="Avatar" class="rounded-circle" width="48" height="48">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">{{ $user->name }}</h6>
                            <small class="text-muted">{{ $user->username }}</small>
                        </div>
                    </div>
                </li>
                <li><hr class="dropdown-divider my-2"></li>
                <li>
                    <a href="{{ route('admin.profile') }}" class="dropdown-item d-flex align-items-center">
                        <i class="bx bx-user me-2"></i>
                        <span>Mon Profil</span>
                    </a>
                </li>
                <li><hr class="dropdown-divider my-2"></li>
                <li>
                   <livewire:logout-handler/>
                </li>
            </ul>
        </li>
    </ul>
</div>
