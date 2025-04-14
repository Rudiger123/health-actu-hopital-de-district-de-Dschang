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

        window.addEventListener('showCategoryModalForm', function() {
            $('#category_modal').modal('show');
        });

        window.addEventListener('hideCategoryModalForm', function() {
            $('#category_modal').modal('hide');
        });

       // Écouteur pour la confirmation de suppression
window.addEventListener('confirm-delete', event => {
    const { title, text, id } = event.detail;
    
    Swal.fire({
        title: title || 'Confirmer la suppression',
        text: text || "Cette action est irréversible !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimer !',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch('deleteParentCategory', { id: id });
        }
    });
});

// Écouteur pour les notifications toast
window.addEventListener('show-toast', event => {
    const { type, message } = event.detail;
    
    const Toast = Swal.mixin({
        toast: true,
        position: 'center',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    
    Toast.fire({
        icon: type || 'info',
        title: message || 'Opération effectuée'
    });
});
    </script>
@endpush
