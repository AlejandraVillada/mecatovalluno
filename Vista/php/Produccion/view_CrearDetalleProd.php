<div class="card">
    <div class="card-header" style="text-align: center; ">
        <h1>Crear Detalle de Produccion </h1>
    </div>
    <div class="card-body">
        <form action="" method="POST" id="formcreardetPT">
            <div class="form-group">
                <label for="nombreMP">Id Detalle</label>
                <input type="text" name="IdDetalleProduccion" id="IdDetalleProduccion" disabled placeholder=""
                    class="form-control">
                <input type="hidden" name="IdProduccion" id="IdProduccion" placeholder="" class="form-control">
                <input type="hidden" name="IdDetalleProduccion" id="IdDetalleProduccion1" placeholder=""
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="nombreMP">Nombre Producto Terminado</label>
                <select class="form-control" name="IdProducto" id="IdProductoTerminado">
                </select>
            </div>
            <div class="form-group row">
                <label for="CantuPorcion">Cantidad de unidades por porción</label>
                <div class="col-sm-3">
                <input type="text" disabled name="CantidadProductoTerminado" id="CantidadProductoTerminado1" class="form-control">
                    <input type="hidden"  name="CantidadProductoTerminado" id="CantidadProductoTerminado" class="form-control">
                </div>

            </div>
            <div class="form-group row">
                <label for="idMP">Cantidad de Porciones</label>
                <div class="col-sm-3"> <input type="number" name="CantidadProduccion" id="CantidadProduccion"
                        placeholder="Ingerese la cantidad de porciones que desea programar" class="form-control"></div>

            </div>
            <input type="hidden" name="accion" value="nuevo">
            <input type="submit" class=" btn btn-dark guardarnuevo" id="guardarnuevo" value="Agregar">
            <a id="newdetaproduccion" class="btn btn-dark">Regresar</a>
    </div>





    </form>
</div>
</div>