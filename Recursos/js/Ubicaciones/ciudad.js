function ciudad() {
    var dt = $("#tabla").DataTable({
        "ajax": "../../../Controlador/controlador_ubicaciones.php?accion=listar_ciudad",
        "columns": [
            { "data": "IdCiudad" },
            { "data": "NombrePais" },
            { "data": "NombreCiudad" },
            {
                "data": "IdCiudad",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"><i class="fa fa-edit"></i></a>'
                }
            }
        ]

    });

    $("#editado").hide();

    $("#crear").on("click", function() {
        $("#titulo").html("Ingresar Ciudad");
        $("#editado").show();
        $(".listado").hide();
        $("#editado").load('../../../Vista/php/Ubicaciones/formCrearCiudad.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_ubicaciones.php",
                data: { accion: 'listar_pais' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    $("#editado #IdPais").append("<option value='" + value.IdPais + "'>" + value.NombrePais + "</option>")
                });
            });
        });

    });

    $(".contenido").on("click", "a.editar", function() {
        var codigo = $(this).data("codigo");
        var pais;
        $("#titulo").html("Modificar Ciudad");
        $("#editado").show();
        $(".listado").hide();
        $("#editado").load('../../../Vista/php/Ubicaciones/formModificarCiudad.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_ubicaciones.php",
                data: { codigo: codigo, accion: 'consultar_ciudad' },
                dataType: "json"
            }).done(function(ciudad) {
                if (ciudad.respuesta === "no existe") {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Ciudad no existe!'
                    })
                } else {
                    $("#IdCiudad").val(ciudad.codigo);
                    $("#NombreCiudad").val(ciudad.ciudad);
                    pais = ciudad.pais;
                }
            });

            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_ubicaciones.php",
                data: { accion: 'listar_pais' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    if (pais === value.IdPais) {
                        $("#IdPais").append("<option selected value='" + value.IdPais + "'>" + value.NombrePais + "</option>")
                    } else {
                        $("#IdPais").append("<option value='" + value.IdPais + "'>" + value.NombrePais + "</option>")
                    }
                });
            });
        });

    });

    $("#editado").on("click", "button#grabar", function() {
        var datos = $("#formCrearCiudad").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_ubicaciones.php",
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
        var datos = $("#formModificarCiudad").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_ubicaciones.php",
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