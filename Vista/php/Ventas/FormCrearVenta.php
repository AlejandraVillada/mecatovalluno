<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Ventas</title>

<body>

    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card-body">
                    <form id="formcli">
                        <div class="row">
                            <div class="col">
                                <label for=""> Ingrese la Cédula del Cliente</label>
                                <input class="form-control" type="text" name="codigo">
                                <input type="hidden" name="accion" value="consultar">


                            </div>
                            <div class="col-sm-2">
                                <label for=""></label>
                                <input type="submit" class="btn btn-dark form-control" value="Buscar" id="BuscarCli">
                            </div>

                        </div>

                    </form>
                    <hr>

                    <hr>

                    <form name="formulario" class="mt-5" action="" method="POST">

                        <div class="form-group row">
                            <div class="col-sm-2">
                                <label for="">Cédula Cliente</label>
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="IdCliente" id="IdCliente">
                                <input class="form-control" type="text" name="IdCliente" id="IdCliente">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label for="">Seleccione el Productos a Agregar a la venta</label>
                                <select class="form-control" name="IdProducto" id="IdProducto"></select>
                            </div>
                            <div class="col-sm-3 ">
                                <label for="">Digite la Cantidad </label>
                                <input type="number" class="form-control col-sm-3" min="0" name="CantidadVendida">
                            </div>
                            <div class="col-sm-3">
                            <button class="btn btn-dark">Agregar Producto </button>
                        </div>

                        </div>
                        
                        <div class="card mt-2">
                            <div class="card-header bg-dark" style="color:rgb(255,255,255)"> Resumen de Venta</div>
                            <div class="card-body container">


                                <div class="form-group row">
                                    <label>Subtotal</label>
                                    <input type="text" class="form-control" name="subtotal"
                                        placeholder="Ingrese Sub-Total">
                                </div>

                                <div class="form-group row">
                                    <label>Total</label>
                                    <input type="text" class="form-control" name="total" placeholder="Total Factura">
                                </div>

                                <div class="form-group row">
                                    <label>ID Cliente</label>
                                    <input type="text" class="form-control" name="id-cliente"
                                        placeholder="Ingrese ID del Cliente">
                                </div>

                                <div class="form-group row">
                                    <button type="submit" class="btn btn-success">Generar Factura</button>
                                    <a href="#" class="btn btn-dark">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3 card">
                <div class="row text-Center card-header">
                    <h2 class="col">Venta</h2>
                </div>
                <div class="row mt-1 text-center">
                    <div class="col">
                        <label id="" class="font-weight-bold">Cédula: </label>
                        <label id="cedula"></label>
                    </div>
                    <div class="col">
                        <label id="" class="font-weight-bold">Nombre: </label>
                        <label id="nombre"></label>
                    </div>
                    <div class="col">
                        <label id="" class="font-weight-bold">Email: </label>
                        <label id="email"></label>
                    </div>

                </div>
                <div class="row mt-1 text-center">
                    <div class="col">
                        <label id="" class="font-weight-bold">Dirección: </label>
                        <label id="direccion"></label>
                    </div>
                    <div class="col">
                        <label id="" class="font-weight-bold">Telefono: </label>
                        <label id="telefono"></label>
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