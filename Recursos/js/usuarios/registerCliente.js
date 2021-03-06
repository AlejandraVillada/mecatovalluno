function registrar() {

    $.ajax({
        type: "get",
        url: "../../../Controlador/controlador_ubicaciones.php",
        data: { accion: 'listar_ciudad' },
        dataType: "json"
    }).done(function(resultado) {
        console.log(resultado);
        $.each(resultado.data, function(index, value) {
            $("#formCrearCliente #IdCiudad").append("<option value='" + value.IdCiudad + "'>" + value.NombreCiudad + "</option>")
        });
    });



    $("#editado").on("click", "button#grabar", function() {
        // Cliente
        var datos = $("#formCrearCliente").serialize();
        var data = datos + "&IdEstado=" + 1;
        $("#IdUsuario").val($("#IdCliente").val());
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_clientes.php",
            data: data,
            dataType: "json"
        }).done(function(resultado) {
            if (resultado.respuesta) {
                var datos1 = $("#formCrearUsuario").serialize();
                var contrasena = $("#Contrasena").val();
                var hash;

                $.ajax({
                    type: "get",
                    url: "../../../Funciones/generarPassword.php",
                    data: { pass: contrasena },
                    dataType: "json"
                }).done(function(resultado) {
                    hash = resultado;
                    data1 = datos1 + '&Contrasena=' + hash + '&IdTipoUsuario=' + 5;
                    $.ajax({
                        type: "get",
                        url: "../../../Controlador/controlador_usuario.php",
                        data: data1,
                        dataType: "json"
                    }).done(function(resultado) {
                        if (resultado.respuesta) {
                            swal({
                                position: 'center',
                                type: 'success',
                                title: 'Registrado correctamente, ahora puede loggearse',
                                showConfirmButton: false,
                                timer: 1000
                            })
                            location.href = "../../../Vista/home/index.php";

                        } else {
                            swal({
                                position: 'center',
                                type: 'error',
                                title: 'Ocurrió un error al grabar',
                                showConfirmButton: false,
                                timer: 1500
                            });

                        }
                    });

                });

            }
        });
    });



}