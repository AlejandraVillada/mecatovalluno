function ciudad() {
    $("#crear").show();
    var dt = $("#tabla").DataTable({
        // "ajax": "../../../Controlador/controlador_ubicaciones.php?accion=listar_ciudad",
        "ajax": "Controlador/controlador_ubicaciones.php?accion=listar_ciudad",
        "dom": 'Bfrtip',

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "buttons": [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel "></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
                title: 'Ciudades'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf "></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                title: 'Ciudades'


            }
        ],

        "columns": [
            { "data": "IdCiudad" },
            { "data": "NombrePais" },
            { "data": "NombreCiudad" },
            { "data": "Estado" },
            {
                "data": "IdCiudad",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"><i class="fa fa-edit"></i></a>'
                }
            }
        ]

    });

    $("#editado").on("click", "button#cerrar", function() {
        $("#titulo").html("Gestión de Ciudades");
        $("#editado").html('');
        $("#editado").hide();
        $(".listado").show();
        $("#crear").show();
        dt.ajax.reload(null, false);
    });

    $("#editado").hide();

    $("#crear").on("click", function() {
        $("#titulo").html("Registrar Ciudad");
        $("#editado").show();
        $(".listado").hide();
        $("#crear").hide();
        $("#editado").load('Vista/php/Ubicaciones/formCrearCiudad.php', function() {
            // $("#editado").load('../../../Vista/php/Ubicaciones/formCrearCiudad.php', function() {
            $.ajax({
                type: "get",
                url: "Controlador/controlador_ubicaciones.php",
                // url: "../../../Controlador/controlador_ubicaciones.php",
                data: { accion: 'listar_pais' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    // console.log(value.IdEstado);
                    if (value.Estado == 'ACTIVO') {
                        $("#editado #IdPais").append("<option value='" + value.IdPais + "'>" + value.NombrePais + "</option>")
                    }
                });
            });
            $.ajax({
                type: "get",
                url: "Controlador/controlador_ubicaciones.php",
                // url: "../../../Controlador/controlador_empleados.php",
                data: { accion: 'listar_estados' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    $("#IdEstado").append("<option value='" + value.IdEstado + "'>" + value.Estado + "</option>")
                });
            });
        });

    });

    $(".contenido").on("click", "a.editar", function() {
        var codigo = $(this).data("codigo");
        var pais, estado;
        $("#titulo").html("Modificar Datos de Ciudad");
        $("#editado").show();
        $(".listado").hide();
        $("#crear").hide();
        $("#editado").load('Vista/php/Ubicaciones/formModificarCiudad.php', function() {
            // $("#editado").load('../../../Vista/php/Ubicaciones/formModificarCiudad.php', function() {
            $.ajax({
                type: "get",
                url: "Controlador/controlador_ubicaciones.php",
                // url: "../../../Controlador/controlador_ubicaciones.php",
                data: { codigo: codigo, accion: 'consultar_ciudad' },
                dataType: "json"
            }).done(function(ciudad) {
                if (ciudad.respuesta === "no existe") {
                    swal({
                        type: 'error',
                        title: '¡Error!',
                        text: 'La ciudad no existe'
                    })
                } else {
                    $("#IdCiudad").val(ciudad.codigo);
                    $("#NombreCiudad").val(ciudad.ciudad);
                    pais = ciudad.pais;
                    estado = ciudad.estado;
                }
            });

            $.ajax({
                type: "get",
                url: "Controlador/controlador_ubicaciones.php",
                // url: "../../../Controlador/controlador_ubicaciones.php",
                data: { accion: 'listar_pais' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    if (value.Estado == 'ACTIVO' || value.IdPais == pais) {
                        if (pais === value.IdPais) {
                            $("#IdPais").append("<option selected value='" + value.IdPais + "'>" + value.NombrePais + "</option>")
                        } else {
                            $("#IdPais").append("<option value='" + value.IdPais + "'>" + value.NombrePais + "</option>")
                        }
                    }
                });
            });

            $.ajax({
                type: "get",
                url: "Controlador/controlador_ubicaciones.php",
                // url: "../../../Controlador/controlador_empleados.php",
                data: { accion: 'listar_estados' },
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

    $("#editado").on("click", "button#grabar", function(e) {
        e.preventDefault();
        var datos = $("#formCrearCiudad").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "Controlador/controlador_ubicaciones.php",
            // url: "../../../Controlador/controlador_ubicaciones.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            if (resultado.respuesta) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'La ciudad fue grabada con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })
                $("#titulo").html("Gestión de Ciudades");
                $("#editado").html('');
                $("#editado").hide();
                $(".listado").show();
                $("#crear").show();
                dt.page('last').draw('page');
                dt.ajax.reload(null, false);
            } else {
                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Ocurrió un error al grabar',
                    showConfirmButton: false,
                    timer: 1500
                });

            }
        });
    });

    $("#editado").on("click", "button#actualizar", function(e) {
        e.preventDefault();
        var datos = $("#formModificarCiudad").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "Controlador/controlador_ubicaciones.php",
            // url: "../../../Controlador/controlador_ubicaciones.php",
            data: datos,
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
                $("#titulo").html("Gestión de Ciudades");
                $("#editado").html('');
                $("#editado").hide();
                $(".listado").show();
                $("#crear").show();
                dt.ajax.reload(null, false);
            } else {
                swal({
                    type: 'error',
                    title: '¡Error!',
                    text: 'Revise la información'
                })
            }
        });
    })

}