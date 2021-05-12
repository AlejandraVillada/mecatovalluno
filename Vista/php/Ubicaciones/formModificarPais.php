<div class="card">
    <div class="card-body">
        <form id="formModificarPais">
            <input type="hidden" id="IdPais" name="IdPais">
            <div class="form-group">
                <label for="NombrePais">Nombre Pais</label>
                <input type="text" class="form-control" name="NombrePais" id="NombrePais"
                    placeholder="Ingrese el nombre del pais">
            </div>
            <br>
            <div class="form-group">
                    <button type="button" id="actualizar" data-toggle="tooltip"
                        class="btn btn-primary">Actualizar</button>
                    <a href="./adminper.php" id="cancelar" data-toggle="tooltip"
                        class="btn btn-danger btncerrar3">
                        Regresar </a>
                </div>

                <input type="hidden" id="editar_pais" value="editar_pais" name="accion" />
        </form>
    </div>
</div>