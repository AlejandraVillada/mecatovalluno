<div class="card-body" id="seccion-proveedores">
    <!-- <div class="card-body"> -->
    <form id="datos1">

        <!-- <div class="form-group">
                    <label>NIT</label>
                    <input type="text" class="form-control" id="IdProveedor" name="IdProveedor"
                        placeholder="Ingrese ID o NIT del Proveedor" value="">
                </div> -->

        <input type="hidden" id="IdProveedor" name="IdProveedor">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" id="NombreProveedor" name="NombreProveedor"
                placeholder="Ingrese Nombre del Proveedor" value="" required>
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select class="form-control" id="IdEstado" name="IdEstado" required>
                <option value="">Seleccione el Estado</option>
            </select>
        </div>

        <div class="form-group">
            <button id="actualizar1" class="btn btn-primary" data-toggle="tooltip" type="submit">Actualizar</button>
            <button id="cerrar" type="button" class="btn btn-danger" data-toggle="tooltip">Regresar</button>
        </div>

        <input type="hidden" id="editar_proveedor" value="editar_proveedor" name="accion" />

    </form>
    <!-- </div> -->
</div>