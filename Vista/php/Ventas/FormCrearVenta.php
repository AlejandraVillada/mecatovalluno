<div class="row">
    <div class="col">
        <div class="card-body">
            <form id="formcli">
                <div class="row">
                    <div class="col">
                        <label for=""> Ingrese la Cédula del Cliente</label>
                        <input class="form-control" type="number" min="0" name="codigo">
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
                        <input class="form-control" disabled type="text" name="cedula" id="IdCliente1">
                        <input class="form-control" type="hidden" name="IdCliente" id="IdCliente">

                    </div>
                </div>
                <div class="form-group row mt-2">
                    <div class="col-sm-4">
                        <label for="">Seleccione el Productos a Agregar a la venta</label>
                        <select class="form-control" name="IdProducto" id="IdProducto"></select>
                    </div>
                    <div class="col-sm-3 ">
                        <label for="">Digite la Cantidad</label>
                        <input type="number" class="form-control" min="0" name="CantidadVendida" id="CantidadVendida">
                    </div>
                    <div class="col-sm-3">
                        <button class="btn btn-dark" id="AgregarProducto">Agregar Producto </button>
                    </div>

                </div>

                <div class="card mt-2">
                    <div class="card-header bg-dark" style="color:rgb(255,255,255)"> Resumen de Venta</div>
                    <div class="container">
                        <div class="card-body container">


                            <div class="form-group row">
                                <label>Subtotal</label>
                                <input type="text" class="form-control" name="subtotal" id="subtotal"
                                    placeholder="Ingrese Sub-Total">
                            </div>

                            <div class="form-group row">
                                <label>Total</label>
                                <input type="text" class="form-control" name="total" id="total"
                                    placeholder="Total Factura">
                            </div>


                            <div class="form-group row">
                                <button type="submit" class="btn btn-success">Generar Factura</button>
                                <a href="#" class="btn btn-dark">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-sm-4 card">
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
        <hr>
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
        <div class="card" id="productos">
            <div class="card-body">
                <table id="tabla_venta" class="table display">
                    <thead>
                        <tr>
                            <th>Producto </th>
                            <th>Cantidad</th>
                            <th>Total</th>
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