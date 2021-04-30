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

        <div class="mt-4">
            <div class="jumbotron">
                <h1 class="text-center">Registro de Empleados</h1>
            </div>
        </div>

        <div class="card-body">

            <div align="center">
                <div id="actual"></div>
            </div>

            <div class="card">
                <div class="card card-primary">
                    <div class="card-header bg-primary text-center text-white">Datos a Ingresar</div>
                    <div class="card-body">

                        <form role="form" id="fcomuna">

                            <div class="form-group">
                                <label>Id</label>
                                <input type="text" class="form-control" id="IdEmpleado" name="IdEmpleado"
                                    placeholder="Ingrese ID o CC del Empleado" value=""
                                    data-validation="length alphanumeric" data-validation-length="3-12">
                            </div>

                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="NombreEmpleado" name="NombreEmpleado"
                                    placeholder="Ingrese Nombre del Empleado" value="">
                            </div>

                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" class="form-control" id="Email" name="Email"
                                    placeholder="Modifique Correo del Empleado" value="">
                            </div>

                            <div class="form-group">
                                <label>Sueldo Base</label>
                                <input type="text" class="form-control" id="SueldoBase" name="SueldoBase"
                                    placeholder="Modifique Sueldo del Empleado" value="">
                            </div>

                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="text" class="form-control" id="Telefono" name="Telefono"
                                    placeholder="Modifique Telefono del Empleado" value="">
                            </div>

                            <div class="form-group">
                                <label for="muni_codi">Cargo</label>
                                <select class="form-control" id="Cargo" name="Cargo">

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="muni_codi">Sede</label>
                                <select class="form-control" id="IdSede" name="IdSede">

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Estado</label>
                                <input type="text" class="form-control" id="Estado" name="Estado"
                                    placeholder="Modifique Estado Actual del Empleado" value="">
                            </div>

                            <div class="form-group">
                                <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip"
                                    title="Grabar Comuna">Registrar Empleado</button>
                                <button type="button" id="cerrar" class="btn btn-danger btncerrar2"
                                    data-toggle="tooltip" title="Cancelar">Cancelar</button>
                            </div>

                            <input type="hidden" id="nuevo" value="nuevo" name="accion" />
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>