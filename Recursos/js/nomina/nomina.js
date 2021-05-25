function nomina() {

    $("#edicion1").hide();
    $("#listado1").hide();
    $("#listado2").hide();
    $("#regresar").hide();
    $("#informe").hide();

    $("#generar").click(function() {
        $.ajax({
            type: "get",
            url: "Controlador/controlador_nomina.php",
            data: { accion: 'generar_nomina' },
            dataType: "json"
        }).done(function(resultado) {
            console.log(resultado);
            if (resultado.respuesta == 'existe') {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'La Nómina Fue Generada Exitosamente',
                    showConfirmButton: false,
                    timer: 3500
                })
            } else if (resultado.respuesta == 'no existe') {
                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Error al generar la Nómina, ya fue generada anteriormente',
                    showConfirmButton: false,
                    timer: 3500
                });
            }

        });
    })
    $("#editado").on("click", "button#cerrar", function() {
        $("#listado1").hide();
        $("#consultar").show();
        $("#generar").show();
        $("#edicion1").hide();
        $("#listado2").hide();
        $("#regresar").hide();
        $("#informe").hide();
    });

    $("#consultar").click(function() {
        $("#edicion1").show();
    });


    $("#buscar").click(function() {
        $("#listado1").show();
        $("#consultar").hide();
        $("#generar").hide();

        fecha = $("#FechaNomina").val();
        var dt1 = $("#tabla1").DataTable({
            ajax: {
                type: "get",
                url: "Controlador/controlador_nomina.php",
                data: { fecha: fecha, accion: 'lista' },
                dataType: "json"
            },
            "columns": [
                { "data": "IdNomina" },
                { "data": "FechaNomina" },
                { "data": "TotalNomina" },
                {
                    "data": "IdNomina",
                    render: function(data) {
                        return '<a href="#" data-codigo="' + data +
                            '" class="btn btn-dark btn-sm ver"> <i class="fa fa-plus"> Ver Detalle Nómina</i></a>'
                    }
                }
            ]
        });
    });

    $(".contenedor1").on("click", "a.ver", function() {
        $("#edicion1").hide();
        $("#listado1").hide();
        $("#listado2").show();
        $("#regresar").show();
        $("#informe").show();
        var codigo = $(this).data("codigo");
        var dt2 = $("#tabla2").DataTable({
            ajax: {
                type: "get",
                url: "Controlador/controlador_nomina.php",
                data: { codigo: codigo, accion: 'consultar_detalle' },
                dataType: "json"
            },
            "dom": 'lBfrtip',

            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            "buttons": [{
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> ',
                    titleAttr: 'Exportar a Excel',
                    className: 'btn btn-success ml-1'
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf "></i> ',
                    titleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger'
                }
            ],
            "columns": [
                { "data": "IdDetalleNomina" },
                { "data": "IdNomina" },
                { "data": "IdEmpleado" },
                { "data": "NombreEmpleado" },
                { "data": "NombreSede" },
                { "data": "Comisiones" },
                { "data": "SueldoBase" },
                { "data": "TotalSueldo" },
                {
                    "data": "IdNomina",
                    render: function(data) {
                        return '<a href="#" data-codigo="' + data +
                            '" class="hidden idnomina"> <i class="fa fa-plus"> Ver Detalle Nómina</i></a>'
                    }
                }
            ]
        });
    });


    $("#informe").click(function() {

        var codigo = $(".idnomina").data("codigo");
        $.ajax({
            type: "get",
            url: "Controlador/controlador_nomina.php",
            data: { codigo: codigo, accion: 'informe' },
            dataType: "json"
        });


    });
    // $("#informe").click(function() {
    //     DescargarPDF('reporte', 'Archivo');


    // });

}