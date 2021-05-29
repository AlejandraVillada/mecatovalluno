<?php //include_once "../../../Templates/header1.php";?>

<body>
    <div class="">
        <div class="jumbotron jumbotron-fluid" style="text-align: center;">
            <div class="container">
                <h1 class="display-4" id="titulo">Gestión de Producción</h1>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header bg-dark text-center text-white titulo">Producción</div>
            <div class="card-body">
                <div class="pull-right box-tools" style="display:block;">
                    <button class="btn btn-dark btn-sm" id="nuevo" data-toggle="tooltip"
                        title="Nuevo Produccion">Registrar
                        Producción</button>
                </div>
            </div>


            <style>
            .form-inline {
                display: inline;
            }
            </style>

            <!-- /.box-header -->
            <div class="card-body">
                <div id="editar"></div>
                <div style="display:normal;">
                    <div class="listado">
                        <table id="tabla" class="table table-striped text-center table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>-</th>
                                    <th>Sede</th>
                                    <th>Fecha</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Fin </th>
                                    <th>Estado</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-primary detalle mt-5">
        <div class="card-header bg-dark text-center text-white titulo">Detalle de Producción</div>
        <div class="card-body">
            <div class="pull-right box-tools" style="display:block;">
                <button class="btn btn-dark btn-sm" id="nuevodetalle" data-toggle="tooltip"
                    title="Nuevo Produccion">Nuevo Detalle de Producción</button>
            </div>
        </div>

        <div class="card-body listado">
            <table id="tabla1" class="table text-center table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Codigo</th>
                        <th>Producto Terminado</th>
                        <th>Cantidad de Porciones</th>
                        <th>Cantidad de Producto Terminado</th>
                        <th>Estado</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>

    <!-- /.content-wrapper -->
    <?php //include_once "../../../Templates/footer.php";?>
    <?php //include_once "../../../Templates/datatable.html";?>

    <script src="Recursos/js/Produccion/Produccion.js"></script>
    <!-- <script src="../../../Recursos/js/Produccion/Produccion.js"></script> -->
    <script>
    $(document).ready(Produccion);
    </script>

    </div>

    </div>

</body>

</html>