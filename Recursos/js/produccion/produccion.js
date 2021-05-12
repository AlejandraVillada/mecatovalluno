function Produccion() {
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
        "ajax": "../../../Controlador/controlador_produccion.php?accion=listar",
        // "ajax": "Controlador/controlador_produccion.php?accion=listar",

        "columns": [
            {
                "data": "IdProduccion",
                render: function (data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-dark btn-sm ver"> <i class="fa fa-plus"></i></a>'
                }
            },
            { "data": "IdSede" },
            { "data": "DiaProduccion" },
            { "data": "HorarioInicioProduccion" },
            { "data": "HorarioFinProduccion" },
            { "data": "Estado" },
            {
                "data": "IdProduccion",
                render: function (data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
            }
        ]
    });

    $("#nuevo").on("click", function () {
        $(this).hide();
        $(".card-title").html("Agregar Producción");
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $(".listado").addClass('hide');
        $(".listado").removeClass('show');
        $(".detalle").addClass('hide');
        $(".detalle").removeClass('show');
        $("#editar").load('../../../Vista/php/Produccion/FormCrearProduccion.php', function () {
            // $("#editar").load('../../../Vista/php/inventarioMateriaPrima/view_agregar_invmateriaPrima.php', function () {
            $.ajax({
                type: "get",
                // url: "Controlador/controlador_inventarioMP.php",
                url: "../../../Controlador/controlador_empleados.php",
                data: { accion: 'listar_estados' },
                dataType: "json"
            }).done(function (resultado) {
                $("#editar #Estado").append("<option>Seleccione el Estado </option>");
                $.each(resultado.data, function (index, value) {

                    $("#editar #Estado").append("<option value='" + value.IdEstado + "'>" + value.Estado + "</option>")

                });

            });
            $.ajax({
                type: "get",
                // url: "Controlador/controlador_inventarioMP.php",
                url: "../../../Controlador/controlador_ubicaciones.php",
                data: { accion: 'listar_sede' },
                dataType: "json"
            }).done(function (resultado) {
                $("#editar #IdSede").append("<option>Seleccione la Sede</option>");
                $.each(resultado.data, function (index, value) {

                    $("#editar #IdSede").append("<option value='" + value.IdSede + "'>" + value.NombreSede + "</option>")

                });

            });
            $("#editar #formCrearP").on("submit", function (e) {
                console.log("h");
                e.preventDefault();
                var datos = $(this).serialize();
                $.ajax({
                    type: "post",
                    url: "../../../Controlador/controlador_produccion.php",
                    data: datos,
                    dataType: "json"
                }).done(function (resultado) {
                    console.log(resultado);
                    if (resultado.data == 1) {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Se Creó Correctamente',
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


    $(".table").on("click", "a.ver", function () {
        $("#editar").addClass('hide');
        $("#editar").removeClass('show');

        $(".detalle").removeClass('hide');
        $(".detalle").addClass('show');
        if (d == "no") {
            dt1.destroy();
        }
        codigo = $(this).data("codigo");
        var boton = document.getElementById("nuevodetalle");
        boton.dataset.idproduccionIdProduccion = codigo;
        $.ajax({
            type: "post",
            // url: "Controlador/controlador_inventarioMP.php",
            url: "../../../Controlador/controlador_detalleproduccion.php",
            data: { accion: 'buscar', IdProduccion: codigo },
            dataType: "json"
        }).done(function (resultado) {
            var ingre = resultado.data[0].NombreProducto;
            $(".card-title").html("Ingredientes para la porción de " + ingre);

        });

        dt1 = $("#tabla1").DataTable({

            "ajax": "../../../Controlador/controlador_produccion.php?accion=consultar&&id=" + codigo + "",
            // "ajax": "Controlador/controlador_produccion.php?accion=listar",

            "columns": [

                { "data": "IdDetalleProduccion" },
                { "data": "NombreMateriaPrima" },
                { "data": "Cantidad" },
                { "data": "NombreMedida" },
                { "data": "DescripcionProducto" },
                {
                    "data": "IdDetalleProduccion",
                    render: function (data) {
                        return '<a href="#" data-producto="' + codigo + '" data-codigo="' + data +
                            '" class="btn btn-info btn-sm modificar"> <i class="fa fa-edit"></i></a>'
                    }
                }
            ]
        });
        d = "no";
    });
    $("#nuevodetalle").on("click", function (e) {
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
        var idproduccionIdProduccion = $(this).data("idproduccionIdProduccion");
        $("#editar").load('../../../Vista/php/Produccion/view_CrearDetalleProd.php', function () {
            console.log(idproduccionIdProduccion);
            $.ajax({
                type: "post",
                // url: "Controlador/controlador_inventarioMP.php",
                url: "../../../Controlador/controlador_detalleproduccion.php",
                data: { accion: 'secuencia', IdProduccion: idproduccionIdProduccion },
                dataType: "json"
            }).done(function (resultado) {
                if (!resultado.data == "") {
                    secuencia = parseFloat(resultado.data);
                    secuencia2 = secuencia + secuencia1;
                    // console.log(secuencia2);
                } else {
                    secuencia2 = 1;
                    // console.log(secuencia2);

                }
                $("#IdProduccion").val(idproduccionIdProduccion);
                $("#IdDetalleProduccion").val(secuencia2);
                $("#IdDetalleProduccion1").val(secuencia2);


            });
            // productos
            $.ajax({
                type: "get",
                // url: "Controlador/controlador_inventarioMP.php",
                url: "../../../Controlador/controlador_mp.php",
                data: { accion: 'listar' },
                dataType: "json"
            }).done(function (resultado) {
                $("#editar #MP").append("<option>Seleccione el producto</option>");
                $.each(resultado.data, function (index, value) {

                    $("#editar #MP").append("<option value='" + value.IdMateriaPrima + "'>" + value.NombreMateriaPrima + "</option>")

                });

            });
            $.ajax({
                type: "post",
                // url: "Controlador/controlador_inventarioMP.php",
                url: "../../../Controlador/controlador_detalleproduccion.php",
                data: { accion: 'listarmedida' },
                dataType: "json"
            }).done(function (resultado) {
                $("#editar #Medidas").append("<option>Seleccione la Medida</option>");
                $.each(resultado.data, function (index, value) {
                    $("#editar #Medidas").append("<option value='" + value.IdMedida + "'>" + value.NombreMedida + "</option>")
                });
            });

            $("#editar #formcreardetPT").on("submit", function (e) {
                console.log("hvg");
                e.preventDefault();
                var datos = $(this).serialize();
                $.ajax({
                    type: "post",
                    url: "../../../Controlador/controlador_detalleproduccion.php",
                    data: datos,
                    dataType: "json"
                }).done(function (resultado) {
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
    editar

    $(".table").on("click", " a.modificar", function (e) {
        e.preventDefault();
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $(".listado").removeClass('show');
        $(".listado").addClass('hide');
        $(".detalle").removeClass('show');
        $(".detalle").addClass('hide');
        var codigo = $(this).data("codigo");
        var IdProduccion = $(this).data("produccion");
        var IdMedida;

        $("#editar").load('../../../Vista/php/Produccion/view_ModificardetallePT.php', function () {
            // $("#editar").load('Vista/php/inventarioMateriaPrima/view_agregar_invmateriaPrima.php', function () {
            $.ajax({
                type: "post",
                // url: "Controlador/controlador_produccion.php",
                url: "../../../Controlador/controlador_detalleproduccion.php",
                data: { iddetalle: codigo, IdProduccion: IdProduccion, accion: 'consultar' },
                dataType: "json"
            }).done(function (resultado) {
                //    console.log(resultado.data.seq);//secuencia
                $("#IdProduccion").val(resultado.data.IdProduccion);
                $("#IdDetalleProduccion").val(resultado.data.IdDetalleProduccion);
                $("#IdDetalleProduccion1").val(resultado.data.IdDetalleProduccion);
                IdMedida = resultado.data.IdMedida;
                $("#NombreMateriaPrima").val(resultado.data.NombreMateriaPrima);
                $("#IdMateriaPrima").val(resultado.data.IdMateriaPrima);
                $("#Cantidad").val(resultado.data.Cantidad);
                $("#DescripcionProducto").val(resultado.data.DescripcionProducto);
                $.ajax({
                    type: "post",
                    // url: "Controlador/controlador_inventarioMP.php",
                    url: "../../../Controlador/controlador_detalleproduccion.php",
                    data: { accion: 'listarmedida' },
                    dataType: "json"
                }).done(function (resultado) {
                    $("#editar #Medidas").append("<option>Seleccione la Medida</option>");
                    $.each(resultado.data, function (index, value) {
                        if (value.IdMedida == IdMedida) {
                            $("#editar #Medidas").append("<option selected value='" + value.IdMedida + "'>" + value.NombreMedida + "</option>")
                        } else {
                            $("#editar #Medidas").append("<option value='" + value.IdMedida + "'>" + value.NombreMedida + "</option>")

                        }
                    });

                });


            });
            $("#editar #formModdetPT").on("submit", function (e) {
                console.log("hvg");
                e.preventDefault();
                var datos = $(this).serialize();
                $.ajax({
                    type: "post",
                    url: "../../../Controlador/controlador_detalleproduccion.php",
                    data: datos,
                    dataType: "json"
                }).done(function (resultado) {
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

    $(".table").on("click", "a.editar", function (e) {
        e.preventDefault();

        var codigo = $(this).data("codigo");
        console.log(codigo + "hola");
        $(".card-title").html("Modificar Produccion");
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $(".listado").addClass('hide');
        $(".listado").removeClass('show');
        $(".detalle").addClass('hide');
        $(".detalle").removeClass('show');
        $("#editar").load('../../../Vista/php/Produccion/FormModificarProduccion.php', function () {
            // $("#editar").load('Vista/php/inventarioMateriaPrima/view_agregar_invmateriaPrima.php', function () {
                var sede;
                var Estado;
            $.ajax({
                type: "post",
                // url: "Controlador/controlador_produccion.php",
                url: "../../../Controlador/controlador_produccion.php",
                data: { id: codigo, accion: 'consultarprod' },
                dataType: "json"
            }).done(function (resultado) {
                console.log(resultado.data[0]);
                $("#IdProduccion").val(resultado.data[0].IdProduccion);
                $("#DiaProduccion").val(resultado.data[0].DiaProduccion);
                $("#HorarioInicioProduccion").val(resultado.data[0].HorarioInicioProduccion);
                $("#HorarioFinProduccion").val(resultado.data[0].HorarioFinProduccion);
                sede = resultado.data[0].IdSede;
                Estado = resultado.data[0].Estado;
            });
            $.ajax({
                type: "get",
                // url: "Controlador/controlador_inventarioMP.php",
                url: "../../../Controlador/controlador_empleados.php",
                data: { accion: 'listar_estados' },
                dataType: "json"
            }).done(function (resultado) {
                $("#editar #Estado").append("<option>Seleccione el Estado </option>");
                $.each(resultado.data, function (index, value) {
                    if (value.IdEstado == Estado) {
                        $("#editar #Estado").append("<option selected value='" + value.IdEstado + "'>" + value.Estado + "</option>")

                    } else {
                        $("#editar #Estado").append("<option value='" + value.IdEstado + "'>" + value.Estado + "</option>")

                    }

                });

            });
            $.ajax({
                type: "get",
                // url: "Controlador/controlador_inventarioMP.php",
                url: "../../../Controlador/controlador_ubicaciones.php",
                data: { accion: 'listar_sede' },
                dataType: "json"
            }).done(function (resultado) {
                $("#editar #IdSede").append("<option>Seleccione la Sede</option>");
                $.each(resultado.data, function (index, value) {
                    if (value.IdSede == sede) {
                        $("#editar #IdSede").append("<option selected value='" + value.IdSede + "'>" + value.NombreSede + "</option>")

                    } else {
                        $("#editar #IdSede").append("<option value='" + value.IdSede + "'>" + value.NombreSede + "</option>")

                    }

                });

            });

            $("#editar #formModP").on("submit", function (e) {
                e.preventDefault();
                console.log("hooo");
                var datos = $(this).serialize();
                $.ajax({
                    type: "post",
                    url: "../../../Controlador/controlador_produccion.php",
                    data: datos,
                    dataType: "json"
                }).done(function (resultado) {
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