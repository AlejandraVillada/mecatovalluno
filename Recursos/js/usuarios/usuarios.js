function usuarios() {

    var dt = $("#tabla").DataTable({
        "ajax": "../../../Controlador/controlador_usuario.php?accion=listar",
        "columns": [
            { "data": "IdUsuario" },
            { "data": "Usuario" },
            { "data": "TipoUsuario" },
            { "data": "Contrasena" },
            {
                "data": "IdUsuario",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
            }
        ]

    });

    $("#editado").hide();

    $("#crear").on("click", function() {
        $("#titulo").html("Ingresar Nuevo Usuario");
        $("#editado").show();
        $(".listado").hide();
        $("#editado").load('../../../Vista/php/Usuarios/FormCrearUsuario.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_usuario.php",
                data: { accion: 'listar_tipo_usu' },
                dataType: "json"
            }).done(function(resultado) {
                $.each(resultado.data, function(index, value) {
                    $("#editado #IdTipoUsuario").append("<option value='" + value.IdTipoUsuario + "'>" + value.TipoUsuario + "</option>")
                });
            });

        });

    });

    $(".contenido").on("click", "a.editar", function() {
        var codigo = $(this).data("codigo");
        var tipoUsu;
        $("#titulo").html("Modificar Datos de Usuario");
        $("#editado").show();
        $(".listado").hide();
        $("#editado").load('../../../Vista/php/Usuarios/FormModificarUsuario.php', function() {
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_usuario.php",
                data: { codigo: codigo, accion: 'consultar' },
                dataType: "json"
            }).done(function(usuario) {
                console.log(usuario);
                if (usuario.respuesta === "no existe") {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Usuario no existe!'
                    })
                } else {
                    $("#IdUsuario").val(usuario.codigo);
                    $("#Usuario").val(usuario.usuario);
                    tipoUsu = usuario.tipoUsuario;
                }
            });

            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_usuario.php",
                data: { accion: 'listar_tipo_usu' },
                dataType: "json"
            }).done(function(resultado) {
                console.log(tipoUsu);
                $.each(resultado.data, function(index, value) {
                    if (tipoUsu === value.IdTipoUsuario) {
                        $("#editado #IdTipoUsuario").append("<option selected value='" + value.IdTipoUsuario + "'>" + value.TipoUsuario + "</option>")
                    } else {
                        $("#editado #IdTipoUsuario").append("<option value='" + value.IdTipoUsuario + "'>" + value.TipoUsuario + "</option>")
                    }
                });
            });

        });

    });

    $("#editado").on("click", "button#grabar", function() {
        var datos = $("#formCrearUsuario").serialize();
        var contrasena = $("#Contrasena").val();
        var hash;

        $.ajax({
            type: "get",
            url: "../../../Funciones/generarPassword.php",
            data: contrasena,
            dataType: "json"
        }).done(function(resultado) {
            hash = resultado;
            data = datos + '&Contrasena=' + hash;
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_usuario.php",
                data: data,
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

    });

    $("#editado").on("click", "button#actualizar", function() {
        var datos = $("#formModificarUsuario").serialize();
        var contrasena = $("#Contrasena").val();
        var hash;
        $.ajax({
            type: "get",
            url: "../../../Funciones/generarPassword.php",
            data: contrasena,
            dataType: "json"
        }).done(function(resultado) {
            hash = resultado;
            data = datos + '&Contrasena=' + hash;
            $.ajax({
                type: "get",
                url: "../../../Controlador/controlador_usuario.php",
                data: data,
                dataType: "json"
            }).done(function(resultado) {
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
        });

    })

}