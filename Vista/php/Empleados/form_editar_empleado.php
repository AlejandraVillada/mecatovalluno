<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Empleados</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>

<body class="container">
    <div id="seccion-empleados">

        <div class="container">
            <div class="card-header bg-success text-center text-white">Gestión de Empleados</div>

        </div>

        <div class="box-body">
            <div class="card">
                <div class="card card-primary">
                    <div class="card-header">
                    <div class="panel-heading">Datos de Ingreso</div>
                        <!-- tools box -->
                        <div class="pull-left box-tools">
                            <button class="btn btn-info btn-sm btncerrar2" data-toggle="tooltip" title="Cerrar"><i
                                    class="fa fa-times"></i></button>
                        </div><!-- /. tools -->
                    </div>


                    <div class="card-body">

                        <form class="form-horizontal" role="form" id="fcomuna">


                            <div class="form-group">
                                <label class="control-label col-sm-2" for="comu_codi">Codigo:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="comu_codi" name="comu_codi"
                                        placeholder="Ingrese Codigo" value="" readonly="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="comu_nomb">Nombre:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="comu_nomb" name="comu_nomb"
                                        placeholder="Ingrese Nombre comuna" value="">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-sm-2" for="muni_codi">Municipio:</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="muni_codi" name="muni_codi">

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="button" id="actualizar" data-toggle="tooltip"
                                        title="Actualizar Comuna" class="btn btn-primary">Actualizar</button>
                                    <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición"
                                        class="btn btn-success btncerrar2"> Cancelar </button>
                                </div>

                            </div>

                            <input type="hidden" id="editar" value="editar" name="accion" />
                            </fieldset>

                        </form>
                    </div>
                    <input type="hidden" id="pagina" value="editar" name="editar" />
                </div>

                <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
                    crossorigin="anonymous"></script>

</body>

</html>