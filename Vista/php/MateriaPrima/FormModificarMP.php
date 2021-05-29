<div class="card-body">
    <form id="formModificarMP">
        <input type="hidden" id="IdMateriaPrima" name="IdMateriaPrima">

        <div class="form-group">
            <label for="NombreMateriaPrima">Nombre Materia Prima</label>
            <input type="text" class="form-control" name="NombreMateriaPrima" id="NombreMateriaPrima" required>
        </div>
        <div class="form-group">
            <label for="Stock">Stock Materia Prima</label>
            <input type="number" class="form-control" name="Stock" id="Stock" required>
        </div>
        <div class="form-group">
            <label for="IdMedida">Seleccione Medida</label>
            <select name="IdMedida" id="IdMedida" class="form-control" required>
                <option value="">Seleccione la Medida</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" id="actualizar" data-toggle="tooltip" class="btn btn-primary">Actualizar</button>
            <button id="cerrar" type="button" class="btn btn-danger" data-toggle="tooltip">Regresar</button>

        </div>

        <input type="hidden" id="editar" value="editar" name="accion" />
    </form>
</div>