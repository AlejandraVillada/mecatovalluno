function productoterminado() {
    var dt1;
    var dt;
    var d = "si";
    $("#detalle").addClass('hide');
    dt = $("#tabla").DataTable({
        "ajax": "../../../Controlador/controlador_inventarioprodterminado.php?accion=listar",
        // "ajax": "Controlador/controlador_inventarioprodterminado.php?accion=listar",

        "columns": [
            {
                "data": "IdProducto",
                render: function (data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm ver"> <i class="fa fa-plus"></i></a>'
                }
            },
            { "data": "IdProducto" },
            { "data": "NombreProducto" },
            { "data": "CantidadProducto" },
            {
                "data": "IdProducto",
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
        $("#editar").load('../../../Vista/php/ProductoTerminado/FormCrearPT.php', function () {
            // $("#editar").load('../../../Vista/php/inventarioMateriaPrima/view_agregar_invmateriaPrima.php', function () {
            $("#editar #formCrearPT").on("submit", function (e) {
                console.log("h");
                e.preventDefault();
                var datos = $(this).serialize();
                $.ajax({
                    type: "post",
                    url: "../../../Controlador/controlador_inventarioprodterminado.php",
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
        });
    });


    $(".table").on("click", "a.ver", function () {
        $("#detalle").addClass('show');
        if (d == "no") {
            dt1.destroy();
        }
        codigo = $(this).data("codigo");

        dt1 = $("#tabla1").DataTable({

            "ajax": "../../../Controlador/controlador_inventarioprodterminado.php?accion=consultar&&id=" + codigo + "",
            // "ajax": "Controlador/controlador_inventarioprodterminado.php?accion=listar",

            "columns": [

                { "data": "IdDetalleProducto" },
                { "data": "NombreMateriaPrima" },
                { "data": "Cantidad" },
                { "data": "NombreMedida" },
                { "data": "DescripcionProducto" },
                {
                    "data": "IdDetalleProducto",
                    render: function (data) {
                        return '<a href="#" data-codigo="' + data +
                            '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                    }
                }
            ]
        });
        d = "no";



    });


    $(".table").on("click", "a.editar", function (e) {
        e.preventDefault();

        var codigo = $(this).data("codigo");
        console.log(codigo + "hola");
        $(".card-title").html("Modificar Compra de Materia Prima");
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $(".listado").addClass('hide');
        $(".listado").removeClass('show');
        $("#editar").load('../../../Vista/php/ProductoTerminado/FormModificarPT.php', function () {
            // $("#editar").load('Vista/php/inventarioMateriaPrima/view_agregar_invmateriaPrima.php', function () {
            $.ajax({
                type: "post",
                // url: "Controlador/controlador_inventarioprodterminado.php",
                url: "../../../Controlador/controlador_inventarioprodterminado.php",
                data: { id: codigo, accion: 'consultarprod' },
                dataType: "json"
            }).done(function (resultado) {
                console.log(resultado.data[0]);
                $("#IdProducto").val(resultado.data[0].IdProducto);
                $("#IdProducto1").val(resultado.data[0].IdProducto);
                $("#CantidadProducto").val(resultado.data[0].CantidadProducto);
                $("#NombreProducto").val(resultado.data[0].NombreProducto);

            });
            $("#editar #formModPT").on("submit", function (e) {
                e.preventDefault();
console.log("hooo");
                var datos = $(this).serialize();
                $.ajax({
                    type: "post",
                    url: "../../../Controlador/controlador_inventarioprodterminado.php",
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



        });

    });

}