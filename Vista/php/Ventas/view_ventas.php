<?php include_once "../../../Templates/header1.php";?>

<body>
    <div class="container card mb-3 mt-3 ">
        <div class="jumbotron mt-3" style="height: 100px;background-color:rgb(0,0,0,0.8);color:rgb(255,255,255);">
            <h4>ventas  </h4>

        </div>
        <div class="card-header">
            <div class=" row">
                <div class="col">
                    <h5 class="card-title pt-1">ventas </h5>

                </div>
                <div class="col-2 justify-content-end" style="display:block;">
                    <button class="btn btn-dark btn-sm" id="nuevo" data-toggle="tooltip" title="Nuevo ventas">Ingresar
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
                                <div id="editar"></div>


                                <div style="display:normal;">
                                    <div class="listado">
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
    <?php include_once "../../../Templates/footer.php";?>
    <?php //include_once "../../../Templates/datatable.html";?>

   
    <script src="../../../Recursos/js/ventas/ventas.js"></script>
    <!-- <script src="Recursos/js/ventas/ventas.js"></script> -->
    <script>
    $(document).ready(ventas);
    </script>




    </div>


    </div>

</body>

</html>
