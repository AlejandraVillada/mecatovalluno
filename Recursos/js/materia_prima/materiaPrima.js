function materiaPrima() {

    var dt = $("#tabla").DataTable({
        "ajax": "../../../Controlador/controlador_mp.php?accion=listar",
        "columns": [
            { "data": "IdMateriaPrima" },
            { "data": "NombreMateriaPrima" },
            { "data": "Stock" },
            { "data": "NombreMedida" },
            {
                "data": "IdMateriaPrima",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
            }
        ]

    });

    // $(".regresar").on("click", function() {
    //     $("#titulo").html("Gestión Materia Prima");
    //     $("#editado").hide();
    //     $(".listado").show();
    //     $(".listado").load("../../../Vista/php/MateriaPrima/view_MateriaPrima.php");
    // });

    $("#editado").hide();

    $("#crear").on("click", function() {
        $("#titulo").html("Ingresar Nueva Materia Prima");
        $("#editado").show();
        $(".listado").hide();
        $("#editado").load('../../../Vista/php/MateriaPrima/FormCrearMP.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_mp.php",
                data: { accion: 'listar_medidas' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    $("#editado #IdMedida").append("<option value='" + value.IdMedida + "'>" + value.NombreMedida + "</option>")
                });
            });
        });

    });

    $(".contenido").on("click", "a.editar", function() {
        console.log("algo");
        var codigo = $(this).data("codigo");
        var medida;
        $("#titulo").html("Modificar Campo Materia Prima");
        $("#editado").show();
        $(".listado").hide();
        $("#editado").load('../../../Vista/php/MateriaPrima/FormModificarMP.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_mp.php",
                data: { codigo: codigo, accion: 'consultar' },
                dataType: "json"
            }).done(function(mp) {
                console.log(mp);
                if (mp.respuesta === "no existe") {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Materia Prima no existe!'
                    })
                } else {
                    $("#IdMateriaPrima").val(mp.codigo);
                    $("#NombreMateriaPrima").val(mp.materiaPrima);
                    $("#Stock").val(mp.stock);
                    medida = mp.medida;
                }
            });

            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_mp.php",
                data: { accion: 'listar_medidas' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    if (medida === value.IdMedida) {
                        $("#IdMedida").append("<option selected value='" + value.IdMedida + "'>" + value.NombreMedida + "</option>")
                    } else {
                        $("#IdMedida").append("<option value='" + value.IdMedida + "'>" + value.NombreMedida + "</option>")
                    }
                });
            });
        });

    });

    $("#editado").on("click", "button#grabar", function() {
        var datos = $("#formCrearMP").serialize();
        console.log(datos);
        //console.log(datos);
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_mp.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            if (resultado.respuesta) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'La materia prima fue grabada con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })
                $("#titulo").html("Gestión Materia Prima");
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
        var datos = $("#formModificarMP").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_mp.php",
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
                $("#titulo").html("Gestión Materia Prima");
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