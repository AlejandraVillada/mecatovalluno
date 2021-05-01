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

    $(".editar").hide();

    $("#crear").click(function() {
        $("#titulo").html("Ingresar Nueva Materia Prima");
        $(".editar").show();
        $(".listado").hide();
        $(".editar").load('../../../Vista/php/MateriaPrima/FormCrearMP.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_mp.php",
                data: { accion: 'listar_medidas' },
                dataType: "json"
            }).done(function(resultado) {;
                $.each(resultado.data, function(index, value) {
                    $("#Medida").append("<option value='" + value.IdMedida + "'>" + value.NombreMedida + "</option>")
                });
            });
        });

    });


}