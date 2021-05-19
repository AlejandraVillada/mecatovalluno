<div class="card">
    <div class="card-body">
        <form id="formModificarCiudad">
        <input type="hidden" id="IdCiudad" name="IdCiudad">
            <div class="form-group">
                <label for="NombreCiudad">Nombre Ciudad</label>
                <input type="text" class="form-control" name="NombreCiudad" id="NombreCiudad"
                    placeholder="Ingrese el nombre del pais">
            </div>
            <div class="form-group">
                <label for="IdPais">Nombre Pais</label>
                <select name="IdPais" id="IdPais" class="form-control">
                    <option value="default">Seleccione Pais...</option>
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

                <input type="hidden" id="editar_ciudad" value="editar_ciudad" name="accion" />
        </form>
    </div>
</div>