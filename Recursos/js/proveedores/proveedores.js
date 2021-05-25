function proveedor() {
    $("#cancelar").hide();
    // Espacio para Proveedor
    // "ajax": "../../../Controlador/controlador_proveedor.php?accion=lista_proveedor",
    var dt1 = $("#tabla1").DataTable({

        "ajax": "Controlador/controlador_proveedor.php?accion=lista_proveedor",
        "dom": 'Bfrtip',

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "buttons": [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel "></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
                title: 'Proveedores'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf "></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                title: 'Proveedores'


            }
        ],

        "columns": [
            { "data": "IdProveedor" },
            { "data": "NombreProveedor" },
            { "data": "Estado" },
            {
                "data": "IdProveedor",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar1 m-2"> <i class="fa fa-edit"></i></a>' +
                        '<a href="#" data-codigo="' + data +
                        '" class="btn btn-dark btn-sm agregar1"> <i class="fa fa-plus"> Asignar Producto</i></a>'
                }
            }
        ]
    });
    $("#edicion1").on("click", "button#cerrar", function() {
        $("#titulo").html("Gestión de Proveedores");
        $("#edicion1").html('');
        $("#edicion1").hide();
        $("#listado1").show();
        $("#nuevo1").show();
        $(".tablaDetalle").show();
        dt1.ajax.reload(null, false);
    });

    $("#edicion1").hide();
    $("#listado2").hide();
    $("#nuevo2").hide();
    $("#regresar").hide();

    $("#nuevo1").click(function() {
        $("#titulo").html("Registro de Proveedores");
        $(".titulo").html("Datos de Registro");
        $("#edicion1").show();
        $("#listado1").hide();
        $("#nuevo1").hide();
        $(".tablaDetalle").hide();
        $("#edicion1").load('Vista/php/Proveedor/form_nuevo_proveedor.php', function() {
            // $("#edicion1").load('../../../Vista/php/Proveedor/form_nuevo_proveedor.php', function() {
            $.ajax({
                type: "get",
                url: "Controlador/controlador_proveedor.php",
                // url: "../../../Controlador/controlador_proveedor.php",
                data: { accion: 'lista_estados' },
                dataType: "json"
            }).done(function(resultado) {;
                $.each(resultado.data, function(index, value) {
                    $("#IdEstado").append("<option value='" + value.IdEstado + "'>" + value.Estado + "</option>")
                });
            });
        });
    });

    $("#edicion1").on("click", "button#grabar1", function(e) {
        e.preventDefault();
        var datos = $("#datos1").serialize();
        // console.log(datos);
        $.ajax({
            type: "get",
            url: "Controlador/controlador_proveedor.php",
            // url: "../../../Controlador/controlador_proveedor.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            console.log(resultado.respuesta);
            if (resultado.respuesta) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'El Proveedor Fue Registrado Exitosamente',
                    showConfirmButton: false,
                    timer: 3500
                })
                $("#titulo").html("Gestión de Proveedores");
                $("#edicion1").html('');
                $("#edicion1").hide();
                $("#listado1").show();
                $("#nuevo1").show();
                $(".tablaDetalle").show();
                dt1.page('last').draw('page');
                dt1.ajax.reload(null, false);
            } else {
                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Error Al Registrar El Empleado',
                    showConfirmButton: false,
                    timer: 3500
                });
            }
        });
    });

    $(".contenedor1").on("click", "a.editar1", function() {
        var codigo = $(this).data("codigo");
        var estado;
        console.log(codigo);
        $("#titulo").html("Modificación de Proveedores");
        $(".titulo").html("Datos a Modificar");
        $("#edicion1").show();
        $("#listado1").hide();
        $("#nuevo1").hide();
        $(".tablaDetalle").hide();
        $("#edicion1").load('Vista/php/Proveedor/form_editar_proveedor.php', function() {
            // $("#edicion1").load('../../../Vista/php/Proveedor/form_editar_proveedor.php', function()
            $.ajax({
                type: "get",
                url: "Controlador/controlador_proveedor.php",
                // url: "../../../Controlador/controlador_proveedor.php",
                data: { codigo: codigo, accion: 'consultar_proveedor' },
                dataType: "json"
            }).done(function(proveedor) {
                if (proveedor.respuesta === "No Existe El Proveedor") {
                    swal({
                        type: 'error',
                        title: '¡Error!',
                        text: '¡El Proveedor No Existe!'
                    })
                } else {

                    $("#IdProveedor").val(proveedor.codigo);
                    $("#NombreProveedor").val(proveedor.nombre);
                    estado = proveedor.estado;
                }
            });

            $.ajax({
                type: "get",
                url: "Controlador/controlador_proveedor.php",
                // url: "../../../Controlador/controlador_proveedor.php",
                data: { accion: 'lista_estados' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    if (estado === value.IdEstado) {
                        $("#IdEstado").append("<option selected value='" + value.IdEstado + "'>" + value.Estado + "</option>")
                    } else {
                        $("#IdEstado").append("<option value='" + value.IdEstado + "'>" + value.Estado + "</option>")
                    }
                });
            });

        });
    });

    $("#edicion1").on("click", "button#actualizar1", function(e) {
        e.preventDefault();
        var datos = $("#datos1").serialize();
        // console.log(datos);
        $.ajax({
            type: "get",
            url: "Controlador/controlador_proveedor.php",
            // url: "../../../Controlador/controlador_proveedor.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            console.log(resultado);
            if (resultado.respuesta) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'Se Actualizaron Los Datos Correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                $("#titulo").html("Gestión de Proveedores");
                $(".titulo").html("Proveedores");
                $("#edicion1").hide();
                $("#listado1").show();
                $("#nuevo1").show();
                $(".tablaDetalle").show();
                dt1.ajax.reload(null, false);
            } else {
                swal({
                    type: 'error',
                    title: '¡Error!',
                    text: 'Verifique la información'
                })
            }
        });
    });

    var dt2;

    $(".contenedor1").on("click", "a.agregar1", function() {

        var codigo = $(this).data("codigo");
        // console.log(codigo);
        $("#titulo").html("Asignación de Productos");
        $(".titulo").html("Datos de Registro");
        $("#listado1").hide();
        $("#listado2").show();
        $("#nuevo1").hide();
        $("#nuevo2").show();
        $("#regresar").show();
        $("#cancelar").show();

        dt2 = $("#tabla2").DataTable({
            ajax: {
                type: "get",
                url: "Controlador/controlador_proveedor.php",
                // url: "../../../Controlador/controlador_proveedor.php",
                data: { codigo: codigo, accion: 'consultar_det_proveedor' },
                dataType: "json"
            },
            "dom": 'Bfrtip',

            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "buttons": [{
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel "></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success',
                    title: 'Detalle Proveedor'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf "></i> ',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger',
                    title: 'Detalle Proveedor'


                }
            ],

            "columns": [
                { "data": "IdDetalleProveedor" },
                { "data": "NombreProveedor" },
                { "data": "NombreMateriaPrima" },
                {
                    "data": "IdDetalleProveedor",
                    render: function(data) {
                        return '<a href="#" data-codigo="' + data +
                            '" class="btn btn-info btn-sm editar2"> <i class="fa fa-edit"></i></a>'
                    }
                }, {
                    "data": "IdProveedor",
                    render: function(data) {
                        return '<a href="#" data-codigo="' + data +
                            '" class="btn btn-info btn-sm proveedor hide"> <i class="fa fa-edit"></i></a>'
                    }
                }

            ]
        });
    });

    $("#edicion1").on("click", "button#cerrar2", function() {
        $("#titulo").html("Asignacion de productos");
        $("#edicion1").html('');
        $("#edicion1").hide();
        $("#listado2").show();
        $("#nuevo2").show();
        $(".tablaProveedor").show();
        dt2.ajax.reload(null, false);
    });

    $(".tablaProveedor").on("click", "button#cancelar", function() {
        $("#titulo").html("Gestión de Proveedores");
        $("#edicion1").html('');
        $("#edicion1").hide();
        $("#listado1").show();
        // $("#listado2").hide();
        $("#nuevo1").show();
        $("#nuevo2").hide();
        $(".tablaProveedor").show();
        $("#cancelar").hide();
        dt2.destroy();
        // dt1.ajax.reload(null, false);
    });

    // Procesos del Detalle Proveedor

    $("#nuevo2").click(function() {
        var codigo = $(".proveedor").data("codigo");
        $("#titulo").html("Asignación de Productos a Proveedores");
        $(".titulo").html("Datos de Registro");
        $("#edicion1").show();
        $("#listado2").hide();
        $("#nuevo2").hide();
        $("#regresar").hide();
        $("#edicion1").load('Vista/php/Proveedor/form_nuevo_det_proveedor.php', function() {
            // $("#edicion1").load('../../../Vista/php/Proveedor/form_nuevo_det_proveedor.php', function() {

            $.ajax({
                type: "get",
                url: "Controlador/controlador_proveedor.php",
                // url: "../../../Controlador/controlador_proveedor.php",
                data: { codigo: codigo, accion: 'consultar_proveedor' },
                dataType: "json"
            }).done(function(proveedor) {
                if (proveedor.respuesta === "No Existe El Proveedor") {
                    swal({
                        type: 'error',
                        title: '¡Error!',
                        text: '¡El Proveedor No Existe!'
                    })
                } else {
                    $("#Proveedor").val(proveedor.nombre);
                    $("#IdProveedor").val(proveedor.codigo);
                }
            });
            $.ajax({
                type: "get",
                url: "Controlador/controlador_proveedor.php",
                // url: "../../../Controlador/controlador_proveedor.php",
                data: { accion: 'lista_productos' },
                dataType: "json"
            }).done(function(resultado) {;
                $.each(resultado.data, function(index, value) {
                    $("#IdMateriaPrima").append("<option value='" + value.IdMateriaPrima + "'>" + value.NombreMateriaPrima + "</option>")
                });
            });
        });
    });

    $("#edicion1").on("click", "button#grabar2", function(e) {
        e.preventDefault();
        var datos = $("#datos2").serialize();
        // console.log(datos);
        $.ajax({
            type: "get",
            url: "Controlador/controlador_proveedor.php",
            // url: "../../../Controlador/controlador_proveedor.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            console.log(resultado);
            if (resultado.respuesta == 'correcto') {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'El Producto Fue Asignado Exitosamente',
                    showConfirmButton: false,
                    timer: 3500
                })
                $("#titulo").html("Asignacion de productos");
                $("#edicion1").html('');
                $("#edicion1").hide();
                $("#listado2").show();
                $("#nuevo2").show();
                $(".tablaProveedor").show();
                dt2.page('last').draw('page');
                dt2.ajax.reload(null, false);
            } else if (resultado.respuesta == 'error') {
                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Error Al Asignar El Producto',
                    showConfirmButton: false,
                    timer: 3500
                });
            }
        });
    });

    $(".contenedor1").on("click", "a.editar2", function() {
        var codigo = $(this).data("codigo");
        var codigo2 = $(".proveedor").data("codigo");
        var proveedor;
        var materiaprima;
        // console.log(codigo);
        $("#titulo").html("Modificación de Asignación de Productos");
        $(".titulo").html("Datos a Modificar");
        $("#edicion1").show();
        $("#listado2").hide();
        $("#nuevo2").hide();
        $("#regresar").hide();
        $(".tablaProveedor").show();
        $("#edicion1").load('Vista/php/Proveedor/form_editar_det_proveedor.php', function() {
            // $("#edicion1").load('../../../Vista/php/Proveedor/form_editar_det_proveedor.php', function() {
            // console.log(codigo2);
            $.ajax({
                type: "get",
                url: "Controlador/controlador_proveedor.php",
                // url: "../../../Controlador/controlador_proveedor.php",
                data: { codigo: codigo, codigo2: codigo2, accion: 'consultar_det_proveedor2' },
                dataType: "json"
            }).done(function(det_proveedor) {
                if (det_proveedor.respuesta === "No Existe El Proveedor") {
                    swal({
                        type: 'error',
                        title: '¡Error!',
                        text: '¡El Proveedor No Existe!'
                    })
                } else {
                    $("#IdDetalleProveedor").val(det_proveedor.codigo);
                    proveedor = det_proveedor.proveedor;
                    materiaprima = det_proveedor.materia;
                }
            });

            $.ajax({
                type: "get",
                url: "Controlador/controlador_proveedor.php",
                // url: "../../../Controlador/controlador_proveedor.php",
                data: { codigo: codigo2, accion: 'consultar_proveedor' },
                dataType: "json"
            }).done(function(proveedor) {
                if (proveedor.respuesta === "No Existe El Proveedor") {
                    swal({
                        type: 'error',
                        title: '¡Error!',
                        text: '¡El Proveedor No Existe!'
                    })
                } else {
                    $("#Proveedor").val(proveedor.nombre);
                    $("#IdProveedor").val(proveedor.codigo);
                }
            });

            $.ajax({
                type: "get",
                url: "Controlador/controlador_proveedor.php",
                // url: "../../../Controlador/controlador_proveedor.php",
                data: { accion: 'lista_productos' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    if (materiaprima === value.IdMateriaPrima) {
                        $("#IdMateriaPrima").append("<option selected value='" + value.IdMateriaPrima + "'>" + value.NombreMateriaPrima + "</option>")
                    } else {
                        $("#IdMateriaPrima").append("<option value='" + value.IdMateriaPrima + "'>" + value.NombreMateriaPrima + "</option>")
                    }
                });
            });

        });
    });

    $("#edicion1").on("click", "button#actualizar2", function(e) {
        e.preventDefault();
        var datos = $("#datos2").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "Controlador/controlador_proveedor.php",
            // url: "../../../Controlador/controlador_proveedor.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            console.log(resultado.respuesta);
            if (resultado.respuesta == 'correcto') {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'Se Actualizaron Los Datos Correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                $("#titulo").html("Asignacion de productos");
                $(".titulo").html("Proveedores");
                $("#edicion1").hide();
                $("#listado2").show();
                $("#nuevo2").show();
                $(".tablaProveedor").show();
                dt2.ajax.reload(null, false);
            } else if (resultado.respuesta == 'error') {
                swal({
                    type: 'error',
                    title: '¡Error!',
                    text: 'Verifique la información'
                })
            }
        });
    });

}