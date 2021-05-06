<div class="card">
    <div class="card-body">
        <form id="formModificarSede">
            <input type="hidden" id="IdSede" name="IdSede">
            <div class="form-group">
                <label for="NombreSede">Nombre Sede</label>
                <input type="text" class="form-control" name="NombreSede" id="NombreSede"
                    placeholder="Ingrese el nombre de la sede">
            </div>
            <div class="form-group">
                <label for="IdCiudad">Nombre Ciudad</label>
                <select name="IdCiudad" id="IdCiudad" class="form-control">
                    <option value="default">Seleccione Ciudad...</option>
                </select>
            </div>
            <br>
            <button class="btn btn-info" id="actualizar">Modificar registro</button>
            <a href="../Ubicaciones/view_sedes.php" class="btn btn-danger">Regresar</a>
            <input type="hidden" id="editar_sede" value="editar_sede" name="accion" />
        </form>
    </div>
</div>