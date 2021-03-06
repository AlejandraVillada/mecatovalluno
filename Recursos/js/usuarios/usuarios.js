function usuarios() {
    $("#crear").show();
   
    var dt = $("#tabla").DataTable({

        "ajax": "Controlador/controlador_usuario.php?accion=listar",
        "dom": 'Bfrtip',

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
        "buttons": [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel "></i> ',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
                title: 'Usuarios'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf "></i> ',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
                title: 'Usuarios'


            }
        ],

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

    $("#editado").on("click", "button#cerrar", function() {
        $("#titulo").html("Gestión de Usuarios");
        $("#editado").html('');
        $("#editado").hide();
        $(".listado").show();
        $("#informe").show();
        $("#crear").show();
        dt.ajax.reload(null, false);
    });

    $("#editado").hide();

    $("#crear").on("click", function() {
        $("#titulo").html("Registrar Usuario");
        $("#editado").show();
        $(".listado").hide();
        $("#informe").hide();
        $("#crear").hide();
        $("#editado").load('Vista/php/Usuarios/FormCrearUsuario.php', function() {
            //  $("#editado").load('../../../Vista/php/Usuarios/FormCrearUsuario.php', function() {
            $.ajax({
                type: "get",
                url: "Controlador/controlador_usuario.php",
                // url: "../../../Controlador/controlador_usuario.php",
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
        $("#informe").hide();
        $("#crear").hide();
        $("#editado").load('Vista/php/Usuarios/FormModificarUsuario.php', function() {
            // $("#editado").load('../../../Vista/php/Usuarios/FormModificarUsuario.php', function() {
            $.ajax({
                type: "get",
                url: "Controlador/controlador_usuario.php",
                // url: "../../../Controlador/controlador_usuario.php",
                data: { codigo: codigo, accion: 'consultar' },
                dataType: "json"
            }).done(function(usuario) {
                console.log(usuario);
                if (usuario.respuesta === "no existe") {
                    swal({
                        type: 'error',
                        title: '¡Error!',
                        text: 'El usuario no existe'
                    })
                } else {
                    $("#IdUsuario").val(usuario.codigo);
                    $("#Usuario").val(usuario.usuario);
                    tipoUsu = usuario.tipoUsuario;
                }
            });

            $.ajax({
                type: "get",
                url: "Controlador/controlador_usuario.php",
                // url: "../../../Controlador/controlador_usuario.php",
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
            url: "Funciones/generarPassword.php",
            // url: "../../../Funciones/generarPassword.php",
            data: { pass: contrasena },
            dataType: "json"
        }).done(function(resultado) {
            hash = resultado;
            data = datos + '&Contrasena=' + hash;
            $.ajax({
                type: "get",
                url: "Controlador/controlador_usuario.php",
                // url: "../../../Controlador/controlador_usuario.php",
                data: data,
                dataType: "json"
            }).done(function(resultado) {
                if (resultado.respuesta) {
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'El usuario fue grabado con éxito',
                        showConfirmButton: false,
                        timer: 1200
                    })
                    $("#titulo").html("Gestión de Usuarios");
                    $("#editado").html('');
                    $("#editado").hide();
                    $(".listado").show();
                    $("#crear").show();
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
            url: "Funciones/generarPassword.php",
            // url: "../../../Funciones/generarPassword.php",
            data: { pass: contrasena },
            dataType: "json"
        }).done(function(resultado) {
            hash = resultado;
            data = datos + '&Contrasena=' + hash;
            $.ajax({
                type: "get",
                url: "Controlador/controlador_usuario.php",
                // url: "../../../Controlador/controlador_usuario.php",
                data: data,
                dataType: "json"
            }).done(function(resultado) {
                if (resultado.respuesta) {
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Se actualizaron los datos correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#titulo").html("Gestión de Usuarios");
                    $("#editado").html('');
                    $("#editado").hide();
                    $(".listado").show();
                    $("#crear").show();
                    dt.ajax.reload(null, false);
                } else {
                    swal({
                        type: 'error',
                        title: '¡Error!',
                        text: 'Revise la información'
                    })
                }
            });
        });

    })

}