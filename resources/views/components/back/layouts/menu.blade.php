<nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="icon-base bx bx-menu icon-md"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center me-auto">
                            <div class="nav-item d-flex align-items-center">
                                <span class="w-px-22 h-px-22"><i class="icon-base bx bx-search icon-md"></i></span>
                                <input type="text"
                                    class="form-control border-0 shadow-none ps-1 ps-sm-2 d-md-block d-none"
                                    placeholder="Searchback." aria-label="Searchback." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                            <!-- User Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center py-0" href="#" 
                                   id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar me-2">
                                        <img src="{{ auth()->user()->avatar ?? asset('back/assets/img/avatars/1.png') }}" 
                                             alt="Avatar" class="rounded-circle" width="36" height="36">
                                    </div>
                                    <div class="d-none d-md-block">
                                        <span class="fw-semibold">{{ auth()->user()->username }}</span>
                                        <small class="text-muted d-block">Online</small>
                                    </div>
                                </a>
                                
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
                                    <li class="px-3 py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ auth()->user()->image ?? asset('back/assets/img/avatars/1.png') }}" 
                                                     alt="Avatar" class="rounded-circle" width="48" height="48">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                                                <small class="text-muted">{{ auth()->user()->username }}</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li><hr class="dropdown-divider my-2"></li>
                                    <li>
                                        <a href="{{ route('admin.profile') }}" wire:navigate class="dropdown-item d-flex align-items-center">
                                            <i class="bx bx-user me-2"></i>
                                            <span>Mon Profil</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="">
                                            <i class="bx bx-cog me-2"></i>
                                            <span>Paramètres</span>
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
                </nav>