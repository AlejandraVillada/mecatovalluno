function proveedor() {

    // Espacio para Proveedor

    var dt1 = $("#tabla1").DataTable({
        "ajax": "../../../Controlador/controlador_proveedor.php?accion=lista_proveedor",
        "columns": [
            { "data": "IdProveedor" },
            { "data": "NombreProveedor" },
            { "data": "Estado" },
            {
                "data": "IdProveedor",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar1"> <i class="fa fa-edit"></i></a>'
                }
            }
        ]
    });

    $("#edicion1").hide();

    $("#nuevo1").click(function() {
        $("#titulo").html("Registro de Proveedores");
        $(".titulo").html("Datos de Registro");
        $("#edicion1").show();
        $("#listado1").hide();
        $("#nuevo1").hide();
        $(".tablaDetalle").hide();
        $("#edicion1").load('../../../Vista/php/Proveedor/form_nuevo_proveedor.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_proveedor.php",
                data: { accion: 'lista_estados' },
                dataType: "json"
            }).done(function(resultado) {;
                $.each(resultado.data, function(index, value) {
                    $("#IdEstado").append("<option value='" + value.IdEstado + "'>" + value.Estado + "</option>")
                });
            });
        });
    })

    $("#edicion1").on("click", "button#grabar1", function() {

        var datos = $("#datos1").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_proveedor.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
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
        $("#edicion1").load('../../../Vista/php/Proveedor/form_editar_proveedor.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_proveedor.php",
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
                url: "../../../Controlador/controlador_proveedor.php",
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
    })

    $("#edicion1").on("click", "button#actualizar1", function() {
        var datos = $("#datos1").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_proveedor.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
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
    })

    // Espacio para Detalle Proveedor

    var dt2 = $("#tabla2").DataTable({
        "ajax": "../../../Controlador/controlador_proveedor.php?accion=lista_det_proveedor",
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
            }
        ]
    });

    $("#edicion2").hide();

    $("#nuevo2").click(function() {
        $("#titulo").html("Asignación de Productos a Proveedores");
        $(".titulo").html("Datos de Registro");
        $("#edicion2").show();
        $("#listado2").hide();
        $("#nuevo2").hide();
        $(".tablaProveedor").hide();
        $("#edicion2").load('../../../Vista/php/Proveedor/form_nuevo_det_proveedor.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_proveedor.php",
                data: { accion: 'lista_proveedores' },
                dataType: "json"
            }).done(function(resultado) {;
                $.each(resultado.data, function(index, value) {
                    $("#IdProveedor").append("<option value='" + value.IdProveedor + "'>" + value.NombreProveedor + "</option>")
                });
            });

            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_proveedor.php",
                data: { accion: 'lista_productos' },
                dataType: "json"
            }).done(function(resultado) {;
                $.each(resultado.data, function(index, value) {
                    $("#IdMateriaPrima").append("<option value='" + value.IdMateriaPrima + "'>" + value.NombreMateriaPrima + "</option>")
                });
            });
        });
    })

    $("#edicion2").on("click", "button#grabar2", function() {

        var datos = $("#datos2").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_proveedor.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            if (resultado.respuesta) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'El Producto Fue Asignado Exitosamente',
                    showConfirmButton: false,
                    timer: 3500
                })
                $("#titulo").html("Gestión de Proveedores");
                $("#edicion2").html('');
                $("#edicion2").hide();
                $("#listado2").show();
                $("#nuevo2").show();
                $(".tablaProveedor").show();
                dt2.page('last').draw('page');
                dt2.ajax.reload(null, false);
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

    $(".contenedor2").on("click", "a.editar2", function() {
        var codigo = $(this).data("codigo");
        var proveedor;
        var materiaprima;
        console.log(codigo);
        $("#titulo").html("Modificación de Asignación de Productos");
        $(".titulo").html("Datos a Modificar");
        $("#edicion2").show();
        $("#listado2").hide();
        $("#nuevo2").hide();
        $(".tablaProveedor").hide();
        $("#edicion2").load('../../../Vista/php/Proveedor/form_editar_det_proveedor.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_proveedor.php",
                data: { codigo: codigo, accion: 'consultar_det_proveedor' },
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
                    proveedor = det_proveedor.nombre;
                    materiaprima = det_proveedor.materia;
                }
            });

            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_proveedor.php",
                data: { accion: 'lista_proveedores' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    if (proveedor === value.IdProveedor) {
                        $("#IdProveedor").append("<option selected value='" + value.IdProveedor + "'>" + value.NombreProveedor + "</option>")
                    } else {
                        $("#IdProveedor").append("<option value='" + value.IdProveedor + "'>" + value.NombreProveedor + "</option>")
                    }
                });
            });

            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_proveedor.php",
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
    })

    $("#edicion2").on("click", "button#actualizar2", function() {
        var datos = $("#datos2").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_proveedor.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
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
                $("#edicion2").hide();
                $("#listado2").show();
                $("#nuevo2").show();
                $(".tablaProveedor").show();
                dt2.ajax.reload(null, false);
            } else {
                swal({
                    type: 'error',
                    title: '¡Error!',
                    text: 'Verifique la información'
                })
            }
        });
    })

}