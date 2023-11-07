import './bootstrap';
import Swal from 'sweetalert2/dist/sweetalert2.js'

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('delete-item').addEventListener('click', function (e) {
        e.preventDefault(); // Evita que el enlace se siga automáticamente

        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción no se puede deshacer',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-item-form').submit();
            }
        });
    });
});



