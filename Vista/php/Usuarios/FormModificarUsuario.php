<div class="card">
    <div class="card-body">
        <form id="formModificarUsuario">
            <div class="form-group">
                <label for="IdUsuario">Id Usuario</label>
                <input type="text" class="form-control" name="IdUsuario" id="IdUsuario">
            </div>
            <div class="form-group">
                <label for="Usuario">Usuario</label>
                <input type="text" class="form-control" name="Usuario" id="Usuario">
            </div>
            <div class="form-group">
                <label for="IdTipoUsuario">Tipo Usuario</label>
                <select name="IdTipoUsuario" id="IdTipoUsuario" class="form-control">
                    <option value="default">Seleccione Tipo de Usuario..</option>
                </select>
            </div>
            <input type="hidden" id="editar" value="editar" name="accion" />
        </form>
        <div class="form-group">
            <label for="Contrasena">Contraseña</label>
            <input type="password" class="form-control" name="Contrasena" id="Contrasena"
                placeholder="Escribir la contraseña por la cual se modificara">
        </div>
        <br>
        <button class="btn btn-info" id="actualizar">Modificar registro</button>
        <a href="./adminper.php" id="cerrar" class="btn btn-danger" data-toggle="tooltip">Regresar</a>


    </div>
</div>