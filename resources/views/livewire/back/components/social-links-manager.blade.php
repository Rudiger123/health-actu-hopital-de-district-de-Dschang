<div>
    <div class="container">
        <div class="justify-content-center">
            <div class="">
                <div class="">
                    <div class=" p-4">
                        <h2 class="card-title mb-4">Gestion des réseaux sociaux</h2>
    
                        <!-- Navigation par onglets -->
                        <ul class="nav nav-tabs mb-4 flex-nowrap overflow-auto" id="socialTabs" role="tablist" style="scrollbar-width: none; -ms-overflow-style: none;">
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link active d-flex align-items-center" id="facebook-tab" data-bs-toggle="tab" data-bs-target="#facebook" type="button" role="tab">
                                    <i class="bx bxl-facebook me-2"></i>
                                    <span class="d-none d-sm-inline">Facebook</span>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link d-flex align-items-center" id="twitter-tab" data-bs-toggle="tab" data-bs-target="#twitter" type="button" role="tab">
                                    <i class="bx bxl-twitter-x me-2"></i>
                                    <span class="d-none d-sm-inline">Twitter</span>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link d-flex align-items-center" id="instagram-tab" data-bs-toggle="tab" data-bs-target="#instagram" type="button" role="tab">
                                    <i class="bx bxl-instagram me-2"></i>
                                    <span class="d-none d-sm-inline">Instagram</span>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link d-flex align-items-center" id="linkedin-tab" data-bs-toggle="tab" data-bs-target="#linkedin" type="button" role="tab">
                                    <i class="bx bxl-linkedin me-2"></i>
                                    <span class="d-none d-sm-inline">LinkedIn</span>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link d-flex align-items-center" id="youtube-tab" data-bs-toggle="tab" data-bs-target="#youtube" type="button" role="tab">
                                    <i class="bx bxl-youtube me-2"></i>
                                    <span class="d-none d-sm-inline">YouTube</span>
                                </button>
                            </li>
                            <li class="nav-item flex-shrink-0" role="presentation">
                                <button class="nav-link d-flex align-items-center" id="github-tab" data-bs-toggle="tab" data-bs-target="#github" type="button" role="tab">
                                    <i class="bx bxl-github me-2"></i>
                                    <span class="d-none d-sm-inline">GitHub</span>
                                </button>
                            </li>
                        </ul>
                        
                        <style>
                            /* Masquer la scrollbar tout en gardant le défilement */
                            #socialTabs::-webkit-scrollbar {
                                display: none;
                            }
                            
                            /* Style pour les petits écrans */
                            @media (max-width: 576px) {
                                .nav-tabs .nav-link {
                                    padding: 0.5rem;
                                    font-size: 0.875rem;
                                }
                                
                                .nav-tabs .nav-link i {
                                    margin-right: 0 !important;
                                }
                            }
                        </style>
    
                        <form wire:submit.prevent="save">
                            <!-- Contenu des onglets -->
                            <div class="tab-content" id="socialTabsContent">
                                <!-- Facebook -->
                                <div class="tab-pane fade show active" id="facebook" role="tabpanel">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="bx bxl-facebook"></i>
                                        </span>
                                        <input 
                                            type="url" 
                                            wire:model="links.facebook"
                                            placeholder="https://facebook.com/votreprofil" 
                                            class="form-control"
                                        >
                                    </div>
                                </div>
    
                                <!-- Twitter -->
                                <div class="tab-pane fade" id="twitter" role="tabpanel">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-dark text-white">
                                            <i class="bx bxl-twitter-x"></i>
                                        </span>
                                        <input 
                                            type="url" 
                                            wire:model="links.twitter"
                                            placeholder="https://twitter.com/votreprofil" 
                                            class="form-control"
                                        >
                                    </div>
                                </div>
    
                                <!-- Instagram -->
                                <div class="tab-pane fade" id="instagram" role="tabpanel">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" style="background: linear-gradient(45deg, #405DE6, #833AB4, #C13584, #E1306C, #FD1D1D); color: white;">
                                            <i class="bx bxl-instagram"></i>
                                        </span>
                                        <input 
                                            type="url" 
                                            wire:model="links.instagram"
                                            placeholder="https://instagram.com/votreprofil" 
                                            class="form-control"
                                        >
                                    </div>
                                </div>
    
                                <!-- LinkedIn -->
                                <div class="tab-pane fade" id="linkedin" role="tabpanel">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="bx bxl-linkedin"></i>
                                        </span>
                                        <input 
                                            type="url" 
                                            wire:model="links.linkedin"
                                            placeholder="https://linkedin.com/in/votreprofil" 
                                            class="form-control"
                                        >
                                    </div>
                                </div>
    
                                <!-- YouTube -->
                                <div class="tab-pane fade" id="youtube" role="tabpanel">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-danger text-white">
                                            <i class="bx bxl-youtube"></i>
                                        </span>
                                        <input 
                                            type="url" 
                                            wire:model="links.youtube"
                                            placeholder="https://youtube.com/votrechaine" 
                                            class="form-control"
                                        >
                                    </div>
                                </div>
    
                                <!-- GitHub -->
                                <div class="tab-pane fade" id="github" role="tabpanel">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-dark text-white">
                                            <i class="bx bxl-github"></i>
                                        </span>
                                        <input 
                                            type="url" 
                                            wire:model="links.github"
                                            placeholder="https://github.com/votreprofil" 
                                            class="form-control"
                                        >
                                    </div>
                                </div>
                            </div>
    
                            <!-- Bouton de sauvegarde -->
                            <div class="d-grid mt-4">
                                <button 
                                    type="submit" 
                                    class="btn btn-primary btn-lg"
                                >
                                    <i class="bi bi-save-fill me-2"></i>
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
