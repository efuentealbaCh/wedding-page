function register(){
    $.ajax({
        url:`${window.location.origin}/auth/registrar`,
        method:'POST',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            nombre:$('#nombre'),
            apellido:$('#apellido'),
            username:$('#user-name'),
            contrasena:$('#contrasena'),
        },
        success:(response)=>{
            console.log(response)
        },
        error: function(error){
            console.log(error);
        }
    });
}
