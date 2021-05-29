function materiaprima() {

    var dt = $("#tabla").DataTable({
        // "ajax": "../../../Controlador/controlador_inventarioMP.php?accion=listar",
        "ajax": "Controlador/controlador_inventarioMP.php?accion=listar",
        "dom": 'Bfrtip',

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "buttons": [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel "></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
                title: 'Inventario MateriaPrima'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf "></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                title: 'Inventario MateriaPrima'


            }
        ],

        "columns": [
            { "data": "IdMateriaPrima" },
            { "data": "NombreMateriaPrima" },
            { "data": "Stock" },
            { "data": "NombreMedida" },
            {
                "data": "IdMateriaPrima",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm agregar"> <i class="fa fa-edit"></i></a>'
                }
            }
        ]
    });

    $("#nuevo").on("click", function() {
        //$(this).hide();
        $("#titulo").html("Ingresar Compra de Materia Prima");
        $("#editar").addClass('show');
        $("#nuevo").hide();
        $("#editar").removeClass('hide');
        $(".listado").addClass('hide');
        $(".listado").removeClass('show');
        $("#editar").load('Vista/php/InventarioMateriaPrima/view_agregar_invmateriaPrima.php', function() {
            // $("#editar").load('../../../Vista/php/inventarioMateriaPrima/view_agregar_invmateriaPrima.php', function () {
            $.ajax({
                type: "post",
                url: "Controlador/controlador_inventarioMP.php",
                // url: "../../../Controlador/controlador_inventarioMP.php",
                data: { accion: 'listar' },
                dataType: "json"
            }).done(function(resultado) {
                $("#editar #Productos").append("<option>Seleccione el Producto</option>");
                $.each(resultado.data, function(index, value) {
                    $("#editar #Productos").append("<option value='" + value.IdMateriaPrima + "'>" + value.NombreMateriaPrima + "</option>")
                });
                inventario(dt);
            });
        });

    });
    $(".table").on("click", "a.agregar", function() {
        var codigo = $(this).data("codigo");
        //  console.log(codigo);
        $("#titulo").html("Modificar Compra de Materia Prima");
        $("#editar").addClass('show');
        $("#nuevo").hide();
        $("#editar").removeClass('hide');
        $(".listado").addClass('hide');
        $(".listado").removeClass('show');
        $("#editar").load('Vista/php/InventarioMateriaPrima/view_agregar_invmateriaPrima.php', function() {
            // $("#editar").load('../../../Vista/php/inventarioMateriaPrima/view_agregar_invmateriaPrima.php', function () {
            $.ajax({
                type: "post",
                url: "Controlador/controlador_inventarioMP.php",
                // url: "../../../Controlador/controlador_inventarioMP.php",
                data: { accion: 'listar' },
                dataType: "json"
            }).done(function(resultado) {
                $("#editar #Productos").append("<option>Seleccione el Producto</option>");
                $.each(resultado.data, function(index, value) {
                    if (value.IdMateriaPrima == codigo) {
                        $("#editar #Productos").append("<option selected disabled value='" + value.IdMateriaPrima + "'>" + value.NombreMateriaPrima + "</option>")
                    } else {
                        $("#editar #Productos").append("<option value='" + value.IdMateriaPrima + "'>" + value.NombreMateriaPrima + "</option>")

                    }
                });

            });

            $.ajax({
                type: "post",
                url: "Controlador/controlador_inventarioMP.php",
                // url: "../../../Controlador/controlador_inventarioMP.php",
                data: { id: codigo, accion: 'consultar' },
                dataType: "json"
            }).done(function(resultado) {
                console.log(resultado.data[0].Stock);
                $("#Cantidad_Actual1").val(resultado.data[0].Stock);
                $("#Cantidad_Actual").val(resultado.data[0].Stock);
                $("#Medida").val(resultado.data[0].NombreMedida);

            });

            inventario(dt);

        });

    });

    $("#editar").on("click", "button#cerrar", function() {
        $("#editar").addClass('hide');
        $("#nuevo").show();
        $("#titulo").html("Inventario de Materia Prima");
        $("#editar").removeClass('show');
        $(".listado").addClass('show');
        $(".listado").removeClass('hide');
    });



}

function inventario(dt) {
    $("select[id=Productos]").change(function() {

        var prod = $('select[name=IdMateriaPrima]').val();
        // console.log(prod);
        $.ajax({
            type: "post",
            url: "Controlador/controlador_inventarioMP.php",
            // url: "../../../Controlador/controlador_inventarioMP.php",
            data: { id: prod, accion: 'consultar' },
            dataType: "json"
        }).done(function(resultado) {
            console.log(resultado.data[0].Stock);
            $("#Cantidad_Actual1").val(resultado.data[0].Stock);
            $("#Cantidad_Actual").val(resultado.data[0].Stock);
            $("#Medida").val(resultado.data[0].NombreMedida);

        });
    });
    $("#finventariomp").on("submit", function(e) {
        e.preventDefault();
        var datos = $(this).serialize();
        $.ajax({
            type: "post",
            // url: "../../../Controlador/controlador_inventarioMP.php",
            url: "Controlador/controlador_inventarioMP.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            console.log(resultado);
            if (resultado.data == 1) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'Se actualizó el inventario',
                    showConfirmButton: false,
                    timer: 1500
                })
                $("#editar").addClass('hide');
                $("#editar").removeClass('show');
                $(".listado").addClass('show');
                $(".listado").removeClass('hide');
            }
            dt.ajax.reload();

        });
    });
}
