<!-- resources/views/errors/404.blade.php -->
@extends('layouts.app')

@push('css')
    <style>
        .misc-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-block-size: calc(100vh - 1.5rem * 2);
            text-align: center;
        }
    </style>
@endpush

@section('content')
    <main class="main">
        <!-- Error -->
        <div class="container-xxl container-p-y my-12">
            <div class="misc-wrapper">
                <h1 class="mb-2 mx-2" style="line-height: 6rem; font-size: 6rem">404</h1>
                <h4 class="mb-2 mx-2">Page Not Found️ ⚠️</h4>
                <p class="mb-6 mx-2">we couldn't find the page you are looking for</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Back to home</a>
                <div class="mt-6">
                    <img src="../assets/images/page-misc-error-light.png" alt="page-misc-error-light" width="500"
                        class="img-fluid" />
                </div>
            </div>
        </div>
        <!-- /Error -->
    </main>
@endsection
