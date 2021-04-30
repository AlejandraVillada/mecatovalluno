function materiaprima(){
    $.ajax({
        type:"get",
        url:"../../../Controlador/controlador_inventarioMP.php?accion=listar",
        
        dataType:"json"
     }).done(function( resultado ) {                    ;
        // console.log(resultado);
     });
    var dt = $("#tabla").DataTable({
        "ajax": "../../../Controlador/controlador_inventarioMP.php?accion=listar",

        "columns": [
            { "data": "IdMateriaPrima" },
            { "data": "NombreMateriaPrima" },
            { "data": "Stock" },
            { "data": "Medida" },
            {
                "data": "IdMateriaPrima",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' +
                        '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
            }
        ]
    });

    $(".card").on("click","#nuevo", function(){
        $(this).hide();
        $(".card-title").html("Crear Producto");
        $("#editar").addClass('show');
        $("#editar").removeClass('hide');
        $("#tabla").addClass('hide');
        $("#tabla").removeClass('show');
        $("#editar").load('../../../Vista/php/inventarioMateriaPrima/view_agregar_invmateriaPrima.php');
        
    })
    //view_agregar_invmateriaPrima.php
}