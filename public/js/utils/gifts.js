function reservar(usuario, regalo) {
    $.ajax({
        url: `${window.location.origin}/regalos/reservar`,
        method: "POST",
        dataType: "json",
        data: {
            usuario,regalo
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: (response) => {
            console.log(response);
        },
    });
}
