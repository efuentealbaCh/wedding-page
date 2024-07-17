$(document).ready(function() {
    $('#register-form').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: `${window.location.origin}/auth/registrar`,
            type: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Incluye el token CSRF para Laravel
            },
            success: function(response) {
                if (response.success) {
                    swal({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: response.message,
                    });
                } else {
                    swal({
                        icon: 'warning',
                        title: 'Atención',
                        text: response.message,
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'Ocurrió un error inesperado.',
                });
            }
        });
    });
});
