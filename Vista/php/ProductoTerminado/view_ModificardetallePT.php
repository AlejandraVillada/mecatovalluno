<div class="card">
    <div class="card-header" style="text-align: center; ">
        <h1>Modificar Detalle de Producto Terminado</h1>
    </div>
    <div class="card-body">
        <form action="" method="POST" id="formModdetPT">
            <div class="form-group">
                <label for="nombreMP">Id Detalle</label>
                <input type="text" name="IdDetalleProducto" id="IdDetalleProducto" disabled
                    placeholder="Ingrese el nombre del Producto a la venta" class="form-control">
                    <input type="hidden" name="IdProducto" id="IdProducto"
                    placeholder="Ingrese el nombre del Producto a la venta" class="form-control">
                    <input type="hidden" name="IdDetalleProducto" id="IdDetalleProducto1"
                    placeholder="Ingrese el nombre del Producto a la venta" class="form-control">
            </div>

            <div class="form-group">
                <label for="nombreMP">Nombre Producto</label>
                <select class="form-control" name="IdMateriaPrima" id="MP">
                </select>

            </div>

            <div class="form-group row">
                <label for="idMP" class="col">Cantidad por Porción</label>
                <div class="col-sm-2"> <input type="text" name="Cantidad" id="Cantidad"
                        placeholder="Ingerese la cantidad de productos que se van para una porcion"
                        class="form-control"></div>
                <div class="col">
                    <select class="form-control" name="IdMedida" id="Medidas">
                    </select>
                </div>


            </div>
            <div>
                <input type="textbox" class="form-control" name="DescripcionProducto" id="DescripcionProducto">
            </div>
            <br>
            <input type="hidden" name="accion" value="actualizar">
            <input type="submit" class="btn btn-dark guardarmod" value="Actualizar">
            <a id="moddprod" class="btn btn-dark">Regresar</a>
        </form>
    </div>
</div>
