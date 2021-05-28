<div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data" id="formCrearPT">

        <div class="form-group">
            <label for="nombreMP">Nombre Producto</label>
            <input type="text" required name="NombreProducto" id="NombreProducto"
                placeholder="Ingrese el nombre del producto a la venta" class="form-control">
        </div>

        <div class="form-group">
            <label for="idMP">Cantidad por Porción</label>
            <input type="text" required name="CantidadProducto" numeric id="CantidadProducto"
                placeholder="Ingrese la cantidad de productos que hace referencia a una porción" class="form-control">
        </div>

        <div class="form-group">
            <label for="idMP">Valor por Unidad</label>
            <input type="text" required name="ValorUnitario" numeric id="ValorUnitario"
                placeholder="Ingrese el valor por unidad del producto" class="form-control">
        </div>

        <div class="form-group">
            <label for=""> Foto del Producto</label>
            <input type="file" class="form-control-file border" name="Foto" id="Foto">
        </div>

        <input type="hidden" name="accion" id="accion" value="nuevo">
        <input type="submit" class="btn btn-primary nuevo" value="Crear Producto">
        <a id="nuevoprod" class="btn btn-danger">Regresar</a>
    </form>
</div>