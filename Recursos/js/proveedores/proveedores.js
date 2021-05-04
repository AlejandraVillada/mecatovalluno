function proveedor() {

    var dt = $("#tabla1").DataTable({
        "ajax": "../../../Controlador/controlador_proveedor.php?accion=lista_proveedor",
        "columns": [
            { "data": "IdProveedor" },
            { "data": "NombreProveedor" },
            {
                "data": "IdProveedor",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
            }
        ]
    });

}

function det_proveedor() {

    var dt = $("#tabla2").DataTable({
        "ajax": "../../../Controlador/controlador_proveedor.php?accion=lista_det_proveedor",
        "columns": [
            { "data": "IdDetalleProveedor" },
            { "data": "IdProveedor" },
            { "data": "IdMateriaPrima" },
            {
                "data": "IdDetalleProveedor",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
            }
        ]
    });

}