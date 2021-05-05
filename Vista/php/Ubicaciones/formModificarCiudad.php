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
            <button class="btn btn-info" id="actualizar">Modificar registro</button>
            <a href="../Ubicaciones/view_ciudades.php" class="btn btn-danger">Regresar</a>
            <input type="hidden" id="editar_ciudad" value="editar_ciudad" name="accion" />
        </form>
    </div>
</div>