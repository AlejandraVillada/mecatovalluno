<?php //include_once "../../../Templates/header1.php";?>

<body class="container">
    <div class=" jumbotron mt-3 text-center">
        <h1>Productos Disponibles para ventas </h1>

    </div>
    <div class=" card mb-3 mt-3 ">

        <div class="card-header">
            <div class=" row">
                <div class="col">
                    <h5 class="card-title pt-1">Productos Disponibles para ventas </h5>

                </div>
                <div class="col-2 justify-content-end" style="display:block;">
                    <button class="btn btn-dark btn-sm" id="nuevo" data-toggle="tooltip" title="Nuevo ventas">Registrar
                        venta</button>
                </div>
                <div class="col-3 justify-content-end" style="display:block;">
                    <button class="btn btn-dark btn-sm" id="factura" data-toggle="tooltip" title="Ver Factura">Facturas de
                        ventas</button>
                </div>
            </div>
        </div>
        <div class="card-body pt-1 pr-1" style="">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col">
                        <div class="contenido">

                            <style>
                            .form-inline {
                                display: inline;
                            }
                            </style>

                            <!-- /.box-header -->
                            <div class="card-bg-dark">
                                <div id="contenidos"></div>


                                <div style="display:normal;">
                                    <div id="estaventas">
                                        <table id="tabla" class="table table-striped text-center table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>-</th>
                                                    <th>Producto Terminado</th>
                                                    <th>Cantidad Producción</th>
                                                    <th>Cantidad Vendida</th>
                                                    <th>Cantidad Disponible</th>
                                                    <th>Fecha Produccion</th>
                                                    <th>Sede</th>
                                                    <th>Ciudad</th>
                                                    <th>-</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>

    </div>
    </div>
    <!-- /.content-wrapper -->
    <?php //include_once "../../../Templates/footer.php";?>
    <?php //include_once "../../../Templates/datatable.html";?>


    <!-- <script src="../../../Recursos/js/ventas/ventas.js"></script> -->
    <script src="Recursos/js/ventas/ventas.js"></script>
    <script>
    $(document).ready(ventas);
    </script>




    </div>


    </div>

</body>

</html>