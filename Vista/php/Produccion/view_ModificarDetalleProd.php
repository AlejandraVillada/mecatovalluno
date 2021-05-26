<div class="card">
    <div class="card-header" style="text-align: center; ">
        <h1>Modificar Detalle de Produccion </h1>
    </div>
    <div class="card-body">
        <form action="" method="POST" id="formmoddetP">
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
                <select class="form-control" name="IdProducto" id="IdProducto">
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
                <label for="idMP" >Cantidad de Porciones</label>
                <div class="col-sm-3">
                <input type="number" name="CantidadProduccion" required min="0" id="CantidadProduccion"
                        class="form-control"></div>

            </div>
            <input type="hidden" name="accion" value="actualizar">
    <input type="submit" class=" btn btn-dark " id="guardarmodificar" value="Agregar">
    <a id="moddetalleprod" class="btn btn-dark">Regresar</a>
    </div>





    </form>
</div>
</div>
