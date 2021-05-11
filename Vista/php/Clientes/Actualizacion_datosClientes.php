<!-- No funciona el alerta, pero graba y modifica normal -->
<?php
    $cedula = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion datos personales</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="../../layout/Style.css">
</head>



<body>
    <div class="container" id="editado">
        <div class="jumbotron jumbotron-fluid" style="text-align: center;">
            <div class="container">
                <h1 id="titulo" class="display-4">Actualizacion datos Personales</h1>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header bg-dark text-center text-white titulo">Actualizacion datos Personales</div>
            <div class="card">
                <div class="card-body">
                    <!-- Cambio y eliminacion en el servidor, poner variable sesion para datos de cedula de consulta -->
                    <div id="ingreso">
                        <div class="form-group">
                            <label>Cedula</label>
                            <input type="text" class="form-control" id="Cedula" name="Cedula"
                                placeholder="Modifique ID o CC del Empleado" value="">
                        </div>

                        <button id="enviar" name="enviar" class="btn btn-dark">Enviar Cedula</button>

                    </div>
                    <div class="cuerpo">

                        <form id="formModificarCliente">
                            <div class="form-group">
                                <label for="IdCliente">Cédula del cliente</label>
                                <input type="text" class="form-control" name="IdCliente" id="IdCliente" readonly>
                            </div>
                            <div class="form-group">
                                <label for="NombreCliente">Nombre Cliente</label>
                                <input type="text" class="form-control" name="NombreCliente" id="NombreCliente">
                            </div>
                            <div class="form-group">
                                <label for="Email">Correo Electronico</label>
                                <input type="text" class="form-control" name="Email" id="Email">
                            </div>
                            <div class="form-group">
                                <label for="Direccion">Direccion</label>
                                <input type="text" class="form-control" name="Direccion" id="Direccion">
                            </div>
                            <div class="form-group">
                                <label for="Telefono">Telefono</label>
                                <input type="text" class="form-control" name="Telefono" id="Telefono">
                            </div>
                            <input type="hidden" name="IdEstado" id="IdEstado">
                            <input type="hidden" name="IdCiudad" id="IdCiudad">


                            <input type="hidden" id="editar1" value="editar" name="accion" />
                        </form>
                        <div class="usuario">
                            <form id="formModificarUsuario">
                                <div class="form-group">
                                    <label for="Usuario">Usuario</label>
                                    <input type="text" class="form-control" name="Usuario" id="Usuario"
                                        placeholder="Ingrese el nombre de usuario" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="Contrasena">Contraseña</label>
                                    <input type="password" class="form-control" name="Contrasena" id="Contrasena"
                                        placeholder="Ingrese la contraseña">
                                </div>
                                <input type="hidden" id="IdUsuario" name="IdUsuario">
                                <input type="hidden" id="IdTipoUsuario" name="IdTipoUsuario">
                                <input type="hidden" id="editar2" value="editar" name="accion" />
                            </form>
                        </div>
                        <br>
                        <button class="btn btn-info" id="actualizar">Modificar registro</button>
                        <button class="btn btn-dark" id="apareceUsu">Cambiar Contraseña</button>
                    </div>
                </div>
            </div>
        </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>
<script src="../../../Recursos/js/clientes/actualizacion_datos_clientes.js"></script>
<script>
$(document).ready(actDatosClientes);
</script>



</html>