function productos() {
    var cant_prod;
    $.ajax({
        type: "post",
        url: "../../Controlador/controlador_inventarioprodterminado.php",
        data: { accion: 'listar' },
        dataType: "json"
    }).done(function(resultado) {
        $.each(resultado.data, function(index, value) {
            $("#menu .menu-container").append("<div class='col-lg-6 menu-item '>" + value.Foto +
                "<div class = 'menu-content'><a href = '#'>" + value.NombreProducto + "</a><span>" + value.ValorUnitario + "</span></div><div class='menu-ingredients ' id='" + value.IdProducto + "'><p style='float:left;'>Cantidad disponible:</p><p style='float:left;' class='ml-2 mr-4 prod'>" + value.CantidadProducto + "</p><button class='btn btn-danger btn-sm mr-2' style='float: right;'><i class='fas fa-cart-plus'></i></button><input class='spinner mr-2' type='number' min='0' max='" + value.CantidadProducto + "' style='float:right; width:50px;'></div></div>")
        });
    });

    $(function() {
        console.log($("input[class=spinner]"));
        $("input[class=spinner]").spinner();
    });
}