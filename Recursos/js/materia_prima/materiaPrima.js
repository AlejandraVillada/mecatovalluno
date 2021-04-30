function materiaPrima() {
    var dt = $("#tabla").DataTable({
        "ajax": "./Controlador/controlador_mp.php?accion=listar",
        "columns": [
            { "data": "IdMateriaPrima" },
            { "data": "NombreMateriaPrima" },
            { "data": "Stock" },
            { "data": "Medida" },
            {
                "data": "IdMateriaPrima",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
            }
        ]

    });
    materiaPrima();
}