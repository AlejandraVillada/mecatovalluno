function productoterminado() {


    $("#editar").addClass('hide');
    $("#editar").removeClass('show');
    $(".listado").addClass('show');
    $(".listado").removeClass('hide');
    $(".detalle").addClass('hide');
    $(".detalle").removeClass('show');
    var dt1;
    var dt;
    var sec;
    var d = "si";
    dt = $("#tabla").DataTable({

        "ajax": "Controlador/controlador_inventarioprodterminado.php?accion=listar",

        "columns": [{
                "data": "IdProducto",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-dark btn-sm ver"> <i class="fa fa-plus"></i></a>'
                }
            },
            { "data": "IdProducto" },
            { "data": "NombreProducto" },
            { "data": "CantidadProducto" },
            { "data": "ValorUnitario" },
            { "data": "Foto" },
            {
                "data": "IdProducto",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
            }
        ]
    });

    $("#nuevo").on("click", function() {
        $(this).hide();
        $(".card-title").html("Agregar Producto Terminado");
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $(".listado").addClass('hide');
        $(".listado").removeClass('show');
        $(".detalle").addClass('hide');
        $(".detalle").removeClass('show');
        $("#editar").load('Vista/php/ProductoTerminado/FormCrearPT.php', function() {
            // $("#editar").load('Vista/php/ProductoTerminado/FormCrearPT.php', function () {
            $("#editar #formCrearPT").on("submit", function(e) {

                e.preventDefault();
                var datos = $(this).serialize();
                //  var datos = document.getElementById("formCrearPT");
                var datos1 = new FormData();
                var file = document.getElementById('Foto').files[0];
                // console.log(file);
                datos1.append("NombreProducto", $("#NombreProducto").val());
                datos1.append("CantidadProducto", $("#CantidadProducto").val());
                datos1.append("ValorUnitario", $("#ValorUnitario").val());
                datos1.append("accion", $("#accion").val());
                datos1.append("Foto", $("#Foto")[0].files[0]);

                $.ajax({
                    type: "post",

                    // url: "../../../Controlador/controlador_inventarioprodterminado.php",
                    url: "Controlador/controlador_inventarioprodterminado.php",
                    data: datos1,
                    processData: false,
                    cache: false,
                    contentType: false
                }).done(function(resultado) {
                    console.log(resultado);
                    if (resultado.data == 1) {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Se actualizó el inventario',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#editar").addClass('hide');
                        $("#editar").removeClass('show');
                        $(".listado").addClass('show');
                        $(".listado").removeClass('hide');
                        $(".detalle").addClass('hide');
                        $(".detalle").removeClass('show');
                        $(this).show();
                    }
                    dt.ajax.reload();

                });
            });
        });
    });


    $(".table").on("click", "a.ver", function() {
        $("#editar").addClass('hide');
        $("#editar").removeClass('show');

        $(".detalle").removeClass('hide');
        $(".detalle").addClass('show');
        if (d == "no") {
            dt1.destroy();
        }
        codigo = $(this).data("codigo");
        var boton = document.getElementById("nuevodetalle");
        boton.dataset.idproducto = codigo;
        $.ajax({
            type: "post",
            url: "Controlador/controlador_detalleproducto.php",
            //url: "../../../Controlador/controlador_detalleproducto.php",
            data: { accion: 'buscar', IdProducto: codigo },
            dataType: "json"
        }).done(function(resultado) {
            var ingre = resultado.data[0].NombreProducto;
            $(".card-title").html("Ingredientes para la porción de " + ingre);

        });

        dt1 = $("#tabla1").DataTable({
            //"ajax": "../../../Controlador/controlador_inventarioprodterminado.php?accion=consultar&&id=" + codigo + "",

            "ajax": "Controlador/controlador_inventarioprodterminado.php?accion=consultar&&id=" + codigo + "",


            "columns": [

                { "data": "IdDetalleProducto" },
                { "data": "NombreMateriaPrima" },
                { "data": "Cantidad" },
                { "data": "NombreMedida" },
                { "data": "DescripcionProducto" },
                {
                    "data": "IdDetalleProducto",
                    render: function(data) {
                        return '<a href="#" data-producto="' + codigo + '" data-codigo="' + data +
                            '" class="btn btn-info btn-sm modificar"> <i class="fa fa-edit"></i></a>'
                    }
                }
            ]
        });
        d = "no";
    });
    $("#nuevodetalle").on("click", function(e) {
        e.preventDefault();
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $(".listado").removeClass('show');
        $(".listado").addClass('hide');
        $(".detalle").removeClass('show');
        $(".detalle").addClass('hide');
        var secuencia = 0;
        var secuencia1 = 1;
        var secuencia2 = 0;
        var idproducto = $(this).data("idproducto");
        $("#editar").load('Vista/php/ProductoTerminado/view_CrearDetalle.php', function() {
            //$("#editar").load('../../../Vista/php/ProductoTerminado/view_CrearDetalle.php', function() {
            console.log(idproducto);
            $.ajax({
                type: "post",
                //url: "../../../Controlador/controlador_detalleproducto.php",
                url: "Controlador/controlador_detalleproducto.php",
                data: { accion: 'secuencia', IdProducto: idproducto },
                dataType: "json"
            }).done(function(resultado) {
                if (!resultado.data == "") {
                    secuencia = parseFloat(resultado.data);
                    secuencia2 = secuencia + secuencia1;
                    // console.log(secuencia2);
                } else {
                    secuencia2 = 1;
                    // console.log(secuencia2);

                }
                $("#IdProducto").val(idproducto);
                $("#IdDetalleProducto").val(secuencia2);
                $("#IdDetalleProducto1").val(secuencia2);


            });
            // productos
            $.ajax({
                type: "get",
                // url: "../../../Controlador/controlador_mp.php",
                url: "Controlador/controlador_mp.php",
                data: { accion: 'listar' },
                dataType: "json"
            }).done(function(resultado) {
                $("#editar #MP").append("<option>Seleccione el producto</option>");
                $.each(resultado.data, function(index, value) {

                    $("#editar #MP").append("<option value='" + value.IdMateriaPrima + "'>" + value.NombreMateriaPrima + "</option>")

                });

            });
            $.ajax({
                type: "post",
                //  url: "../../../Controlador/controlador_detalleproducto.php",
                url: "Controlador/controlador_detalleproducto.php",
                data: { accion: 'listarmedida' },
                dataType: "json"
            }).done(function(resultado) {
                $("#editar #Medidas").append("<option>Seleccione la Medida</option>");
                $.each(resultado.data, function(index, value) {
                    $("#editar #Medidas").append("<option value='" + value.IdMedida + "'>" + value.NombreMedida + "</option>")
                });
            });

            $("#editar #formcreardetPT").on("submit", function(e) {
                console.log("hvg");
                e.preventDefault();
                var datos = $(this).serialize();
                $.ajax({
                    type: "post",
                    //url: "../../../Controlador/controlador_detalleproducto.php",
                    url: "Controlador/controlador_detalleproducto.php",
                    data: datos,
                    dataType: "json"
                }).done(function(resultado) {
                    if (resultado.data == 1) {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Se Guardó el detalle de producto',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#editar").addClass('hide');
                        $("#editar").removeClass('show');
                        $(".listado").addClass('show');
                        $(".listado").removeClass('hide');
                        $(".detalle").addClass('show');
                        $(".detalle").removeClass('hide');
                    } else {
                        swal({
                            position: 'center',
                            type: 'error',
                            title: 'No se guardó el detalle de producto',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#editar").addClass('hide');
                        $("#editar").removeClass('show');
                        $(".listado").addClass('show');
                        $(".listado").removeClass('hide');
                        $(".detalle").addClass('show');
                        $(".detalle").removeClass('hide');
                    }
                    dt1.ajax.reload();
                });
            });



        });

    });


    $(".table").on("click", " a.modificar", function(e) {
        e.preventDefault();
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $(".listado").removeClass('show');
        $(".listado").addClass('hide');
        $(".detalle").removeClass('show');
        $(".detalle").addClass('hide');
        var codigo = $(this).data("codigo");
        var IdProducto = $(this).data("producto");
        var IdMedida;
        // console.log("bjgnknj"+codigo);
        // console.log("bjgnknj"+IdProducto);
        $("#editar").load('Vista/php/ProductoTerminado/view_ModificardetallePT.php', function() {
            //$("#editar").load('../../../Vista/php/ProductoTerminado/view_ModificardetallePT.php', function() {
            $.ajax({
                type: "post",
                // url: "../../../Controlador/controlador_detalleproducto.php",
                url: "Controlador/controlador_detalleproducto.php",
                data: { iddetalle: codigo, IdProducto: IdProducto, accion: 'consultar' },
                dataType: "json"
            }).done(function(resultado) {
                //    console.log(resultado.data.seq);//secuencia
                $("#IdProducto").val(resultado.data.IdProducto);
                $("#IdDetalleProducto").val(resultado.data.IdDetalleProducto);
                $("#IdDetalleProducto1").val(resultado.data.IdDetalleProducto);
                IdMedida = resultado.data.IdMedida;
                $("#NombreMateriaPrima").val(resultado.data.NombreMateriaPrima);
                $("#IdMateriaPrima").val(resultado.data.IdMateriaPrima);
                $("#Cantidad").val(resultado.data.Cantidad);
                $("#DescripcionProducto").val(resultado.data.DescripcionProducto);
                $.ajax({
                    type: "post",
                    //  url: "../../../Controlador/controlador_detalleproducto.php",
                    url: "Controlador/controlador_detalleproducto.php",
                    data: { accion: 'listarmedida' },
                    dataType: "json"
                }).done(function(resultado) {
                    $("#editar #Medidas").append("<option>Seleccione la Medida</option>");
                    $.each(resultado.data, function(index, value) {
                        if (value.IdMedida == IdMedida) {
                            $("#editar #Medidas").append("<option selected value='" + value.IdMedida + "'>" + value.NombreMedida + "</option>")
                        } else {
                            $("#editar #Medidas").append("<option value='" + value.IdMedida + "'>" + value.NombreMedida + "</option>")

                        }
                    });

                });


            });
            $("#editar #formModdetPT").on("submit", function(e) {
                console.log("hvg");
                e.preventDefault();
                var datos = $(this).serialize();

                $.ajax({
                    type: "post",
                    //url: "../../../Controlador/controlador_detalleproducto.php",
                    url: "Controlador/controlador_detalleproducto.php",
                    data: datos,
                    dataType: "json"
                }).done(function(resultado) {
                    if (resultado.data == 1) {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Se actualizó el producto',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#editar").addClass('hide');
                        $("#editar").removeClass('show');
                        $(".listado").addClass('show');
                        $(".listado").removeClass('hide');
                        $(".detalle").addClass('show');
                        $(".detalle").removeClass('hide');
                    } else {
                        swal({
                            position: 'center',
                            type: 'error',
                            title: 'No se actualizó el producto',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#editar").addClass('hide');
                        $("#editar").removeClass('show');
                        $(".listado").addClass('show');
                        $(".listado").removeClass('hide');
                        $(".detalle").addClass('show');
                        $(".detalle").removeClass('hide');
                    }
                    dt1.ajax.reload();
                });
            });
        });

    });

    $(".table").on("click", "a.editar", function(e) {
        e.preventDefault();

        var codigo = $(this).data("codigo");
        // console.log(codigo + "hola");
        $(".card-title").html("Modificar Compra de Materia Prima");
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $(".listado").addClass('hide');
        $(".listado").removeClass('show');
        $(".detalle").addClass('hide');
        $(".detalle").removeClass('show');
        $("#editar").load('Vista/php/ProductoTerminado/FormModificarPT.php', function() {
            // $("#editar").load('../../../Vista/php/ProductoTerminado/FormModificarPT.php', function() {
            $.ajax({
                type: "post",
                // url: "../../../Controlador/controlador_inventarioprodterminado.php",
                url: "Controlador/controlador_inventarioprodterminado.php",
                data: { id: codigo, accion: 'consultarprod' },
                dataType: "json"
            }).done(function(resultado) {
                console.log(resultado.data[0]);
                $("#IdProducto").val(resultado.data[0].IdProducto);
                $("#IdProducto1").val(resultado.data[0].IdProducto);
                $("#CantidadProducto").val(resultado.data[0].CantidadProducto);
                $("#NombreProducto").val(resultado.data[0].NombreProducto);
                $("#ValorUnitario").val(resultado.data[0].ValorUnitario);

            });
            $("#editar #formModPT").on("submit", function(e) {
                e.preventDefault();
                console.log("hooo");
                var datos = $(this).serialize();
                var datos1 = new FormData();
                var file = document.getElementById('Foto').files[0];
                // console.log(file);
                datos1.append("IdProducto", $("#IdProducto").val());
                datos1.append("NombreProducto", $("#NombreProducto").val());
                datos1.append("CantidadProducto", $("#CantidadProducto").val());
                datos1.append("ValorUnitario", $("#ValorUnitario").val());
                datos1.append("accion", $("#accion").val());
                datos1.append("Foto", $("#Foto")[0].files[0]);
                // KBNG
                $.ajax({
                    type: "post",
                    //url: "../../../Controlador/controlador_inventarioprodterminado.php",
                    url: "Controlador/controlador_inventarioprodterminado.php",
                    data: datos1,
                    processData: false,
                    cache: false,
                    contentType: false
                }).done(function(resultado) {
                    console.log(resultado);
                    if (resultado.data == 1) {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Se actualizó el producto',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#editar").addClass('hide');
                        $("#editar").removeClass('show');
                        $(".listado").addClass('show');
                        $(".listado").removeClass('hide');
                        $(".detalle").addClass('hide');
                        $(".detalle").removeClass('show');
                    }
                    dt.ajax.reload();

                });
            });



        });

    });

}