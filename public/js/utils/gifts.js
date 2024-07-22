function reservar(usuario, regalo) {
    $.ajax({
        url: `${window.location.origin}/regalos/reservar`,
        method: "POST",
        dataType: "json",
        data: {
            usuario,
            regalo,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (response) => {
            if (response.status == 1) {
                Swal.fire({
                    customClass: {
                        confirmButton: "btn btn-success",
                    },
                    title: "Atención",
                    icon: "warning",
                    text: response.msg,
                    showConfirmButton: true,
                    confirmButtonText: "Okey, Gracias.",
                }).then(() => {
                    window.location.reload();
                });
            } else if (response.status == 0) {
                Swal.fire({
                    title: "Completado",
                    icon: "success",
                    text: response.msg,
                    showConfirmButton: false,
                    timer: 2500,
                }).then(() => {
                    window.location.reload();
                });
            }
        },
    });
}
