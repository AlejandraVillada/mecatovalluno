<div class="card">
    <div class="card-header" style="text-align: center; ">
        <h1>Modificar Detalle de Produccion </h1>
    </div>
    <div class="card-body">
        <form action="" method="POST" id="formmoddetPT">
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
                <select class="form-control" name="IdProductoTerminado" id="IdProductoTerminado">
                </select>
            </div>
            <div class="form-group row">
                <label for="CantuPorcion" >Cantidad de unidades por porción</label>
                <div class="col-sm-3"> <input type="text" disabled name="Cantidadunidades" id="Cantidadunidades"
                        class="form-control"></div>

            </div>
            <div class="form-group row">
                <label for="idMP" >Cantidad de Porciones</label>
                <div class="col-sm-3"> 
                <input type="number" name="Cantidad" required min="0" id="Cantidad"
                        class="form-control"></div>

            </div>
            <input type="hidden" name="accion" value="nuevo">
    <input type="submit" class=" btn btn-dark " id="guardarmodificar" value="Agregar">
    <a href="view_ProduccionTerminado.php" class="btn btn-dark">Regresar</a>
    </div>


    


    </form>
</div>
</div>