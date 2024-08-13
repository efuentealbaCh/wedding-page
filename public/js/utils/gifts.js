function reservar(usuario, regalo, estado) {
    $.ajax({
        url: `${window.location.origin}/regalos/reservar`,
        method: "POST",
        dataType: "json",
        data: {
            usuario,
            regalo,
            estado,
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
            } else if (response.status == 2) {
                Swal.fire({
                    title: "Confirma tu asistencia",
                    icon: "warning",
                    text: response.msg,
                    showConfirmButton: true,
                    confirmButtonText: "Si porfavor",
                    confirmButtonColor: "#0f9c04",
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    cancelButtonText: "No aún",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#confirmModal").modal("show");
                    }
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
function marcarAsistencia(usuario) {
    $.ajax({
        url: `${window.location.origin}/asistencia/confirmar`,
        method: "POST",
        dataType: "json",
        data: {
            usua_codigo: usuario,
            usua_asistencia: $("#asistencia").val(),
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (response) => {
            if (response.status == 1) {
                Swal.fire({
                    title: "Completado",
                    icon: "success",
                    text: response.msg,
                }).then(() => {
                    window.location.reload();
                });
            } else if (response.status == 0) {
                Swal.fire({
                    title: "Error",
                    icon: "error",
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

