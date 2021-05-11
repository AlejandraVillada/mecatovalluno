<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="container">
    <div class="mt-4">
        <div class="jumbotron">
            <h1 class="text-center" id="titulo">Gestión de Proveedores</h1>
        </div>
    </div>

    <!-- Proveedores -->

    <div class="card card-primary tablaProveedor">
        <div class="card-header bg-dark text-center text-white titulo">Proveedores</div>
        <div class="card-body">
            <div class="pull-right box-tools">
                <button class="btn btn-dark btn-sm" id="nuevo1" data-toggle="tooltip"
                    title="Registrar Nuevo Proveedor">Registrar Proveedor</button>
                <button class="btn btn-dark btn-sm" id="nuevo2" data-toggle="tooltip"
                    title="Registrar Nuevo Proveedor">Asignar Producto</button>
                <a href="./view_proveedores.php" class="btn btn-danger btn-sm" id="regresar"
                    data-toggle="tooltip" title="">Regresar</a>
            </div>
        </div>

        <div class="card-body contenedor1">
            <div id="edicion1"></div>
            <div id="listado1">
                <table id="tabla1" class="table table-striped table-bordered text-center">
                    <thead>
                        <tr class="text-center">
                            <th># Proveedor</th>
                            <th>Proveedor</th>
                            <th>Estado</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div id="listado2">
                <table id="tabla2" class="table table-striped table-bordered text-center">
                    <thead>
                        <tr class="text-center">
                            <th># Detalle Proveedor</th>
                            <th>Proveedor</th>
                            <th>Materia Prima</th>
                            <th>&nbsp;</th>
                            <th class="hide">&nbsp;</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>

    <!-- Detalle Proveedores -->

    <!-- <div class="card card-primary mt-5 tablaDetalle">
        <div class="card-header bg-dark text-center text-white titulo">Detalle de Proveedores</div>
        <div class="card-body">
            <div class="pull-right box-tools">
                <button class="btn btn-dark btn-sm" id="nuevo2" data-toggle="tooltip"
                    title="Asignar MP a Proveedor">Asignar Producto a Proveedor</button>
            </div>
        </div>

        <div class="card-body contenedor2">
            <div id="edicion2"></div>
            <div id="listado2">
                <table id="tabla2" class="table table-striped table-bordered text-center">
                    <thead>
                        <tr class="text-center">
                            <th># Detalle Proveedor</th>
                            <th>Proveedor</th>
                            <th>Materia Prima</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>

    <script src="../../../Recursos/js/proveedores/proveedores.js"></script>

    <script>
    $(document).ready(proveedor);
    </script>

</body>

</html>