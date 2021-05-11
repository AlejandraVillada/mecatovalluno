function actDatosClientes() {

    $(".cuerpo").hide();
    $(".usuario").hide();

    $("#ingreso").on("click", "button#enviar", function() {
        var codigo = $("#Cedula").val();
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_clientes.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(cliente) {
            if (cliente.respuesta === "No Existe El Cliente") {
                swal({
                    type: 'error',
                    title: '¡Error!',
                    text: '¡El Cliente No Existe!'
                })
            } else {
                $(".cuerpo").show();
                $("#ingreso").hide();
                $("#IdCliente").val(cliente.codigo);
                $("#NombreCliente").val(cliente.nombre);
                $("#Email").val(cliente.email);
                $("#Direccion").val(cliente.direccion);
                $("#Telefono").val(cliente.telefono);
                $("#IdEstado").val(cliente.estado);
                $("#IdCiudad").val(cliente.ciudad);

            }
        });
        // var codigo2 = $("#IdEmpleado").val();
        // console.log(codigo2);
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_usuario.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(usuario) {
            console.log(usuario);
            if (usuario.respuesta === "no existe") {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Usuario no existe!'
                })
            } else {
                $("#IdUsuario").val(usuario.codigo);
                $("#Usuario").val(usuario.usuario);
                $("#IdTipoUsuario").val(usuario.tipoUsuario);
                $("#Contrasena").val(usuario.contrasena);
            }
        });
    });

    $(".cuerpo").on("click", "button#apareceUsu", function() {
        $(".usuario").show();
        $("#apareceUsu").hide();
        $("#Contrasena").val('');
    });

    $(".cuerpo").on("click", "button#actualizar", function() {
        var datos = $("#formModificarCliente").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_clientes.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            if (resultado.respuesta) {
                var datos2 = $("#formModificarUsuario").serialize();
                var contrasena = $("#Contrasena").val();
                var hash;
                $.ajax({
                    type: "get",
                    url: "../../../Funciones/generarPassword.php",
                    data: { pass: contrasena },
                    dataType: "json"
                }).done(function(resultado) {
                    hash = resultado;
                    var data = datos2 + '&Contrasena=' + hash;
                    $.ajax({
                        type: "get",
                        url: "../../../Controlador/controlador_usuario.php",
                        data: data,
                        dataType: "json"
                    }).done(function(resultado) {
                        if (resultado.respuesta) {
                            swal({
                                position: 'center',
                                type: 'success',
                                title: 'Se actualizaron los datos correctamente',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            })
                        }
                    });
                });
            }

        });
    })

}