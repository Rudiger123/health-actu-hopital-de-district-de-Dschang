@extends('back.layouts.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Carte de bienvenue -->
        <div class="col-xxl-8 mb-4 order-0">
            <div class="card bg-primary text-white">
                <div class="d-flex align-items-start row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-white mb-3">Bienvenue, Équipe Médicale! 👋</h5>
                            <p class="mb-4 text-white-75">
                                Vous avez publié <strong>12 articles</strong> ce mois-ci.<br>
                                Dernier article : "Nouveaux protocoles COVID-19"
                            </p>
                            <a href="" class="btn btn-light btn-sm">Nouvel Article</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('back/assets/img/backgrounds/1.jpg') }}" 
                                 height="160" alt="Équipe médicale" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques rapides -->
        <div class="col-xxl-4 col-lg-12 col-md-4 order-1">
            <div class="row">
                <!-- Articles publiés -->
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex justify-content-between mb-3">
                                <span>Articles Publiés</span>
                                <i class="bx bx-news text-primary"></i>
                            </div>
                            <h3 class="card-title mb-1">142</h3>
                            <small class="text-success fw-medium">
                                <i class="bx bx-up-arrow-alt"></i> +12% ce mois
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Commentaires -->
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-title d-flex justify-content-between mb-3">
                                <span>Commentaires</span>
                                <i class="bx bx-message-dots text-info"></i>
                            </div>
                            <h3 class="card-title mb-1">326</h3>
                            <small class="text-success fw-medium">
                                <i class="bx bx-up-arrow-alt"></i> +24% cette semaine
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activité récente -->
        <div class="col-12 col-xxl-8 order-2 order-md-3 order-xxl-2 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Activité Récente</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Voir tout</a>
                            <a class="dropdown-item" href="#">Exporter</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Auteur</th>
                                    <th>Date</th>
                                    <th>Vues</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nouvelle unité de soins intensifs</td>
                                    <td>Dr. Dupont</td>
                                    <td>10/05/2023</td>
                                    <td>1,245</td>
                                </tr>
                                <tr>
                                    <td>Avancées en cardiologie</td>
                                    <td>Dr. Martin</td>
                                    <td>08/05/2023</td>
                                    <td>892</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistiques des catégories -->
        <div class="col-12 col-md-8 col-lg-12 col-xxl-4 order-3 order-md-2 mb-4">
            <div class="row">
                <!-- Catégories populaires -->
                <div class="col-12 mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0">Catégories Populaires</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <span>Recherche Médicale</span>
                                <span class="badge bg-label-primary">42 articles</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Soins aux Patients</span>
                                <span class="badge bg-label-success">35 articles</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Équipements Hospitaliers</span>
                                <span class="badge bg-label-warning">28 articles</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Auteurs actifs -->
                <div class="col-12 mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="mb-0">Auteurs Actifs</h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ asset('back/assets/img/avatars/1.png') }}" 
                                     alt="Avatar" class="rounded-circle me-2" width="40">
                                <div>
                                    <h6 class="mb-0">Dr. Lefèvre</h6>
                                    <small>15 articles ce mois</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ asset('back/assets/img/avatars/2.png') }}" 
                                     alt="Avatar" class="rounded-circle me-2" width="40">
                                <div>
                                    <h6 class="mb-0">Dr. Moreau</h6>
                                    <small>12 articles ce mois</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
