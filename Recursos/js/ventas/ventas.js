function ventas() {

    $("#estaventas").hide();
    $("#contenidos").show();
    // $("#contenidos").load("../../../Vista/php/Ventas/FormCrearVenta.php")

    $("#nuevo").on("click", function (e) {
        $("#contenidos").load("../../../Vista/php/Ventas/FormCrearVenta.php", function (e) {
            $(" #contenidos #formcli").on("submit", function (e) {
                console.log("hol");
                e.preventDefault();
                var nombre = document.getElementById('nombre');
                var IdCliente = document.getElementById('cedula');
                var cedula = document.getElementById('cedula');
                var email=document.getElementById('email');
                var direccion= document.getElementById('direccion');
                var telefono=document.getElementById('telefono');
                var datos = $("#formcli").serialize();
                console.log(datos);
                $.ajax({
                    type: "get",
                    // url: "../../../Controlador/controlador_detalleproducto.php",
                    url: "../../../Controlador/controlador_clientes.php",
                    data: datos,
                    dataType: "json"
                }).done(function (resultado) {
                    if (resultado.estado == 2) {
                        swal({
                            position: 'center',
                            type: 'error',
                            title: 'El cliente no está Activo',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        nombre.innerText = "";
                        cedula.innerText = "";
                        email.innerText="";
                        direccion.innerText="";
                        telefono.innerText="";
                    } if (resultado.respuesta == "no existe") {
                        swal({
                            position: 'center',
                            type: 'error',
                            title: 'El cliente no Existe',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        nombre.innerText="";
                        cedula.innerText="";
                        email.innerText="";
                        direccion.innerText="";
                        telefono.innerText="";
                    }
                    else {
                        nombre.innerText = resultado.nombre;
                        cedula.innerText = resultado.codigo;
                        IdCliente.innerText = resultado.codigo;
                        email.innerText = resultado.email;
                        direccion.innerText = resultado.email;
                        telefono.innerText = resultado.telefono;
                        $.ajax({
                            type: "post",
                            // url: "../../../Controlador/controlador_detalleproducto.php",
                            url: "../../../Controlador/controlador_ventas.php",
                            data:{ accion:"listarProdHome"},
                            dataType: "json"
                        }).done(function (resultado) {
                            
                            console.log(resultado);
                            
                        });
                    }
                });
            })
           
        })//terminaload


    })


}


function tablaventasdia() {
    dt1 = $("#tabla").DataTable({

        "ajax": "../../../Controlador/controlador_ventas.php?accion=listarestadisticas",
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
}