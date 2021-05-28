function clientes() {

    var dt = $("#tabla").DataTable({
        // "ajax": "../../../Controlador/controlador_clientes.php?accion=listar",
        "ajax": "Controlador/controlador_clientes.php?accion=listar",
        "dom": 'Bfrtip',

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "buttons": [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel "></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
                title: 'Clientes'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf "></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                title: 'Clientes'


            }
        ],

        "columns": [
            { "data": "IdCliente" },
            { "data": "NombreCliente" },
            { "data": "Email" },
            { "data": "Direccion" },
            { "data": "Telefono" },
            { "data": "Estado" },
            { "data": "NombreCiudad" },
            {
                "data": "IdCliente",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
            }
        ]

    });

    $("#editado").on("click", "button#cerrar", function() {
        $("#titulo").html("Gestión de Clientes");
        $("#editado").html('');
        $("#editado").hide();
        $(".listado").show();
        dt.ajax.reload();
    });

    $("#editado").hide();

    $("#crear").on("click", function() {
        $("#titulo").html("Registrar Cliente");
        $("#editado").show();
        $(".listado").hide();
        $("#crear").hide();
        $("#editado").load('Vista/php/Clientes/FormCrearCliente.php', function() {
            // $("#editado").load('../../../Vista/php/Clientes/FormCrearCliente.php')
            $.ajax({
                type: "get",
                url: "Controlador/controlador_clientes.php",
                // url: "../../../Controlador/controlador_clientes.php",
                data: { accion: 'listar_estados' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    $("#editado #IdEstado").append("<option value='" + value.IdEstado + "'>" + value.Estado + "</option>")
                });
            });

            $.ajax({
                type: "get",
                url: "Controlador/controlador_ubicaciones.php",
                // url: "../../../Controlador/controlador_ubicaciones.php",
                data: { accion: 'listar_ciudad' },
                dataType: "json"
            }).done(function(resultado) {

                $.each(resultado.data, function(index, value) {
                    if (value.Estado == 'ACTIVO') {
                        $("#editado #IdCiudad").append("<option value='" + value.IdCiudad + "'>" + value.NombreCiudad + "</option>")
                    }
                });

            });
        });

    });

    $(".contenido").on("click", "a.editar", function() {
        var codigo = $(this).data("codigo");
        var estado;
        var ciudad;
        $("#titulo").html("Modificar Datos de Cliente");
        $("#editado").show();
        $(".listado").hide();
        $("#crear").hide();
        $("#editado").load('Vista/php/Clientes/FormModificarCliente.php', function() {
            // $("#editado").load('../../../Vista/php/Clientes/FormModificarCliente.php', function() {
            $.ajax({
                type: "get",
                url: "Controlador/controlador_clientes.php",
                // url: "../../../Controlador/controlador_clientes.php",
                data: { codigo: codigo, accion: 'consultar' },
                dataType: "json"
            }).done(function(cliente) {
                console.log(cliente);
                if (cliente.respuesta === "no existe") {
                    swal({
                        type: 'error',
                        title: '¡Error!',
                        text: 'El cliente no existe'
                    })
                } else {
                    $("#IdCliente").val(cliente.codigo);
                    $("#NombreCliente").val(cliente.nombre);
                    $("#Email").val(cliente.email);
                    $("#Direccion").val(cliente.direccion);
                    $("#Telefono").val(cliente.telefono);
                    estado = cliente.estado;
                    ciudad = cliente.ciudad;
                }
            });

            $.ajax({
                type: "get",
                url: "Controlador/controlador_clientes.php",
                // url: "../../../Controlador/controlador_clientes.php",
                data: { accion: 'listar_estados' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    if (estado === value.IdEstado) {
                        $("#editado #IdEstado").append("<option selected value='" + value.IdEstado + "'>" + value.Estado + "</option>")
                    } else {
                        $("#editado #IdEstado").append("<option value='" + value.IdEstado + "'>" + value.Estado + "</option>")
                    }
                });
            });
            $.ajax({
                type: "get",
                url: "Controlador/controlador_ubicaciones.php",
                // url: "../../../Controlador/controlador_ubicaciones.php",
                data: { accion: 'listar_ciudad' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    if (value.Estado == 'ACTIVO' || value.IdCiudad == ciudad) {
                        if (ciudad === value.IdCiudad) {
                            $("#editado #IdCiudad").append("<option selected value='" + value.IdCiudad + "'>" + value.NombreCiudad + "</option>")
                        } else {
                            $("#editado #IdCiudad").append("<option value='" + value.IdCiudad + "'>" + value.NombreCiudad + "</option>")
                        }
                    }
                });

            });
        });

    });

    $("#editado").on("click", "button#grabar", function(e) {
        e.preventDefault();
        var datos = $("#formCrearCliente").serialize();
        $.ajax({
            type: "get",
            url: "Controlador/controlador_clientes.php",
            // url: "../../../Controlador/controlador_clientes.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            console.log(resultado.respuesta);
            if (resultado.respuesta) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'El cliente fue grabado con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })
                $("#titulo").html("Gestión de Clientes");
                $("#editado").html('');
                $("#editado").hide();
                $(".listado").show();
                dt.page('last').draw('page');
                dt.ajax.reload();

            } else {
                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Ocurrió un error al grabar',
                    showConfirmButton: false,
                    timer: 1500
                });

            }
        });

    });

    $("#editado").on("click", "button#actualizar", function(e) {
        e.preventDefault();
        var datos = $("#formModificarCliente").serialize();
        // console.log(datos);
        $.ajax({
            type: "get",
            url: "Controlador/controlador_clientes.php",
            // url: "../../../Controlador/controlador_clientes.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            console.log(resultado);
            console.log("juliana");
            if (resultado.respuesta = 1) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'Se actualizaron los datos correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                $("#titulo").html("Gestión de Clientes");
                $("#editado").html('');
                $("#editado").hide();
                $(".listado").show();
                dt.ajax.reload();

            } else {
                swal({
                    type: 'error',
                    title: '¡Error!',
                    text: 'Revise la información'
                })
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {

            if (jqXHR.status === 0) {

                alert('Not connect: Verify Network.');

            } else if (jqXHR.status == 404) {

                alert('Requested page not found [404]');

            } else if (jqXHR.status == 500) {

                alert('Internal Server Error [500].');

            } else if (textStatus === 'parsererror') {

                alert('Requested JSON parse failed.');

            } else if (textStatus === 'timeout') {

                alert('Time out error.');

            } else if (textStatus === 'abort') {

                alert('Ajax request aborted.');

            } else {

                alert('Uncaught Error: ' + jqXHR.responseText);

            }

        });

    })


}