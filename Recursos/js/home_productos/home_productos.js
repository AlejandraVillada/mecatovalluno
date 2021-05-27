function productos() {
    $("#actualizacion").hide();
    $("#apareceUsu").show();

    $.ajax({
        type: "get",
        url: "../../Controlador/controlador_ventas.php",
        data: { accion: 'listarProdHome' },
        dataType: "json"
    }).done(function(resultado) {
        $.each(resultado.data, function(index, value) {
            $("#menu .menu-container").append("<div class='col-lg-6 menu-item'><img src = 'data:image/png; base64," + value.Foto + "' class = 'menu-img'><div class = 'menu-content'><a href = '#'> " + value.NombreProducto + " </a><span>" + value.ValorUnitario + "</span> </div><div class='menu-ingredients'><p style='float:left;'>Cantidad disponible:</p><p style = 'float:left;' class = 'ml-2 mr-4 prod'> " + value.disponible + " </p><button data-codigo='" + value.IdProducto + "' class = 'btn btn-danger btn-sm mr-2' style = 'float: right;'><i class = 'fas fa-cart-plus'></i></button><input class = 'spinner mr-2' type= 'number' min = '0' max = '" + value.disponible + "'style='float:right; width:50px;'></div> </div>")
        });
    });


    $(function() {
        console.log($("input[class=spinner]"));
        $("input[class=spinner]").spinner();
    });

    $("#act").click(function() {
        $("#actualizacion").show();
        $("#pagina").hide();
        $(".usuario").hide();
        $("#apareceUsu").show();

        var codigo = $("#Cedula").val();
        $.ajax({
            type: "get",
            url: "../../Controlador/controlador_clientes.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(cliente) {
            console.log(cliente);
            if (cliente.respuesta === "No Existe El Cliente") {
                swal({
                    type: 'error',
                    title: '¡Error!',
                    text: '¡El Cliente No Existe!'
                })

            } else {

                $("#actualizacion #IdCliente").val(cliente.codigo);
                $("#actualizacion #NombreCliente").val(cliente.nombre);
                $("#actualizacion #Email").val(cliente.email);
                $("#actualizacion #Direccion").val(cliente.direccion);
                $("#actualizacion #Telefono").val(cliente.telefono);
                $("#actualizacion #IdEstado").val(cliente.estado);
                $("#actualizacion #IdCiudad").val(cliente.ciudad);

            }
        });
        // var codigo2 = $("#IdEmpleado").val();
        // console.log(codigo2);
        $.ajax({
            type: "get",
            url: "../../Controlador/controlador_usuario.php",
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
                $("#actualizacion #IdUsuario").val(usuario.codigo);
                $("#actualizacion #Usuario").val(usuario.usuario);
                $("#actualizacion #IdTipoUsuario").val(usuario.tipoUsuario);
                $("#actualizacion #Contrasena").val(usuario.contrasena);
            }
        });

        $(".cuerpo").on("click", "button#apareceUsu", function() {
            $(".usuario").show();
            $("#apareceUsu").hide();
            $("#Contrasena").val('');

        });

        $("#actualizacion .cuerpo").on("click", "button#actualizar", function() {
            var datos = $("#actualizacion #formModificarCliente").serialize();
            console.log(datos);
            $.ajax({
                type: "get",
                url: "../../Controlador/controlador_clientes.php",
                data: datos,
                dataType: "json"
            }).done(function(resultado) {
                console.log(resultado.respuesta);
                // if (resultado.respuesta) {
                var datos2 = $("#actualizacion #formModificarUsuario").serialize();
                console.log(datos2);
                var contrasena = $("#Contrasena").val();
                var hash;
                $.ajax({
                    type: "get",
                    url: "../../Funciones/generarPassword.php",
                    data: { pass: contrasena },
                    dataType: "json"
                }).done(function(resultado) {

                    hash = resultado;
                    var data = datos2 + '&Contrasena=' + hash;
                    $.ajax({
                        type: "get",
                        url: "../../Controlador/controlador_usuario.php",
                        data: data,
                        dataType: "json"
                    }).done(function(resultado) {
                        console.log(resultado.respuesta);
                        if (resultado.respuesta) {
                            swal({
                                position: 'center',
                                type: 'success',
                                title: 'Se actualizaron los datos correctamente',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $("#pagina").show();
                            $("#actualizacion").hide();
                        } else {
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            })

                        }
                    });
                });
                // }

            });
        })
    });

    $("#cerrar").click(function() {
        $("#pagina").show();
        $("#actualizacion").hide();
    });
}