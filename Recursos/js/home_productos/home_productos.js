function productos() {
    $.ajax({
        type: "post",
        url: "../../Controlador/controlador_inventarioprodterminado.php",
        data: { accion: 'listar' },
        dataType: "json"
    }).done(function(resultado) {
        $.each(resultado.data, function(index, value) {
            $("#menu .menu-container").append("<div class='col-lg-6 menu-item filter-starters'>" + value.Foto +
                "<div class = 'menu-content'><a href = '#'>" + value.NombreProducto + "</a><span>" + value.ValorUnitario + "</span ></div></div>")
        });
    });
}