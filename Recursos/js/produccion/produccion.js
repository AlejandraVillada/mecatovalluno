function Produccion() {
    // "ajax": "../../../Controlador/controlador_produccion.php?accion=listar",
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
        "ajax": "Controlador/controlador_produccion.php?accion=listar",
        "dataSrc": "",
        "dom": 'Bfrtip',

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "buttons": [{
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel "></i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            title: 'Producción General'
        },
        {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf "></i> ',
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger',
            title: 'Producción General'

        }
        ],

        "columns": [{
            "data": "IdProduccion",
            render: function (data) {
                return '<a href="#" data-codigo="' + data +
                    '" class="btn btn-dark btn-sm ver"> <i class="fa fa-plus"></i></a>'
            }
        },
        { "data": "NombreSede" },
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
        $("#titulo").html("Registrar Producción");
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $(".listado").addClass('hide');
        $(".listado").removeClass('show');
        $(".detalle").addClass('hide');
        $(".detalle").removeClass('show');
        $("#editar").load('Vista/php/Produccion/FormCrearProduccion.php', function () {
            // $("#editar").load('../../../Vista/php/Produccion/FormCrearProduccion.php', function() {
            $.ajax({
                type: "get",
                // url: "../../../Controlador/controlador_produccion.php",
                url: "Controlador/controlador_produccion.php",
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
                //  url: "../../../Controlador/controlador_ubicaciones.php",
                url: "Controlador/controlador_ubicaciones.php",
                data: { accion: 'listar_sede' },
                dataType: "json"
            }).done(function (resultado) {
                $("#editar #IdSede").append("<option>Seleccione la Sede</option>");
                $.each(resultado.data, function (index, value) {

                    $("#editar #IdSede").append("<option value='" + value.IdSede + "'>" + value.NombreSede + "</option>")

                });

            });
            $("#editar #volvercrearprod").on("click", function (e) {
                $("#editar").addClass('hide');
                $("#editar").removeClass('show');
                $(".listado").addClass('show');
                $(".listado").removeClass('hide');
                $(".detalle").addClass('hide');
                $(".detalle").removeClass('show');
            })
            $("#editar #formCrearP").on("submit", function (e) {
                console.log("h");
                e.preventDefault();
                var datos = $(this).serialize();
                $.ajax({
                    // url: "../../../Controlador/controlador_produccion.php",
                    type: "post",
                    url: "Controlador/controlador_produccion.php",
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
        var boton = document.getElementById("nuevodetalle");
        delete boton.dataset.produccion;
        console.log(boton);
        $("#editar").addClass('hide');
        $("#editar").removeClass('show');

        $(".detalle").removeClass('hide');
        $(".detalle").addClass('show');
        if (d == "no") {
            dt1.destroy();
        }
        codigo = $(this).data("codigo");
        boton.dataset.produccion = codigo;
        // console.log(boton);

        // "ajax": "../../../Controlador/controlador_produccion.php?accion=consultar&&id=" + codigo + "",

        dt1 = $("#tabla1").DataTable({

            "ajax": "Controlador/controlador_produccion.php?accion=consultar&&id=" + codigo + "",
            "dom": 'Bfrtip',

            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "buttons": [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel "></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
                title: 'Detalle Produccion'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf "></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                title: 'Detalle Produccion',

            }
            ],
            "columns": [

                { "data": "IdDetalleProduccion" },
                { "data": "NombreProducto" },
                { "data": "CantidadProduccion" },
                { "data": "CantidadProductoTerminado" },
                { "data": "Estado" },
                {
                    "data": "IdDetalleProduccion",
                    render: function (data) {
                        return '<a href="#" data-produccion="' + codigo + '" data-codigo="' + data +
                            '" class="btn btn-info btn-sm modificar"> <i class="fa fa-edit"></i></a>'
                    }
                }
            ]
        });
        d = "no";
    });
    $("#nuevodetalle").on("click", function (e) {
        e.preventDefault();
        var IdProdu = 0;
        $("#editar").addClass('show');
        $("#nuevo").hide();
        $("#titulo").html("Registrar Detalle de Producción");
        $("#editar").removeClass('hide');
        $(".listado").removeClass('show');
        $(".listado").addClass('hide');
        $(".detalle").removeClass('show');
        $(".detalle").addClass('hide');
        var secuencia = 0;
        var secuencia1 = 1;
        var secuencia2 = 0;
        var boton1 = document.getElementById("nuevodetalle");

        IdProdu = boton1.dataset.produccion;

        console.log("----" + IdProdu);

        $("#editar").load('Vista/php/Produccion/view_CrearDetalleProd.php', function () {
            // $("#editar").load('../../../Vista/php/Produccion/view_CrearDetalleProd.php', function() {
            console.log("----" + IdProdu);
            $.ajax({
                type: "post",
                // url: "../../../Controlador/controlador_detalleproduccion.php",
                url: "Controlador/controlador_detalleproduccion.php",
                data: { accion: 'secuencia', IdProduccion: IdProdu },
                dataType: "json"
            }).done(function (resultado) {
                console.log(resultado);
                if (!resultado.data == "") {
                    secuencia = parseFloat(resultado.data);
                    secuencia2 = secuencia + secuencia1;
                    console.log("secuencia" + secuencia2);
                } else {
                    secuencia2 = 1;
                    console.log("secuencia" + secuencia2);

                }
                $("#IdProduccion").val(IdProdu);
                $("#IdDetalleProduccion").val(secuencia2);
                $("#IdDetalleProduccion1").val(secuencia2);


            });
            // productos
            $.ajax({
                type: "get",
                // url: "../../../Controlador/controlador_inventarioprodterminado.php",
                url: "Controlador/controlador_inventarioprodterminado.php",
                data: { accion: 'listar' },
                dataType: "json"
            }).done(function (resultado) {
                $("#editar #IdProductoTerminado").append("<option>Seleccione el producto</option>");
                $.each(resultado.data, function (index, value) {

                    $("#editar #IdProductoTerminado").append("<option data-cantidad='" + value.CantidadProducto + "' value='" + value.IdProducto + "'>" + value.NombreProducto + "</option>")

                });

            });
            $("#editar #newdetaproduccion").on("click", function (e) {
                $("#editar").addClass('hide');
                $("#editar").removeClass('show');
                $(".listado").addClass('show');
                $(".listado").removeClass('hide');
                $(".detalle").addClass('show');
                $(".detalle").removeClass('hide');
            })
            $("select[id=IdProductoTerminado]").change(function () {

                var cantidad = $(this).children('option:selected').data('cantidad');

                $("#CantidadProductoTerminado").val(cantidad);
                $("#CantidadProductoTerminado1").val(cantidad);
                var prod = $('select[name=IdProducto]').val();

                var produccion = $("#IdProduccion").val();
                console.log(produccion);
                $.ajax({
                    type: "post",
                    //url: "../../../Controlador/controlador_detalleproduccion.php",
                    url: "Controlador/controlador_detalleproduccion.php",
                    data: { accion: 'cantidadmaxima', IdProducto: prod, IdProduccion: produccion },
                    dataType: "json"
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    swal({
                            position: 'center',
                            type: 'error',
                            title: 'No puede agregar un producto que no tenga detalle',
                            showConfirmButton: false,
                            timer: 1500
                        })
                }).done(function (resultado) {
                    console.log(cantidad);

                    if (resultado.data.Habilitado == "Si") {
                        $("#CantidadProduccion").attr('disabled', false);
                        $("#CantidadProduccion").attr("max", resultado.data.max);
                        $("input[id=guardarmodificar]").attr('disabled', false);
                        $("#guardarnuevo").attr('disabled', false);

                    } else if (resultado.data.Habilitado == "NoProducto") {
                        swal({
                            position: 'center',
                            type: 'error',
                            title: 'No puede agregar un mismo producto varias veces',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("input[id=guardarmodificar]").attr('disabled', true);
                        $("#CantidadProduccion").attr('disabled', true);
                        $("#guardarnuevo").attr('disabled', true);
                    } else {
                        swal({
                            position: 'center',
                            type: 'error',
                            title: 'No puede agregar el producto porque no hay materia prima suficiente para su producción',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("input[id=guardarmodificar]").attr('disabled', true);
                        $("#CantidadProduccion").attr('disabled', true);
                        $("#guardarnuevo").attr('disabled', true);

                    }
                });

            });

            $("#editar #formcreardetPT").on("submit", function (e) {
                console.log("hvg");
                e.preventDefault();
                var datos = $(this).serialize();
                $.ajax({
                    type: "post",
                    // url: "../../../Controlador/controlador_detalleproduccion.php",
                    url: "Controlador/controlador_detalleproduccion.php",
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
        $("#nuevo").hide();
        $("#titulo").html("Modificar Datos de Detalle Producción");
        $("#editar").removeClass('hide');
        $(".listado").removeClass('show');
        $(".listado").addClass('hide');
        $(".detalle").removeClass('show');
        $(".detalle").addClass('hide');
        var codigo = $(this).data("codigo");
        var IdProduccion = $(this).data("produccion");
        var IdMedida;

        $("#editar").load('Vista/php/Produccion/view_ModificardetalleProd.php', function () {
            // $("#editar").load('../../../Vista/php/Produccion/view_ModificardetalleProd.php', function() {
            $.ajax({
                type: "post",
                // url: "../../../Controlador/controlador_detalleproduccion.php",
                url: "Controlador/controlador_detalleproduccion.php",
                data: { iddetalle: codigo, IdProduccion: IdProduccion, accion: 'consultar' },
                dataType: "json"
            }).done(function (resultado) {
                console.log(resultado.data);
                $("#IdProduccion").val(resultado.data.IdProduccion);
                $("#IdDetalleProduccion").val(resultado.data.IdDetalleProduccion);
                $("#IdDetalleProduccion1").val(resultado.data.IdDetalleProduccion);
                $("#CantidadProductoTerminado1").val(resultado.data.CantidadProductoTerminado);
                $("#CantidadProductoTerminado").val(resultado.data.CantidadProductoTerminado);
                $("#CantidadProduccion").val(resultado.data.CantidadProduccion);

                var productoterminado = resultado.data.IdProducto;
                // productos
                $.ajax({
                    type: "get",
                    // url: "../../../Controlador/controlador_inventarioprodterminado.php",
                    url: "Controlador/controlador_inventarioprodterminado.php",
                    data: { accion: 'listar' },
                    dataType: "json"
                }).done(function (resultado) {
                    // console.log(document.getElementById("IdProducto"));
                    $("#editar #IdProducto").append("<option>Seleccione el producto</option>");
                    $.each(resultado.data, function (index, value) {

                        if (value.IdProducto == productoterminado) {
                            $.ajax({
                                type: "post",
                                // url: "../../../Controlador/controlador_detalleproduccion.php",
                                url: "Controlador/controlador_detalleproduccion.php",
                                data: { accion: 'cantidadmaxima1', IdProducto: productoterminado, IdProduccion: IdProduccion },
                                dataType: "json"
                            }).done(function (resultado) {
                                console.log("hola");
                                console.log(resultado);
                                if (resultado.data.Habilitado == "Si") {
                                    $("#CantidadProduccion").attr('disabled', false);
                                    $("#CantidadProduccion").attr("max", resultado.data.max);
                                    $("input[id=guardarmodificar]").attr('disabled', false);
                                    $("#guardarmodificar").attr('disabled', false);

                                } else if (resultado.data.Habilitado == "NoProducto") {
                                    if (resultado.data.IdProducto = productoterminado) {
                                        $("#CantidadProduccion").attr('disabled', false);
                                        $("#CantidadProduccion").attr("max", resultado.data.max);
                                        $("input[id=guardarmodificar]").attr('disabled', false);
                                        $("#guardarmodificar").attr('disabled', false);
                                    } else {
                                        swal({
                                            position: 'center',
                                            type: 'error',
                                            title: 'No puede agregar un mismo producto varias veces',
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        $("input[id=guardarmodificar]").attr('disabled', true);
                                        $("#CantidadProduccion").attr('disabled', true);
                                        $("#guardarmodificar").attr('disabled', true);
                                    }
                                } else {
                                    swal({
                                        position: 'center',
                                        type: 'error',
                                        title: 'No puede agregar el producto porque no hay materia prima suficiente para su producción',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                    $("input[id=guardarmodificar]").attr('disabled', true);
                                    $("#CantidadProduccion").attr('disabled', true);
                                    $("#guardarmodificar").attr('disabled', true);

                                }


                            });
                            $("#editar #IdProducto").append("<option selected data-cantidad='" + value.CantidadProducto + "' value='" + value.IdProducto + "'>" + value.NombreProducto + "</option>")

                        } else {
                            $("#editar #IdProducto").append("<option data-cantidad='" + value.CantidadProducto + "' value='" + value.IdProducto + "'>" + value.NombreProducto + "</option>")

                        }


                    });

                });
                $("#editar #moddetalleprod").on("click", function (e) {
                    $("#editar").addClass('hide');
                    $("#editar").removeClass('show');
                    $(".listado").addClass('show');
                    $(".listado").removeClass('hide');
                    $(".detalle").addClass('show');
                    $(".detalle").removeClass('hide');
                })
                $("select[id=IdProducto]").change(function () {

                    var cantidad = $(this).children('option:selected').data('cantidad');
                    $("#CantidadProductoTerminado").val(cantidad);
                    $("#CantidadProductoTerminado1").val(cantidad);
                    var prod = $('select[name=IdProducto]').val();
                    console.log(prod);
                    $.ajax({
                        type: "post",
                        //  url: "../../../Controlador/controlador_detalleproduccion.php",
                        url: "Controlador/controlador_detalleproduccion.php",
                        data: { accion: 'cantidadmaxima1', IdProducto: prod, IdProduccion: IdProduccion },
                        dataType: "json"
                    }).done(function (resultado) {
                        if (resultado.data.Habilitado == "Si") {
                            $("#CantidadProduccion").attr('disabled', false);
                            $("#CantidadProduccion").attr("max", resultado.data.max);
                            $("input[id=guardarmodificar]").attr('disabled', false);
                            $("#guardarmodificar").attr('disabled', false);

                        } else if (resultado.data.Habilitado == "NoProducto") {
                            if (resultado.data.IdProducto = productoterminado) {
                                $("#CantidadProduccion").attr('disabled', false);
                                $("#CantidadProduccion").attr("max", resultado.data.max);
                                $("input[id=guardarmodificar]").attr('disabled', false);
                                $("#guardarmodificar").attr('disabled', false);
                            } else {
                                swal({
                                    position: 'center',
                                    type: 'error',
                                    title: 'No puede agregar un mismo producto varias veces',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                $("input[id=guardarmodificar]").attr('disabled', true);
                                $("#CantidadProduccion").attr('disabled', true);
                                $("#guardarmodificar").attr('disabled', true);
                            }
                        } else {
                            swal({
                                position: 'center',
                                type: 'error',
                                title: 'No puede agregar el producto porque no hay materia prima suficiente para su producción',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $("input[id=guardarmodificar]").attr('disabled', true);
                            $("#CantidadProduccion").attr('disabled', true);
                            $("#guardarmodificar").attr('disabled', true);

                        }
                    });

                });


            });
            $("#editar #formmoddetP").on("submit", function (e) {
                console.log("hvg");
                e.preventDefault();
                var datos = $(this).serialize();
                $.ajax({
                    type: "post",
                    // url: "../../../Controlador/controlador_detalleproduccion.php",
                    url: "Controlador/controlador_detalleproduccion.php",
                    data: datos,
                    dataType: "json"
                }).done(function (resultado) {
                    if (resultado.data == 1) {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Se actualizó la Producción',
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
        $("#nuevo").hide();
        $("#titulo").html("Modificar Datos de Producción");
        $("#editar").removeClass('hide');
        $(".listado").addClass('hide');
        $(".listado").removeClass('show');
        $(".detalle").addClass('hide');
        $(".detalle").removeClass('show');
        $("#editar").load('Vista/php/Produccion/FormModificarProduccion.php', function () {
            // $("#editar").load('../../../Vista/php/Produccion/FormModificarProduccion.php', function() {
            var sede;
            var Estado;
            $.ajax({
                type: "post",
                // url: "../../../Controlador/controlador_produccion.php",
                url: "Controlador/controlador_produccion.php",
                data: { id: codigo, accion: 'consultarprod' },
                dataType: "json"
            }).done(function (resultado) {
                console.log(resultado.data[0]);
                $("#IdProduccion").val(resultado.data[0].IdProduccion);

                $('#DiaProduccion').val(resultado.data[0].DiaProduccion);

                $("#HorarioInicioProduccion").val(resultado.data[0].HorarioInicioProduccion);
                $("#HorarioFinProduccion").val(resultado.data[0].HorarioFinProduccion);
                sede = resultado.data[0].IdSede;
                Estado = resultado.data[0].Estado;
            });
            $.ajax({
                type: "get",
                // url: "../../../Controlador/controlador_produccion.php",
                url: "Controlador/controlador_produccion.php",
                data: { accion: 'listar_estados' },
                dataType: "json"
            }).done(function (resultado) {
                $("#editar #Estado").append("<option>Seleccione el Estado </option>");
                $.each(resultado.data, function (index, value) {
                    console.log(value);
                    if (Estado == 1) {
                        if (value.IdEstado == Estado) {
                            $("#editar #Estado").append("<option selected value='" + value.IdEstado + "'>" + value.Estado + "</option>")

                        } else {
                            $("#editar #Estado").append("<option value='" + value.IdEstado + "'>" + value.Estado + "</option>")

                        }
                    }
                    if (Estado == 2) {
                        if (value.IdEstado == Estado || value.IdEstado == 3) {
                            $("#editar #Estado").append("<option selected value='" + value.IdEstado + "'>" + value.Estado + "</option>")

                        }

                    }
                    if (Estado == 3) {
                        if (value.IdEstado == Estado) {
                            $("#editar #Estado").append("<option selected value='" + value.IdEstado + "'>" + value.Estado + "</option>")

                        }
                    }

                });

            });
            $.ajax({
                type: "get",
                //  url: "../../../Controlador/controlador_ubicaciones.php",
                url: "Controlador/controlador_ubicaciones.php",
                data: { accion: 'listar_sede' },
                dataType: "json"
            }).done(function (resultado) {
                $("#editar #IdSede").append("<option>Seleccione la Sede</option>");
                $.each(resultado.data, function (index, value) {
                    if (value.IdSede == sede) {
                        $("#editar #IdSede").append("<option selected value='" + value.IdSede + "'>" + value.NombreSede + "</option>")

                    }

                });

            });
            $("#editar #volvermodprod").on("click", function (e) {
                $("#editar").addClass('hide');
                $("#editar").removeClass('show');
                $(".listado").addClass('show');
                $(".listado").removeClass('hide');
                $(".detalle").addClass('hide');
                $(".detalle").removeClass('show');
            })
            $("#editar #formModP").on("submit", function (e) {
                e.preventDefault();
                console.log("hooo");
                var datos = $(this).serialize();
                $.ajax({
                    type: "post",
                    // url: "../../../Controlador/controlador_produccion.php",
                    url: "Controlador/controlador_produccion.php",
                    data: datos,
                    dataType: "json"
                }).done(function (resultado) {
                    console.log(resultado);
                    if (resultado.data == 1) {
                        swal({
                            position: 'center',
                            type: 'success',
                            title: 'Se actualizó la Producción',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#editar").addClass('hide');
                        $("#editar").removeClass('show');
                        $(".listado").addClass('show');
                        $(".listado").removeClass('hide');
                        $(".detalle").addClass('hide');
                        $(".detalle").removeClass('show');
                    } else {
                        swal({
                            position: 'center',
                            type: 'error',
                            title: 'No se Realizó ningún cambio',
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
