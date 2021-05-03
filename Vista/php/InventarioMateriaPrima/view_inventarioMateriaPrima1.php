<?php include_once "../../../Templates/header1.php";?>

<body>
    <div class="container">
        <div class="jumbotron" style="height: 100px;background-color:rgb(0,0,0,0.8);color:rgb(255,255,255);">
            <h4>Inventario de Materia Prima </h4>

        </div>
        <div class="jumbotron pt-1 pr-1" style="">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col">
                        <div class="contenido">
                            <div class=" row" >
                                <div class="col" >
                                    <h5 class="card-title pt-1">Inventario de Materia Prima</h5>

                                </div>
                                <div class="col-2 justify-content-end">
                                    <button class="btn btn-info btn-sm" id="nuevo" data-toggle="tooltip"
                                        title="Nuevo stock"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <style>
                                .form-inline{
                                    display:inline;
                                }
                            </style>

                            <!-- /.box-header -->
                            <div class="card-bg-dark">
                            <div id="editar"></div>

                                <div  style="display:normal;">
                                    <div class="listado">
                                        <table id="tabla" class="table table-striped table-bordered"
                                            >
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
    <!-- /.content-wrapper -->
    <?php include_once "../../../Templates/footer1.php";?>

    </script>
    <script src="../../../Recursos/js/materia_prima/materia_prima_inventario.js"></script>
    <!-- <script src="Recursos/js/materia_prima/materia_prima_inventario.js"></script> -->
    <script>
    $(document).ready(materiaprima);
    </script>




    </div>


    </div>

</body>

</html>