<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Empleados</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>

<body class="container">

    <div id="nuevo-editar" class="hide">
        <!-- div para cargar el formulario para una nueva comuna o editar una comuna -->
    </div>

    <div id="empleados">
        <div class="card-header">
            <i class="ion ion-clipboard"></i>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-info btn-sm" id="nuevo" data-toggle="tooltip" title="Nuevo Empleado"><i
                        class="fa fa-plus" aria-hidden="true"></i></button>
                <button class="btn btn-info btn-sm btncerrar" data-toggle="tooltip" title="Ocultar"><i
                        class="fa fa-times"></i></button>
            </div><!-- /. tools -->
        </div><!-- /.box-header -->

        <div class="card-body">
            <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>E-mail</th>
                        <th>Sueldo Base</th>
                        <th>Telefono</th>
                        <th>Cargo</th>
                        <th>Sede</th>
                        <th>Estado</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div><!-- /.box-body -->

    </div>

    <script src="../../../Recursos/js/empleados/empleados.js"></script>
    <script>
    $(document).ready(empleados);
    </script>

</body>