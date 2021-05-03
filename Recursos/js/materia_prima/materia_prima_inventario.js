function materiaprima() {
    
    var dt = $("#tabla").DataTable({
        "ajax": "../../../Controlador/controlador_inventarioMP.php?accion=listar",
        // "ajax": "Controlador/controlador_inventarioMP.php?accion=listar",

        "columns": [
            { "data": "IdMateriaPrima" },
            { "data": "NombreMateriaPrima" },
            { "data": "Stock" },
            { "data": "NombreMedida" },
            {
                "data": "IdMateriaPrima",
                render: function (data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
            }
        ]
    });

    $("#nuevo").on("click", function () {
        $(this).hide();
        $(".card-title").html("Ingresar Compra de Materia Prima");
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $(".listado").addClass('hide');
        $(".listado").removeClass('show');
        $("#editar").load('../../../Vista/php/inventarioMateriaPrima/view_agregar_invmateriaPrima.php', function () {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_inventarioMP.php",
                data: { accion: 'listar' },
                dataType: "json"
            }).done(function (resultado) {
                $("#editar #Productos").append("<option>Seleccione el Producto</option>")
                    ;
                $.each(resultado.data, function (index, value) {
                    $("#editar #Productos").append("<option value='" + value.IdMateriaPrima + "'>" + value.NombreMateriaPrima + "</option>")
                });
                inventario(dt);
            });
        });

    });



    // var c=document.getElementById(Productos);
    // console.log($("select[id=Productos]"));


    //view_agregar_invmateriaPrima.php
}
function inventario(dt) {
    $("select[id=Productos]").change(function () {

        var prod = $('select[name=IdMateriaPrima]').val();
        console.log(prod);
        $.ajax({
            type: "post",
            url: "../../../Controlador/controlador_inventarioMP.php",
            data: { id: prod, accion: 'consultar' },
            dataType: "json"
        }).done(function (resultado) {
            console.log(resultado.data[0].Stock);
            $("#Cantidad_Actual1").val(resultado.data[0].Stock);
            $("#Cantidad_Actual").val(resultado.data[0].Stock);
            $("#Medida").val(resultado.data[0].NombreMedida);

        });
    });
    $("#finventariomp").on("submit", function (e) {
        e.preventDefault();
        var datos = $(this).serialize();
        $.ajax({
            type: "post",
            url: "../../../Controlador/controlador_inventarioMP.php",
            data: datos,
            dataType: "json"
        }).done(function (resultado) {
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