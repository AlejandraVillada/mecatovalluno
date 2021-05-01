<?php //include_once "../../../Templates/header1.php";?>

<body>
    <div class="container">
        <div class="jumbotron" style="height: 100px;">
            <h4>Inventario de Materia Prima </h4>

        </div>
        <div class="jumbotron" style="">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col">
                        <div class="contenido">
                            <div class=" row">
                                <div class="col">
                                    <h5 class="card-title">Inventario de Materia Prima</h5>

                                </div>
                                <div class="col-2">
                                    <button class="btn btn-info btn-sm" id="nuevo" data-toggle="tooltip"
                                        title="Nuevo stock"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>


                            <!-- /.box-header -->
                            <div class="card card-body">
                                <div id="editar"></div>
                                <div id="listado">
                                    <table id="tabla" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Stock</th>
                                                <th>Medida</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Stock</th>
                                                <th>Medida</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.box-body -->
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
    <!-- /.content-wrapper -->
    <?php //include_once "../../../Templates/footer1.php";?>

    </script>
    <script src="Recursos/js/materia_prima/materia_prima_inventario.js"></script>
    <script>
    $(document).ready(materiaprima);
    </script>




    </div>


    </div>

</body>

</html>