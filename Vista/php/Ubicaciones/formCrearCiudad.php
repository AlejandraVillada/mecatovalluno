<div class="card-body">
    <!-- <div class="card-body"> -->
        <form id="formCrearCiudad">
            <div class="form-group">
                <label for="NombreCiudad">Nombre Ciudad</label>
                <input type="text" class="form-control" name="NombreCiudad" id="NombreCiudad"
                    placeholder="Ingrese el nombre de la Ciudad">
            </div>
            <div class="form-group">
                <label for="IdPais">Nombre País</label>
                <select name="IdPais" id="IdPais" class="form-control">
                    <option value="default">Seleccione el País</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip">Ingresar Ciudad</button>
                <a href="./adminper.php" id="cerrar" class="btn btn-danger" data-toggle="tooltip">Regresar</a>
            </div>

            <input type="hidden" id="nuevo_ciudad" value="nuevo_ciudad" name="accion" />
        </form>
    <!-- </div> -->
</div>