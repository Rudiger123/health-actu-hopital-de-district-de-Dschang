@extends('back.layouts.app')

@section('content')
    @livewire('back.admin.category')
@endsection

@push('adminjs')
    <script>
        window.addEventListener('showParentCategoryModalForm', function() {
            $('#pcategory_modal').modal('show');
        });

        window.addEventListener('hideParentCategoryModalForm', function() {
            $('#pcategory_modal').modal('hide');
        });
    </script>
@endpush
