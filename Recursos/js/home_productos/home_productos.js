function productos() {
    $("#actualizacion").hide();
    $("#apareceUsu").show();

    $.ajax({
        type: "get",
        url: "../../Controlador/controlador_ventas.php",
        data: { accion: 'listarProdHome' },
        dataType: "json"
    }).done(function (resultado) {
        $.each(resultado.data, function (index, value) {
            $("#menu .menu-container").append("<div class='col-lg-6 menu-item'><img src = 'data:image/png; base64," + value.Foto + "' class = 'menu-img'><div class = 'menu-content'><a href = '#'> " + value.NombreProducto + " </a><span>" + value.ValorUnitario + "</span> </div><div class='menu-ingredients'><p style='float:left;'>Cantidad disponible:</p><p style = 'float:left;' class = 'ml-2 mr-4 prod'> " + value.disponible + " </p><button data-codigo='" + value.IdProducto + "'data-target='#carrito' class='btn btn-danger btn-sm mr-2 comprar' data-toggle='modal' style = 'float: right;'><i class = 'fas fa-cart-plus'></i></button><input class = 'spinner mr-2' type= 'number' min = '0' id='" + value.IdProducto + "' max = '" + value.disponible + "'style='float:right; width:50px;' value='0'></div></div>")
        });
    });


    $(function () {
        console.log($("input[class=spinner]"));
        $("input[class=spinner]").spinner();
    });

    $("#act").click(function () {
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
        }).done(function (cliente) {
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
        }).done(function (usuario) {
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

        $(".cuerpo").on("click", "button#apareceUsu", function () {
            $(".usuario").show();
            $("#apareceUsu").hide();
            $("#Contrasena").val('');

        });

        $("#actualizacion .cuerpo").on("click", "button#actualizar", function () {
            var datos = $("#actualizacion #formModificarCliente").serialize();
            console.log(datos);
            $.ajax({
                type: "get",
                url: "../../Controlador/controlador_clientes.php",
                data: datos,
                dataType: "json"
            }).done(function (resultado) {
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
                }).done(function (resultado) {

                    hash = resultado;
                    var data = datos2 + '&Contrasena=' + hash;
                    $.ajax({
                        type: "get",
                        url: "../../Controlador/controlador_usuario.php",
                        data: data,
                        dataType: "json"
                    }).done(function (resultado) {
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

    $("#cerrar").click(function () {
        $("#pagina").show();
        $("#actualizacion").hide();
    });

    var cantidad, total, subtotal;
    var contador = 0;
    var productos = new Array();
    $("#menu .menu-container").on("click", "button.comprar", function () {
        var codigo = $(this).data("codigo");

        if ($("#menu .menu-container .spinner #" + codigo + "").val() != 0) {
            $("#carrito").show();
            cantidad = $("#menu .menu-container .spinner#" + codigo + "").val();
            $.ajax({
                type: "get",
                url: "../../Controlador/controlador_inventarioprodterminado.php",
                data: { id: codigo, accion: 'consultarprod' },
                dataType: "json"
            }).done(function (resultado) {

                $("#cuerpoCarrito").append("<div data-codigo='" + resultado.data[0].IdProducto + "' class='row contenedorPord' id='" + contador + "'><div class='col-4'><p>" + resultado.data[0].NombreProducto + "</p></div><div class='col-4'><p data-cantidad='" + cantidad + "'>" + resultado.data[0].ValorUnitario + "</p></div><div class=' col-3 '><p>" + cantidad + "</p></div><button data-codigo='" + resultado.data[0].IdProducto + " 'class=' btn btn-danger btn-sm mr-2 remover' id='" + contador + "'style = 'float:right;'>-</button></div>");
                var total1 = resultado.data[0].ValorUnitario * cantidad;
                productos.push({ 'Posicion': contador, 'IdProducto': resultado.data[0].IdProducto, 'NombreProducto': resultado.data[0].NombreProducto, "CantidadVendida": cantidad, "ValorUnitario": resultado.data[0].ValorUnitario, "Total": total1 });

                var anterior = parseFloat(document.getElementById("Subtotal").innerText);
                // console.log(anterior);
                var subtotal = cantidad * resultado.data[0].ValorUnitario;
                total = anterior + subtotal;
                var total2 = total + (total * 0.19);
                document.getElementById("total").innerText = total2;
                document.getElementById("Subtotal").innerText = total;
                // console.log(subtotal + " " + total);
                contador++;
                console.log(productos);
            });
        } else if ($("#menu .menu-container .spinner").val() == 0) {
            alert("llene cuanta cantidad del producto necesita");
            $("#carrito").hide();
        }


    });

    $("#cuerpoCarrito").on("click", "button.remover", function () {

        var boton = $(this).data("codigo");
        var div = $("#cuerpoCarrito .contenedorPord").data("codigo");

        var elemento = document.querySelector('#cuerpoCarrito .contenedorPord');
        var id = $(this).attr('id');
        console.log("IS" + id);
        // console.log(productos);
        var remove = productos.splice(id, 1);
        console.log(remove);

        // var totalcop = parseFloat(totalventa) - parseFloat(remove[0].Total* 0.19)
        // if (productos.length == 0) {
        //     document.getElementById("total").innerText = 0;
        //     document.getElementById("Subtotal").innerText = 0;
        //     total = 0;
        //     contador = 0;
        //     console.log(document.getElementById(id));
        //     $('#cuerpoCarrito  #' + id).remove();
        //     $("#carrito").hide();

        // }
        // else {
        // console.log(remove)
        total = total - remove[0].Total;

        var totalcop = parseFloat(total) + parseFloat(total * 0.19)
        document.getElementById("total").innerText = totalcop;
        document.getElementById("Subtotal").innerText = total;

        console.log(productos);
        console.log(document.getElementById(id));
        $('#cuerpoCarrito  #' + id).remove();


        // }
    });

    $("#facturar").on('click', function (e) {

        console.log(productos);
        var totalcop = parseFloat(total) + parseFloat(total * 0.19)
        $.ajax({
            type: "post",
            // url: "../../../Controlador/controlador_ventas.php",
            url: "../../Controlador/controlador_ventas.php",
            data: { accion: "GenerarFacturacliente", "subtotal": total, "total":totalcop,"Productos": productos },
            dataType: "json"
        }).done(function (resultado) {
            total = 0;
            productos = null;
            console.log(resultado);
            if(resultado.data==1){
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'Su Compra fue generada, espere su pedido cómodamente en su hogar',
                    showConfirmButton: false,
                    timer: 2500
                })
            }else{
                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Su Compra no pudo ser generada, Debe iniciar sesion primero ',
                    showConfirmButton: false,
                    timer: 2500
                })
            }
        });
    })


}