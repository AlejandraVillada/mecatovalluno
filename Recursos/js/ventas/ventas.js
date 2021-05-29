function ventas() {

    $("#estaventas").hide();
    $("#contenidos").show();
    // $("#contenidos").load("../../../Vista/php/Ventas/FormCrearVenta.php")

    $("#nuevo").on("click", function (e) {
        // $("#contenidos").load("../../../Vista/php/Ventas/FormCrearVenta.php", function (e) {
        $("#contenidos").load("Vista/php/Ventas/FormCrearVenta.php", function (e) {

            $(" #contenidos #formcli").on("submit", function (e) {
                console.log("hol");
                e.preventDefault();
                var nombre = document.getElementById('nombre');
                var IdCliente = document.getElementById('IdCliente1');
                var IdCliente1 = document.getElementById('IdCliente');
                var cedula = document.getElementById('cedula');
                var email = document.getElementById('email');
                var direccion = document.getElementById('direccion');
                var telefono = document.getElementById('telefono');
                var datos = $("#formcli").serialize();
                console.log(datos);
                $.ajax({
                    type: "get",
                    url: "Controlador/controlador_clientes.php",
                    // url: "../../../Controlador/controlador_clientes.php",
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
                        email.innerText = "";
                        direccion.innerText = "";
                        telefono.innerText = "";
                    } else if (resultado.respuesta == "no existe") {
                        swal({
                            position: 'center',
                            type: 'error',
                            title: 'El cliente no Existe',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        nombre.innerText = "";
                        cedula.innerText = "";
                        email.innerText = "";
                        direccion.innerText = "";
                        telefono.innerText = "";
                    }
                    else {

                        nombre.innerText = resultado.nombre;
                        cedula.innerText = resultado.codigo;

                        email.innerText = resultado.email;
                        direccion.innerText = resultado.email;
                        telefono.innerText = resultado.telefono;

                        IdCliente.setAttribute("value", resultado.codigo);
                        IdCliente1.setAttribute("value", resultado.codigo);

                        var productos = new Array();
                        var c = 0;
                        var totalventa = 0;
                        $.ajax({
                            type: "get",
                            // url: "../../../Controlador/controlador_ventas.php",
                            url: "Controlador/controlador_ventas.php",
                            data: { accion: "listarProductos" },
                            dataType: "json"
                        }).done(function (resultado) {
                            if (resultado.data.length == 0) {
                                swal({
                                    position: 'center',
                                    type: 'error',
                                    title: 'No hay productos Disponibles',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                            $("#IdProducto").append("<option > Seleccione un Producto</option>")

                            $.each(resultado.data, function (index, value) {
                                console.log(value);
                                $("#IdProducto").append("<option data-nombre='" + value.NombreProducto + "' data-valor='" + value.ValorUnitario + "' value='" + value.IdProducto + "'>" + value.NombreProducto + "</option>")
                            });

                        });
                        $("select[id=IdProducto]").change(function () {

                            var codigo1 = $(this).children('option:selected').val();
                            console.log(codigo1);
                            var valor = $(this).data('valor');

                            $.ajax({
                                type: "post",
                                // url: "../../../Controlador/controlador_ventas.php",
                                url: "Controlador/controlador_ventas.php",
                                data: { accion: "listarProd", "IdProducto": codigo1 },
                                dataType: "json"
                            }).done(function (resultado) {
                                console.log(resultado);
                                $("#CantidadVendida").attr('max', resultado.data[0].disponible);
                                document.getElementById("CantidadVendida").dataset.valor = resultado.data[0].ValorUnitario;
                            });
                        });
                        $("input[id=CantidadVendida]").change(function () {
                            var x = document.getElementById("CantidadVendida");

                            var maximo = x.getAttribute('max');
                            var actual = $("#CantidadVendida").val();
                            console.log(maximo);
                            console.log(actual);
                            if (parseInt(actual) > parseInt(maximo)) {
                                $("#CantidadVendida").val(maximo);
                            } else {
                                $("#CantidadVendida").val(actual);

                            }
                        });
                        $("#AgregarProducto").on('click', function (e) {
                            e.preventDefault();
                            var IdProducto = $("#IdProducto").val();
                            var NombreProducto = $("#IdProducto").data('nombre');
                            var CantidadVendida = $("#CantidadVendida").val();
                            var valor = document.getElementById("CantidadVendida").dataset.valor
                            var x = 0;
                            var dtventa;
                            $.each(productos, function (index, value) {

                                $.each(value, function (index1, value1) {

                                    if (index1 == 'IdProducto' && value1 == IdProducto) {
                                        x++;
                                    } else {
                                        // console.log(index1);
                                        // productos.push({ 'IdProducto': IdProducto, "CantidadVendida": CantidadVendida });

                                    }
                                });
                            });
                            if (x == 0) {
                                var total = CantidadVendida * valor;
                                totalventa = totalventa + total;
                                console.log(NombreProducto);
                                productos.push({ 'Posicion': c, 'IdProducto': IdProducto, 'Nombre': NombreProducto, "CantidadVendida": CantidadVendida, "ValorUnitario": valor, "Total": total });
                                $("#subtotal").val(totalventa);
                                var totalcop = parseFloat(totalventa) + parseFloat(totalventa * 0.19)
                                $("#total").val(totalcop);
                                c++;
                            } else {
                                swal({
                                    position: 'center',
                                    type: 'error',
                                    title: 'Ya agregó este producto, modifíquelo',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }

                            if (c == 0) {
                                dtventa = $("#tabla_venta").DataTable({
                                    "destroy": true,
                                    "data": productos,
                                    "columns": [

                                        { "data": "Nombre" },
                                        { "data": "CantidadVendida" },
                                        { "data": "Total" },
                                        {
                                            "data": "Posicion",
                                            render: function (data) {
                                                return '<a  data-codigo="' + data +
                                                    '" class="btn btn-danger btn-sm eliminar"> <i class="fas fa-trash"></i></a>'
                                            }
                                        },


                                    ]
                                });

                            } else {
                                dtventa = null;
                                dtventa = $("#tabla_venta").DataTable({
                                    "destroy": true,
                                    "data": productos,
                                    "columns": [

                                        { "data": "Nombre" },
                                        { "data": "CantidadVendida" },
                                        { "data": "Total" },
                                        {
                                            "data": "Posicion",
                                            render: function (data) {
                                                return '<a  data-codigo="' + data +
                                                    '" class="btn btn-info btn-sm modificar"> <i class="fa fa-edit"></i></a><a  data-codigo="' + data +
                                                    '" class="btn btn-danger btn-sm eliminar"> <i class="fas fa-trash"></i></a>'
                                            }
                                        },


                                    ]
                                });
                            }
                            console.log("c" + dtventa);


                        })

                        $(".table").on("click", "a.eliminar", function (e) {
                            var cod = $(this).data('codigo');
                            var position = null;
                            for (let i = 0; i < productos.length; i++) {
                                //console.log(productos[i].Posicion);
                                if (productos[i].Posicion == cod) {
                                    position = i;

                                }

                            }

                            var remove = productos.splice(position);
                            console.log(remove);
                                
                            dtventa = null;
                            dtventa = $("#tabla_venta").DataTable({
                                "destroy": true,
                                "data": productos,
                                "columns": [

                                    { "data": "Nombre" },
                                    { "data": "CantidadVendida" },
                                    { "data": "Total" },
                                    {
                                        "data": "Posicion",
                                        render: function (data) {
                                            return '<a  data-codigo="' + data +
                                                '" class="btn btn-info btn-sm modificar"> <i class="fa fa-edit"></i></a><a  data-codigo="' + data +
                                                '" class="btn btn-danger btn-sm eliminar"> <i class="fas fa-trash"></i></a>'
                                        }
                                    },


                                ]
                            });


                        })
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