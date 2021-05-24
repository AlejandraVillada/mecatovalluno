function pais() {
    var dt = $("#tabla").DataTable({

        // "ajax": "../../../Controlador/controlador_ubicaciones.php?accion=listar_pais",
        "ajax": "Controlador/controlador_ubicaciones.php?accion=listar_pais",
        "dom": 'Bfrtip',

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "buttons": [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
                title: 'Paises'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf "></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                title: 'Paises'


            }
        ],

        "columns": [
            { "data": "IdPais" },
            { "data": "NombrePais" },
            {
                "data": "IdPais",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"><i class="fa fa-edit"></i></a>'
                }
            }
        ]

    });

    $("#editado").hide();

    $("#crear").on("click", function() {
        $("#titulo").html("Registrar País");
        $("#editado").show();
        $(".listado").hide();
        $("#crear").hide();
        $("#editado").load('Vista/php/Ubicaciones/formCrearPais.php')
            // $("#editado").load('../../../Vista/php/Ubicaciones/formCrearPais.php')

    });

    $(".contenido").on("click", "a.editar", function() {
        var codigo = $(this).data("codigo");
        $("#titulo").html("Modificar Datos de País");
        $("#editado").show();
        $(".listado").hide();
        $("#editado").load('Vista/php/Ubicaciones/formModificarPais.php', function() {
            // $("#editado").load('../../../Vista/php/Ubicaciones/formModificarPais.php', function() {
            $.ajax({
                type: "get",
                url: "Controlador/controlador_ubicaciones.php",
                // url: "../../../Controlador/controlador_ubicaciones.php",
                data: { codigo: codigo, accion: 'consultar_pais' },
                dataType: "json"
            }).done(function(pais) {
                if (pais.respuesta === "no existe") {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'El Pais no existe'
                    })
                } else {
                    $("#IdPais").val(pais.codigo);
                    $("#NombrePais").val(pais.pais);
                }
            });


        });

    });

    $("#editado").on("click", "button#grabar", function() {
        var datos = $("#formCrearPais").serialize();
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
                    title: 'El Pais fue grabado con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })
                $("#titulo").html("Gestión de Paises");
                $("#editado").html('');
                $("#editado").hide();
                $(".listado").show();
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

    $("#editado").on("click", "button#actualizar", function() {
        var datos = $("#formModificarPais").serialize();
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
                $("#titulo").html("Gestión de Paises");
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