@extends('layouts.app')

@section('title', 'Reset Password')

@push('css')
    <style>
        body {
            background-color: #f4f6fc;
        }

        .form-card {
            border-radius: 1rem;
            box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
        }

        .form-control::placeholder {
            font-size: 0.9rem;
        }

        .icon-end {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #ccc;
        }

        .form-group {
            position: relative;
        }

        .image-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 2rem;
        }

        .image-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .form-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 2rem;
        }

        @media (max-width: 992px) {

            .image-container,
            .form-container {
                height: auto;
                padding: 2rem 1rem;
            }

            .image-container {
                padding-top: 4rem;
                height: 50vh;
            }

            .form-container {
                height: auto;
                padding-bottom: 4rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Colonne image - moitié de l'écran -->
            <div class="col-lg-6 image-container">
                <img src="{{ asset('assets/img/about copy.jpg') }}" alt="Reset Illustration" class="img-fluid">
            </div>

            <!-- Colonne formulaire - moitié de l'écran -->
            <div class="col-lg-6 form-container">
                <div class="bg-white p-4 form-card" style="width: 100%; max-width: 500px;">
                    <h4 class="text-center text-primary fw-bold">Reset Password</h4>
                    <p class="text-center text-muted small">Enter your new password, confirm and submit</p>

                    {{-- Message de feedback --}}
                    @if (session()->has('toast'))
                        <div class="mb-4 text-{{ session('toast.type') === 'error' ? 'red' : 'green' }}-600">
                            {{ session('toast.message') }}
                        </div>
                    @endif

                    {{-- Affichage des erreurs de validation --}}
                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Formulaire --}}
                    <form method="POST" action="{{ route('resetpassword.submit') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium">New Password</label>
                            <input type="password" name="password" class="w-full mt-1 border rounded px-3 py-2 form-control"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium">Confirm Password</label>
                            <input type="password" name="password_confirmation"
                                class="w-full mt-1 border rounded px-3 py-2 form-control" required>
                        </div>

                        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                            Reset Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
