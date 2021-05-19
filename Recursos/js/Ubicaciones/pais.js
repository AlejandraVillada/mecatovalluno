function pais() {
    var dt = $("#tabla").DataTable({

        // "ajax": "../../../Controlador/controlador_ubicaciones.php?accion=listar_pais",
        "ajax": "Controlador/controlador_ubicaciones.php?accion=listar_pais",
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
        $("#titulo").html("Ingresar Pais");
        $("#editado").show();
        $(".listado").hide();
        $("#editado").load('Vista/php/Ubicaciones/formCrearPais.php')
            // $("#editado").load('../../../Vista/php/Ubicaciones/formCrearPais.php')

    });

    $(".contenido").on("click", "a.editar", function() {
        var codigo = $(this).data("codigo");
        $("#titulo").html("Modificar Datos de Pais");
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
                        text: 'El Pais no existe!'
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
                    title: 'El Pais fue grabada con éxito',
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
                    title: 'Ocurrió un erro al grabar',
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
                    title: 'Se actaulizaron los datos correctamente',
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