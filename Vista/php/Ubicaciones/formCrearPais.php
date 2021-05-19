<div class="card">
    <div class="card-body">
        <form id="formCrearPais">
            <div class="form-group">
                <label for="NombrePais">Nombre Pais</label>
                <input type="text" class="form-control" name="NombrePais" id="NombrePais"
                    placeholder="Ingrese el nombre del pais">
            </div>
            <br>
            <div class="form-group">
                    <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip">Registrar
                        Pais</button>
                    <a href="./adminper.php" id="cerrar" class="btn btn-danger"
                        data-toggle="tooltip">Regresar</a>
                </div>

                <input type="hidden" id="nuevo_pais" value="nuevo_pais" name="accion" />
        </form>
    </div>
</div>