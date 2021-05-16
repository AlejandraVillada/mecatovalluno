function usuario() {
    $("#login-form").on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serialize();
        //console.log(datos)
        $.ajax({
            type: "post",
            url: "Controlador/controlador_usuario.php",
            // url: "../../../Controlador/controlador_usuario.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            if (resultado.respuesta == "existe") {
                if (resultado.tipoUsuario != 5) {
                    location.href = "adminper.php";
                } else if (resultado.tipoUsuario == 5) {
                    location.href = "Vista/home/index.php";
                }
            } else {
                swal({
                        position: 'center',
                        type: 'error',
                        title: 'Usuario y/o Password incorrecto o usuario INACTIVO',
                        showConfirmButton: false,
                        timer: 1500
                    }),
                    function() {
                        $("#usuario").focus().select();
                    };
            }
        });
    })
}