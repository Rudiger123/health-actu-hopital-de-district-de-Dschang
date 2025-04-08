import './bootstrap';

import Swal from 'sweetalert2';
window.Swal = Swal;

import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()


// Swal.fire({
//     icon: 'success',
//     title: 'Succès',
//     text: 'Opération terminée avec succès !',
//     showConfirmButton: true,
//     confirmButtonText: 'OK',
//     timer: 5000
// });

document.addEventListener('livewire:initialized', () => {
    Livewire.on('toast', (data) => {
        console.log("Événement reçu :", data); // Vérification dans la console
        Swal.fire({
            icon: data.type,
            title: data.message,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

    });
});

