<?php //include_once "../../../Templates/header1.php";?>

<body>

    <div class="">
        <div class="jumbotron jumbotron-fluid" style="text-align: center;">
            <div class="container">
                <h1 class="display-4" id="titulo">Inventario de Materia Prima</h1>
            </div>
        </div>

        <div class="card card-primary">
            <div class="card-header bg-dark text-center text-white titulo">Materia Prima</div>
            <!-- Main content -->
            <!-- <section class="content"> -->
            <!-- <div class="contenido"> -->
            <div class="card-body">
                <div class="pull-right box-tools">
                    <button class="btn btn-dark btn-sm" id="nuevo" data-toggle="tooltip" title="Nuevo Stock">Ingresar
                        Compra</button>
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
                        <table id="tabla" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr class="text-center">
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
                                <tr class="text-center">
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
            <!-- </div> -->
            <!-- </section> -->
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
    <?php // include_once "../../../Templates/footer1.php";?>

    </script>
    <!-- <script src="../../../Recursos/js/materia_prima/materia_prima_inventario.js"></script> -->
    <script src="Recursos/js/materia_prima/materia_prima_inventario.js"></script>
    <script>
    $(document).ready(materiaprima);
    </script>

    </div>

    </div>

</body>

</html>
