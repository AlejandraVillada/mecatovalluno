function sede() {
    var dt = $("#tabla").DataTable({
        // "ajax": "../../../Controlador/controlador_ubicaciones.php?accion=listar_sede",
        "ajax": "Controlador/controlador_ubicaciones.php?accion=listar_sede",
        "dom": 'Bfrtip',

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "buttons": [{
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel "></i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            title: 'Sedes'
        },
        {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf "></i> ',
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger',
            title: 'Sedes'


        }
        ],

        "columns": [
            { "data": "IdSede" },
            { "data": "NombreCiudad" },
            { "data": "NombreSede" },
            {
                "data": "IdSede",
                render: function (data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"><i class="fa fa-edit"></i></a>'
                }
            }
        ]

    });

    $("#editado").hide();

    $("#crear").on("click", function () {
        $("#titulo").html("Ingresar Sede");
        $("#editado").show();
        $(".listado").hide();
        $("#editado").load('Vista/php/Ubicaciones/formCrearSede.php', function () {
            // $("#editado").load('../../../Vista/php/Ubicaciones/formCrearSede.php', function() {
            $.ajax({
                type: "get",
                url: "Controlador/controlador_ubicaciones.php",
                // url: "../../../Controlador/controlador_ubicaciones.php",
                data: { accion: 'listar_ciudad' },
                dataType: "json"
            }).done(function (resultado) {
                $.each(resultado.data, function (index, value) {
                    $("#editado #IdCiudad").append("<option value='" + value.IdCiudad + "'>" + value.NombreCiudad + "</option>")
                });
            });
        });

    });

    $(".contenido").on("click", "a.editar", function () {
        var codigo = $(this).data("codigo");
        var ciudad;
        $("#titulo").html("Modificar Sede");
        $("#editado").show();
        $(".listado").hide();
        $("#editado").load('Vista/php/Ubicaciones/formModificarSede.php', function () {
            // $("#editado").load('../../../Vista/php/Ubicaciones/formModificarSede.php', function() {
            $.ajax({
                type: "get",
                url: "Controlador/controlador_ubicaciones.php",
                // url: "../../../Controlador/controlador_ubicaciones.php",
                data: { codigo: codigo, accion: 'consultar_sede' },
                dataType: "json"
            }).done(function (sede) {
                if (sede.respuesta === "no existe") {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Sede no existe!'
                    })
                } else {
                    $("#IdSede").val(sede.codigo);
                    $("#NombreSede").val(sede.sede);
                    ciudad = sede.ciudad;
                }
            });

            $.ajax({
                type: "get",
                url: "Controlador/controlador_ubicaciones.php",
                // url: "../../../Controlador/controlador_ubicaciones.php",
                data: { accion: 'listar_ciudad' },
                dataType: "json"
            }).done(function (resultado) {
                $.each(resultado.data, function (index, value) {
                    if (ciudad === value.IdCiudad) {
                        $("#IdCiudad").append("<option selected value='" + value.IdCiudad + "'>" + value.NombreCiudad + "</option>")
                    } else {
                        $("#IdCiudad").append("<option value='" + value.IdCiudad + "'>" + value.NombreCiudad + "</option>")
                    }
                });
            });
        });

    });
    $("#editado").on("click", "button#grabar", function () {
        var datos = $("#formCrearSede").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "Controlador/controlador_ubicaciones.php",
            // url: "../../../Controlador/controlador_ubicaciones.php",
            data: datos,
            dataType: "json"
        }).done(function (resultado) {
            if (resultado.respuesta) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'La sede fue grabada con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })
                $("#titulo").html("Gestión de Sedes");
                $("#editado").html('');
                $("#editado").hide();
                $(".listado").show();
                dt.page('last').draw('page');
                dt.ajax.reload(null, false);
            } else {
                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Ocurrió un erro al grabar',
                    showConfirmButton: false,
                    timer: 1500
                });

            }
        });
    });

    $("#editado").on("click", "button#actualizar", function () {
        var datos = $("#formModificarSede").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "Controlador/controlador_ubicaciones.php",
            // url: "../../../Controlador/controlador_ubicaciones.php",
            data: datos,
            dataType: "json"
        }).done(function (resultado) {

            if (resultado.respuesta) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'Se actualizaron los datos correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                $("#titulo").html("Gestión de Sedes");
                $("#editado").html('');
                $("#editado").hide();
                $(".listado").show();
                dt.ajax.reload(null, false);
            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        });
    })
}