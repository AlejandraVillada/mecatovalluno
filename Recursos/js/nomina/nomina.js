function nomina() {

    $("#generar").click(function() {
        $.ajax({
            type: "get",
            // url: "Controlador/controlador_proveedor.php",
            url: "../../../Controlador/controlador_nomina.php",
            data: { accion: 'generar_nomina' },
            dataType: "json"
        }).done(function(resultado) {
            console.log(resultado);
        });
    })






}