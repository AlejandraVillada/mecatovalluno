<?php include_once "../../../Templates/header1.php";?>

<body>
    <div class="container card mb-3 mt-3 ">
        <div class="jumbotron mt-3" style="height: 100px;background-color:rgb(0,0,0,0.8);color:rgb(255,255,255);">
            <h4>Produccion  </h4>

        </div>
        <div class="card-header">
            <div class=" row">
                <div class="col">
                    <h5 class="card-title pt-1">Produccion </h5>

                </div>
                <div class="col-2 justify-content-end" style="display:block;">
                    <button class="btn btn-dark btn-sm" id="nuevo" data-toggle="tooltip" title="Nuevo Produccion">Ingresar
                        Produccion</button>
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

                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <div class="container card detalle mb-3">
            <div class=" card-header row ">
                <div class="col">
                    <h5 class="card-title pt-1">Detalle de Produccion </h5>

                </div>
                <div class="col-3 justify-content-end" style="display:block;">
                    <button class="btn btn-dark btn-sm" id="nuevodetalle" data-toggle="tooltip"
                        title="Nuevo Produccion">Nuevo Detalle de Producción</button>
                </div>
            </div>
            <div class="card-body listado ">
                <table id="tabla1" class="table text-center table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Producto Terminado</th>
                            <th>Cantidad de Porciones</th>
                            <th>Cantidad de Producto Terminado</th>
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
    <?php include_once "../../../Templates/footer1.php";?>

    </script>
    <script src="../../../Recursos/js/Produccion/Produccion.js"></script>
    <!-- <script src="Recursos/js/Produccion/Produccion.js"></script> -->
    <script>
    $(document).ready(Produccion);
    </script>




    </div>


    </div>

</body>

</html>
