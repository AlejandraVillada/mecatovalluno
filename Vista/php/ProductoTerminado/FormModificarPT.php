<div class="card-body">
    <form action="" method="POST" id="formModPT">
        <div class="form-group">
            <label for="nombreMP">Id Producto</label>
            <input type="text" name="IdProducto" id="IdProducto1" disabled
                placeholder="Ingrese el nombre del Producto a la venta" class="form-control">
            <input type="hidden" name="IdProducto" id="IdProducto"
                placeholder="Ingrese el nombre del Producto a la venta" class="form-control">
        </div>

        <div class="form-group">
            <label for="nombreMP">Nombre Producto</label>
            <input type="text" required name="NombreProducto" id="NombreProducto"
                placeholder="Ingrese el nombre del producto a la venta" class="form-control">
        </div>

        <div class="form-group">
            <label for="idMP">Cantidad por Porción</label>
            <input type="text" required name="CantidadProducto" id="CantidadProducto"
                placeholder="Ingrese la cantidad de productos que hace referencia a una porción" class="form-control">
        </div>

        <div class="form-group">
            <label for="idMP">Valor por Unidad</label>
            <input type="text" required name="ValorUnitario" id="ValorUnitario"
                placeholder="Ingrese el valor por unidad del producto" class="form-control">
        </div>

        <div class="form-group">
            <label for=""> Foto del Producto</label>
            <input type="file" class="form-control-file border" name="Foto" id="Foto">
        </div>

        <br>
        <input type="hidden" name="accion" id="accion" value="actualizar">
        <input type="submit" class="btn btn-primary nuevo" value="Actualizar">
        <a id="modprodter" class="btn btn-danger">Regresar</a>
    </form>
</div>