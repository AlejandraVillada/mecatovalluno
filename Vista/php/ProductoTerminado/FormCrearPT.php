<div class="card">
    <div class="card-header" style="text-align: center; ">
        <h1>Crear Producto Terminado</h1>
    </div>
    <div class="card-body">
        <form action="" method="POST" id="formCrearPT">
           
            <div class="form-group">
                <label for="nombreMP">Nombre Producto</label>
                <input type="text" name="NombreProducto" placeholder="Ingrese el nombre del Producto a la venta" class="form-control">
            </div>
            <div class="form-group">
                <label for="idMP">Cantidad por Porción</label>
                <input type="text" name="CantidadProducto" placeholder="Ingerese la cantidad de productos que hace referencia a una porción" class="form-control">
            </div>
            <br>
            <input type="hidden" name="accion" value="nuevo">
            <input type="submit" class="btn btn-dark nuevo" value="Crear Registro">
            <a href="view_ProductoTerminado.php" class="btn btn-dark">Regresar</a>
        </form>
    </div>
</div>