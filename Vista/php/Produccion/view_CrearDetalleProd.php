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

        <div class="form-group">
            <label for="CantuPorcion" class="col">Cantidad de Unidades por Porción</label>
            <div class="col-sm-5">
                <input type="text" disabled name="CantidadProductoTerminado" id="CantidadProductoTerminado1"
                    class="form-control col-md-5 col-lg-4">
                <input type="hidden" name="CantidadProductoTerminado" id="CantidadProductoTerminado"
                    class="form-control col-md-5 col-lg-4">
            </div>
        </div>
        <br>
        <div class="form-group">
            <label for="idMP" class="col mt-2">Cantidad de Porciones</label>
            <div class="col-sm-5"> <input type="number" name="CantidadProduccion" id="CantidadProduccion"
                    placeholder="Ingrese la cantidad de porciones que desea programar" class="form-control col-md-5 col-lg-10"></div>
        </div>
        <br>
        <br>
        <input type="hidden" name="accion" value="nuevo">
        <input type="submit" class=" btn btn-primary guardarnuevo" id="guardarnuevo" value="Agregar">
        <a id="newdetaproduccion" class="btn btn-danger">Regresar</a>
    </form>
</div>