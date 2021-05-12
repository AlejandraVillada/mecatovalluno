<div class="card">
    <div class="card-body">
        <form id="formCrearSede">
            <div class="form-group">
                <label for="NombreSede">Nombre Sede</label>
                <input type="text" class="form-control" name="NombreSede" id="NombreSede" placeholder="Ingrese el nombre de la sede">
            </div>
            <div class="form-group">
                <label for="IdCiudad">Nombre Ciudad</label>
                <select name="IdCiudad" id="IdCiudad" class="form-control">
                    <option value="default">Seleccione Ciudad...</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                    <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip">Registrar
                        Pais</button>
                    <a href="./adminper.php" id="cerrar" class="btn btn-danger"
                        data-toggle="tooltip">Regresar</a>
                </div>

                <input type="hidden" id="nuevo_sede" value="nuevo_sede" name="accion" />
        </form>
    </div>
</div>