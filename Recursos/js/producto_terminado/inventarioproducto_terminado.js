function inventarioproductoterminado() {

    dt1 = $("#tabla").DataTable({

        "ajax": "../../../Controlador/controlador_inventarioprodterminado.php?accion=listarestadisticas",
        // "ajax": "Controlador/controlador_produccion.php?accion=listar",
        "dom": 'Bfrtip',

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "buttons": [{
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel "></i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
            title: 'Detalle Produccion'
        },
        {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf "></i> ',
            titleAttr: 'Exportar a PDF',
            className: 'btn btn-danger',
            title: 'Detalle Produccion',

        }
        ],
        "columns": [

            { "data": "IdProducto" },
            { "data": "NombreProducto" },
            { "data": "CantidadProductoTerminado" },
            { "data": "vendido" },
            { "data": "disponible" },
            { "data": "DiaProduccion" },
            { "data": "NombreSede" },
            { "data": "NombreCiudad" }
           
        ]
    });
    d = "no";

    $("nuevo").on("click", function (e) {

        
        
    })

}