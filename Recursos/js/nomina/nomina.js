function nomina() {

    $("#edicion1").hide();
    $("#listado1").hide();
    $("#listado2").hide();
    $("#regresar").hide();

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
        var codigo = $(this).data("codigo");
        var dt2 = $("#tabla2").DataTable({
            ajax: {
                type: "get",
                url: "Controlador/controlador_nomina.php",
                data: { codigo: codigo, accion: 'consultar_detalle' },
                dataType: "json"
            },
            "columns": [
                { "data": "IdDetalleNomina" },
                { "data": "IdNomina" },
                { "data": "IdEmpleado" },
                { "data": "NombreEmpleado" },
                { "data": "NombreSede" },
                { "data": "Comisiones" },
                { "data": "SueldoBase" },
                { "data": "TotalSueldo" }
            ]
        });
    });


}