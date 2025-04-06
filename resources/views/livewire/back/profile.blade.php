<div wire:ignore.self>

    <style>
        /* Base Styles */
        .profile-revolution-container {
            background-color: #ffffff;
            padding: 2rem 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        /* Profile Card Styles */
        .profile-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .avatar-container {
            position: relative;
            margin-top: 1rem;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .avatar-edit-btn {
            position: absolute;
            bottom: 10px;
            right: 30px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #7367f0;
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(115, 103, 240, 0.4);
            transition: all 0.3s ease;
        }

        .avatar-edit-btn:hover {
            background: #5d50e6;
            transform: translateY(-2px);
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 1rem;
            color: #2a2a2a;
        }

        .profile-email {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .profile-badge {
            display: inline-block;
            background: rgba(115, 103, 240, 0.1);
            color: #7367f0;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        /* Stats Section */
        .profile-stats {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin: 1.5rem 0;
            padding: 1rem 0;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.25rem;
            font-weight: 600;
            color: #7367f0;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #6c757d;
            margin-top: 0.25rem;
        }

        /* Social Links */
        .social-links {
            padding: 1rem 0;
        }

        .section-title {
            font-size: 0.9rem;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
        }

        .social-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-btn.facebook {
            background-color: #3b5998;
        }

        .social-btn.twitter {
            background-color: #1da1f2;
        }

        .social-btn.instagram {
            background-color: #e1306c;
        }

        .social-btn.linkedin {
            background-color: #0077b5;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Content Card Styles */
        .profile-content-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            height: 100%;
            overflow: hidden;
        }

        /* Tabs Navigation */
        .profile-tabs {
            display: flex;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 0 1.5rem;
        }

        .profile-tabs .nav-item {
            margin-right: 0.5rem;
        }

        .profile-tabs .nav-link {
            padding: 1rem 1.25rem;
            color: #6c757d;
            font-weight: 500;
            border-radius: 0;
            border: none;
            background: transparent;
            display: flex;
            align-items: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .profile-tabs .nav-link.active {
            color: #7367f0;
            background: transparent;
        }

        .profile-tabs .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 2px;
            background: #7367f0;
        }

        .profile-tabs .nav-link i {
            font-size: 1.1rem;
            margin-right: 0.5rem;
        }

        /* Tab Content */
        .tab-content {
            padding: 1.5rem;
        }

        .profile-form .form-label {
            font-weight: 500;
            color: #555;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .profile-form .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .profile-form .form-control:focus {
            border-color: #7367f0;
            box-shadow: 0 0 0 0.25rem rgba(115, 103, 240, 0.25);
        }

        .form-footer {
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding-top: 1.5rem;
            margin-top: 1rem;
        }

        /* Security Tab */
        .security-form .input-group {
            margin-bottom: 1rem;
        }

        .toggle-password {
            cursor: pointer;
        }

        .password-strength .progress {
            height: 6px;
            border-radius: 3px;
        }

        .password-strength .progress-bar {
            background-color: #7367f0;
            transition: width 0.3s ease;
        }

        /* Social Tab */
        .social-settings {
            padding: 0.5rem;
        }

        .account-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 1rem;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .account-info {
            display: flex;
            align-items: center;
        }

        .account-info i {
            font-size: 1.5rem;
            margin-right: 0.75rem;
        }

        .account-info .facebook-icon {
            color: #3b5998;
        }

        .account-info .twitter-icon {
            color: #1da1f2;
        }

        .account-info .instagram-icon {
            color: #e1306c;
        }

        .account-info .linkedin-icon {
            color: #0077b5;
        }

        /* Danger Zone */
        .danger-zone .alert {
            border-radius: 8px;
        }

        .danger-item {
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .danger-item h6 {
            color: #dc3545;
            font-weight: 600;
        }

        .danger-item p {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        /* Avatar Modal */
        .avatar-uploader .dropzone {
            border: 2px dashed #e0e0e0;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .avatar-uploader .dropzone:hover {
            border-color: #7367f0;
            background: rgba(115, 103, 240, 0.05);
        }

        .avatar-uploader .dropzone i {
            font-size: 2rem;
            color: #7367f0;
            margin-bottom: 0.5rem;
        }

        .avatar-uploader .dropzone p {
            color: #6c757d;
            margin-bottom: 0;
        }

        #avatarUpload {
            display: none;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .profile-card {
                margin-bottom: 2rem;
            }

            .profile-tabs {
                flex-wrap: nowrap;
                overflow-x: auto;
                padding-bottom: 10px;
            }

            .profile-tabs .nav-link {
                white-space: nowrap;
            }
        }

        @media (max-width: 768px) {
            .profile-stats {
                gap: 1rem;
            }

            .tab-content {
                padding: 1rem;
            }
        }
    </style>

    @section('content')
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="profile-revolution-container">
                    <div class="row g-4">
                        <!-- Colonne de Profil -->
                        <div class="col-lg-4" style="background-color:white">
                            <div class="profile-card text-center p-4">
                                <div class="avatar-container mb-4" style="position: relative; display: inline-block;">
                                    <img src="{{ auth()->user()->avatar ?? asset('back/assets/img/avatars/1.png') }}" 
                                         style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #f0f0f0;">
                                    <button style="position: absolute; bottom: 10px; right: 10px; width: 32px; height: 32px; border-radius: 50%; background-color: #6c757d; color: white; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer;" 
                                            data-bs-toggle="modal" data-bs-target="#avatarModal">
                                        <i class="bx bx-edit" style="font-size: 16px;"></i>
                                    </button>
                                </div>
                                <h3 class="profile-name">Admin</h3>
                                <p class="profile-email text-muted">admin@email.com</p>
                                <div class="profile-badge">Administrateur</div>
                        
                                <div class="profile-stats mt-4" style="display: flex; justify-content: center; gap: 20px;">
                                    <div class="stat-item">
                                        <div class="stat-number" style="font-weight: bold; font-size: 18px;">142</div>
                                        <div class="stat-label" style="font-size: 14px; color: #6c757d;">Articles</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number" style="font-weight: bold; font-size: 18px;">326</div>
                                        <div class="stat-label" style="font-size: 14px; color: #6c757d;">Commentaires</div>
                                    </div>
                                </div>
                        
                                <div class="social-links mt-4">
                                    <h5 class="section-title" style="font-size: 16px; margin-bottom: 12px;">Réseaux Sociaux</h5>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="#" style="width: 36px; height: 36px; border-radius: 50%; background-color: #3b5998; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="bx bxl-facebook"></i></a>
                                        <a href="#" style="width: 36px; height: 36px; border-radius: 50%; background-color: #1da1f2; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="bx bxl-twitter"></i></a>
                                        <a href="#" style="width: 36px; height: 36px; border-radius: 50%; background-color: #e1306c; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="bx bxl-instagram"></i></a>
                                        <a href="#" style="width: 36px; height: 36px; border-radius: 50%; background-color: #0077b5; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none;"><i class="bx bxl-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Colonne de Contenu -->
                        <div class="col-lg-8">
                            <div class="profile-content-card" style="background-color:white">
                                <!-- Navigation par Onglets -->
                                <ul class="nav nav-pills profile-tabs" id="profileTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="details-tab" data-bs-toggle="pill"
                                            data-bs-target="#details" type="button">
                                            <i class="bx bx-user-circle me-2"></i> Informations
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="security-tab" data-bs-toggle="pill"
                                            data-bs-target="#security" type="button">
                                            <i class="bx bx-lock-alt me-2"></i> Sécurité
                                        </button>
                                    </li>
                                </ul>

                                <!-- Contenu des Onglets -->
                                <div class="tab-content p-4">
                                    <!-- Onglet Informations -->
                                    <div class="tab-pane fade show active" id="details" role="tabpanel">
                                        <form class="profile-form">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">Nom Complet</label>
                                                    <input type="text" class="form-control" value="Admin">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Nom d'Utilisateur</label>
                                                    <input type="text" class="form-control" value="admin">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" value="admin@email.com">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Téléphone</label>
                                                    <input type="tel" class="form-control"
                                                        placeholder="+1 234 567 890">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Bio</label>
                                                    <textarea class="form-control" rows="3" placeholder="Décrivez-vous..."></textarea>
                                                </div>
                                            </div>
                                            <div class="form-footer mt-4">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bx bx-save me-2"></i> Enregistrer
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Onglet Sécurité -->
                                    <div class="tab-pane fade" id="security" role="tabpanel">
                                        <form class="security-form">
                                            <div class="mb-3">
                                                <label class="form-label">Mot de Passe Actuel</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="currentPassword">
                                                    <button class="btn btn-outline-secondary toggle-password"
                                                        type="button">
                                                        <i class="bx bx-hide"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nouveau Mot de Passe</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="newPassword">
                                                    <button class="btn btn-outline-secondary toggle-password"
                                                        type="button">
                                                        <i class="bx bx-hide"></i>
                                                    </button>
                                                </div>
                                                <div class="password-strength mt-2">
                                                    <div class="progress">
                                                        <div class="progress-bar" role="progressbar" style="width: 0%">
                                                        </div>
                                                    </div>
                                                    <small class="text-muted">Force du mot de passe</small>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label">Confirmer le Mot de Passe</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="confirmPassword">
                                                    <button class="btn btn-outline-secondary toggle-password"
                                                        type="button">
                                                        <i class="bx bx-hide"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bx bx-lock-alt me-2"></i> Mettre à jour le Mot de Passe
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal pour l'Avatar -->
                <div class="modal fade" id="avatarModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Changer la Photo de Profil</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="avatar-uploader">
                                    <div class="dropzone">
                                        <i class="bx bx-cloud-upload"></i>
                                        <p>Glissez-déposez une image ou cliquez pour sélectionner</p>
                                        <input type="file" id="avatarUpload" accept="image/*">
                                    </div>
                                    <div class="avatar-preview mt-3 text-center">
                                        <img id="avatarPreview" src="#" alt="Preview"
                                            class="d-none rounded-circle" width="120">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- / Content -->

            </div>
        @endsection
    </div>
