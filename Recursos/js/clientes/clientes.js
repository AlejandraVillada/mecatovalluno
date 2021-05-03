function clientes() {

    var dt = $("#tabla").DataTable({
        "ajax": "../../../Controlador/controlador_clientes.php?accion=listar",
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

    $("#editado").hide();

    $("#crear").on("click", function() {
        $("#titulo").html("Ingresar Nuevo Cliente");
        $("#editado").show();
        $(".listado").hide();
        $("#editado").load('../../../Vista/php/Clientes/FormCrearCliente.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_clientes.php",
                data: { accion: 'listar_estados' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    $("#editado #IdEstado").append("<option value='" + value.IdEstado + "'>" + value.Estado + "</option>")
                });
            });

            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_clientes.php",
                data: { accion: 'listar_ciudad' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    $("#editado #IdCiudad").append("<option value='" + value.IdCiudad + "'>" + value.NombreCiudad + "</option>")
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
        $("#editado").load('../../../Vista/php/Clientes/FormModificarCliente.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_clientes.php",
                data: { codigo: codigo, accion: 'consultar' },
                dataType: "json"
            }).done(function(cliente) {
                console.log(cliente);
                if (cliente.respuesta === "no existe") {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Materia Prima no existe!'
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
                url: "../../../Controlador/controlador_clientes.php",
                data: { accion: 'listar_estados' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    if (estado === value.IdEstado) {
                        $("#IdEstado").append("<option selected value='" + value.IdEstado + "'>" + value.Estado + "</option>")
                    } else {
                        $("#IdEstado").append("<option value='" + value.IdEstado + "'>" + value.Estado + "</option>")
                    }
                });
            });
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_clientes.php",
                data: { accion: 'listar_ciudad' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    if (ciudad === value.IdCiudad) {
                        $("#IdCiudad").append("<option selected value='" + value.IdCiudad + "'>" + value.NombreCiudad + "</option>")
                    } else {
                        $("#IdCiudad").append("<option value='" + value.IdCiudad + "'>" + value.NombreCiudad + "</option>")
                    }
                });
            });
        });

    });

    $("#editado").on("click", "button#grabar", function() {
        var datos = $("#formCrearCliente").serialize();
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_clientes.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            if (resultado.respuesta) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'El cliente fue grabado con éxito',
                    showConfirmButton: false,
                    timer: 1200
                })
                $("#titulo").html("Gestión Clientes");
                $("#editado").html('');
                $("#editado").hide();
                $(".listado").show();
                dt.page('last').draw('page');
                dt.ajax.reload(null, false);
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

    $("#editado").on("click", "button#actualizar", function() {
        var datos = $("#formModificarCliente").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "../../../Controlador/controlador_clientes.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            console.log(restultado);
            if (resultado.respuesta) {
                swal({
                    position: 'center',
                    type: 'success',
                    title: 'Se actaulizaron los datos correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                $("#titulo").html("Gestión Clientes");
                $("#editado").html('');
                $("#editado").hide();
                $(".listado").show();
                dt.ajax.reload(null, false);
            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        });
    })


}