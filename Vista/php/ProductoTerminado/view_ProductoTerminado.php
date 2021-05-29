<!-- <?php //include_once "../../../Templates/header1.php";?> -->

<body>
    <div class="">
        <div class="jumbotron jumbotron-fluid" style="text-align: center;">
            <div class="container">
                <h1 class="display-4" id="titulo">Gestión Producto Terminado</h1>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header bg-dark text-center text-white titulo">Producto Terminado</div>
            <div class="card-body">
                <div class="pull-right box-tools" style="display:block;">
                    <button class="btn btn-dark btn-sm" id="nuevo" data-toggle="tooltip" title="Nuevo Producto">Ingresar
                        Producto</button>
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
                        <table id="tabla" class="table table-striped text-center table-bordered text-center">
                            <thead>
                                <tr class="text-center">
                                    <th>-</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Porción</th>
                                    <th>Valor Unitario</th>
                                    <th>Foto</th>
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

        <div class="card card-primary detalle mt-5">
            <div class="card-header bg-dark text-center text-white titulo">Detalle de Producto Terminado</div>
            <div class="card-body">
                <div class="pull-right box-tools" style="display:block;">
                    <button class="btn btn-dark btn-sm" id="nuevodetalle" data-toggle="tooltip"
                        title="Nuevo Producto">Nuevo Detalle de Producto</button>
                </div>
            </div>
            <div class="card-body listado">
                <table id="tabla1" class="table text-center table-striped table-bordered text-center">
                    <thead>
                        <tr class="text-center">
                            <th>Codigo</th>
                            <th>Materia Prima</th>
                            <th>Cantidad de Materia Prima</th>
                            <th>Medida</th>
                            <th>Descripción</th>
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
    <!-- /.content-wrapper -->
    <?php //include_once "../../../Templates/footer1.php";?>

    </script>
    <!-- <script src="../../../Recursos/js/producto_terminado/producto_terminado.js"></script> -->

    <script src="Recursos/js/producto_terminado/producto_terminado.js"></script>

    <script>
    $(document).ready(productoterminado);
    </script>

    </div>

    </div>

</body>

</html>