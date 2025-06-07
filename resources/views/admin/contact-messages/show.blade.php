@extends('back.layouts.app')

@section('content')
        <!-- En-tête -->
    <div class="container-fluid py-4 container-xxl flex-grow-1 container-p-y">

        <div class="py-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#" class="text-primary fw-semibold">{{ $message->name }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Détails du message</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-success">
                                <i class="fas fa-arrow-left"></i> Retour
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Informations de l'expéditeur</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nom</th>
                                        <td>{{ $message->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $message->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Téléphone</th>
                                        <td>{{ $message->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Date d'envoi</th>
                                        <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4>Message</h4>
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Sujet :</strong> {{ $message->subject }}
                                    </div>
                                    <div class="card-body">
                                        {{ $message->message }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($message->reply)
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h4>Réponse envoyée</h4>
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Date de réponse :</strong>
                                            {{ $message->replied_at ? $message->replied_at->format('d/m/Y H:i') : '' }}
                                        </div>
                                        <div class="card-body">
                                            {{ $message->reply }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h4>Répondre au message</h4>
                                    <form action="{{ route('admin.contact-messages.reply', $message) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="reply">Votre réponse</label>
                                            <textarea name="reply" id="reply" rows="5" class="form-control @error('reply') is-invalid @enderror"
                                                required></textarea>
                                            @error('reply')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-4">
                                            <i class="fas fa-paper-plane"></i> Envoyer la réponse
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
