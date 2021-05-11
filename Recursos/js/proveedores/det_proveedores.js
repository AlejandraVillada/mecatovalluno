function det_proveedor() {

    // Espacio para Detalle Proveedor

    // var dt2 = $("#tabla2").DataTable({
    //     "ajax": "../../../Controlador/controlador_proveedor.php?accion=lista_det_proveedor",
    //     "columns": [
    //         { "data": "IdDetalleProveedor" },
    //         { "data": "NombreProveedor" },
    //         { "data": "NombreMateriaPrima" },
    //         {
    //             "data": "IdDetalleProveedor",
    //             render: function(data) {
    //                 return '<a href="#" data-codigo="' + data +
    //                     '" class="btn btn-info btn-sm editar2"> <i class="fa fa-edit"></i></a>'
    //             }
    //         }
    //     ]
    // });

    $("#edicion2").hide();

    $("#nuevo2").click(function() {
        $("#titulo").html("Asignación de Productos a Proveedores");
        $(".titulo").html("Datos de Registro");
        // $("#edicion2").show();
        $("#listado2").hide();
        $("#nuevo2").hide();
        $(".tablaProveedor").hide();
        $("#edicion1").load('../../../Vista/php/Proveedor/form_nuevo_det_proveedor.php', function() {
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