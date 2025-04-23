import './bootstrap'; 

import Swal from 'sweetalert2';
window.Swal = Swal;

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

