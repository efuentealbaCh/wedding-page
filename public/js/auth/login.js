$(document).ready(function() {
    $('#login-form').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: `${window.location.origin}/auth/login`,
            type: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector("[name~=csrf-token][content]").content
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = response.redirect_url;
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
