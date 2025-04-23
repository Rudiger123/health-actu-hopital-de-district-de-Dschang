@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main-1.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/js/main-1.js') }}"></script>
    <script src="{{ asset('assets/js/blog.js') }}"></script>
@endpush
@section('content')
    <livewire:blog.search-results :query="request('query')" />
@endsection
