<div class="card-body">
    <!-- <div class="card-body"> -->
    <form id="formModificarUsuario">
        <div class="form-group">
            <label for="IdUsuario">Id Usuario</label>
            <input type="number" class="form-control" name="IdUsuario" id="IdUsuario" required>
        </div>
        <div class="form-group">
            <label for="Usuario">Usuario</label>
            <input type="text" class="form-control" name="Usuario" id="Usuario" required>
        </div>
        <div class="form-group">
            <label for="IdTipoUsuario">Tipo Usuario</label>
            <select name="IdTipoUsuario" id="IdTipoUsuario" class="form-control" required>
                <option value="">Seleccione Tipo de Usuario</option>
            </select>
        </div>
        <input type="hidden" id="editar" value="editar" name="accion" />
    </form>
    <div class="form-group">
        <label for="Contrasena">Contraseña</label>
        <input type="password" class="form-control" name="Contrasena" id="Contrasena"
            placeholder="Escribir la contraseña por la cual se modificará">
    </div>
    <br>
    <button type="submit" class="btn btn-info" id="actualizar">Actualizar Usuario</button>
    <button id="cerrar" type="button" class="btn btn-danger" data-toggle="tooltip">Regresar</button>


    <!-- </div> -->
</div>