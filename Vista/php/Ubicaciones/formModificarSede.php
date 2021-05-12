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
            <div class="form-group">
                    <button type="button" id="actualizar" data-toggle="tooltip"
                        class="btn btn-primary">Actualizar</button>
                    <a href="./adminper.php" id="cancelar" data-toggle="tooltip"
                        class="btn btn-danger btncerrar3">
                        Regresar </a>
                </div>

                <input type="hidden" id="editar_sede" value="editar_sede" name="accion" />
        </form>
    </div>
</div>