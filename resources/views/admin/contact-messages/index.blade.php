@extends('back.layouts.app')

@section('content')
    @livewire('message')
@endsection


@push('adminjs')
    <script>
        // Écouteur pour la confirmation de suppression
        window.addEventListener('confirm-delete', event => {
        const {
            title,
            text,
            id
        } = event.detail;

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
                Livewire.dispatch('destroy', {
                    id: event.detail.id
                });
            }
        });
        });

        // Écouteur pour les notifications toast
        window.addEventListener('show-toast', event => {
            const {
                type,
                message
            } = event.detail;

            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-right',
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
