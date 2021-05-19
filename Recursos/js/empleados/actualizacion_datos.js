function actDatos() {

    $(".usuario").hide();

    var codigo = $("#Cedula").val();
    $.ajax({
        type: "get",
        url: "Controlador/controlador_empleados.php",
        // url: "../../../Controlador/controlador_empleados.php",
        data: { codigo: codigo, accion: 'consultar' },
        dataType: "json"
    }).done(function(empleado) {
        if (empleado.respuesta === "No Existe El Empleado") {
            swal({
                type: 'error',
                title: '¡Error!',
                text: '¡El Empleado No Existe!'
            })
        } else {
            $(".cuerpo").show();
            $("#ingreso").hide();
            $("#IdEmpleado").val(empleado.codigo);
            $("#NombreEmpleado").val(empleado.nombre);
            $("#Email").val(empleado.email);
            $("#SueldoBase").val(empleado.sueldo);
            $("#Telefono").val(empleado.telefono);
            $("#Cargo").val(empleado.cargo);
            $("#IdSede").val(empleado.sede);
            $("#IdEstado").val(empleado.estado);
        }

        $.ajax({
            type: "get",
            url: "Controlador/controlador_usuario.php",
            // url: "../../../Controlador/controlador_usuario.php",
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
        var datos = $("#formModificarEmpleado").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "Controlador/controlador_empleados.php",
            // url: "../../../Controlador/controlador_empleados.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            if (resultado.respuesta) {
                var datos2 = $("#formModificarUsuario").serialize();
                var contrasena = $("#Contrasena").val();
                var hash;
                $.ajax({
                    type: "get",
                    url: "Funciones/generarPassword.php",
                    // url: "../../../Funciones/generarPassword.php",
                    data: { pass: contrasena },
                    dataType: "json"
                }).done(function(resultado) {
                    hash = resultado;
                    var data = datos2 + '&Contrasena=' + hash;
                    $.ajax({
                        type: "get",
                        url: "Controlador/controlador_usuario.php",
                        // url: "../../../Controlador/controlador_usuario.php",
                        data: data,
                        dataType: "json"
                    }).done(function(resultado) {
                        if (resultado.respuesta) {
                            location.href = 'adminper.php';
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