<div class="card-body">
    <!-- <div class="card-body"> -->
    <form id="formModificarPais">
        <input type="hidden" id="IdPais" name="IdPais">
        <div class="form-group">
            <label for="NombrePais">Nombre País</label>
            <input type="text" class="form-control" name="NombrePais" id="NombrePais"
                placeholder="Ingrese el nombre del País" required>
        </div>
        <div class="form-group">
            <label>Estado</label>
            <select class="form-control" id="IdEstado" name="IdEstado" required>
                <option value="">Seleccione el Estado</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" id="actualizar" data-toggle="tooltip" class="btn btn-primary">Actualizar</button>
            <button id="cerrar" data-toggle="tooltip" class="btn btn-danger btncerrar3">
                Regresar </button>
        </div>

        <input type="hidden" id="editar_pais" value="editar_pais" name="accion" />
    </form>
    <!-- </div> -->
</div>