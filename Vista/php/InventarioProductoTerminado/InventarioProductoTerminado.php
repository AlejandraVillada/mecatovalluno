<?php //include_once "../../../Templates/header1.php";?>

<body>
    <div class="">
        <div class="jumbotron jumbotron-fluid" style="text-align: center;">
            <div class="container">
                <h1 class="display-4" id="titulo">Gestión de Inventario Producto Terminado</h1>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header bg-dark text-center text-white titulo">Inventario Producto Terminado</div>
            <div class="card-body">
                <div class="pull-right box-tools" style="display:block;">
                    <!-- <button class="btn btn-dark btn-sm" id="nuevo" data-toggle="tooltip" title="Nuevo ventas">Ingresar
                        ventas</button> -->
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
                                    <th>#</th>
                                    <th>Producto Terminado</th>
                                    <th>Cantidad Producción</th>
                                    <th>Cantidad Vendida</th>
                                    <th>Cantidad Disponible</th>
                                    <th>Fecha Produccion</th>
                                    <th>Sede</th>
                                    <th>Ciudad</th>
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
    <!-- /.content-wrapper -->
    <?php //include_once "../../../Templates/footer.php";?>
    <?php //include_once "../../../Templates/datatable.html";?>

    <script src="Recursos/js/producto_terminado\inventarioproducto_terminado.js"></script>
    <!-- <script src="../../../Recursos/js/producto_terminado\inventarioproducto_terminado.js"></script> -->

    <!-- <script src="Recursos/js/ventas/ventas.js"></script> -->
    <script>
    $(document).ready(inventarioproductoterminado);
    </script>

    </div>

    </div>

</body>

</html>