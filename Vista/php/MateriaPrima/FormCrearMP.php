<div class="card-body">
    <form id="formCrearMP">
        <div class="form-group">
            <label for="nombreMP">Nombre Materia Prima</label>
            <input type="text" placeholder="Ingrese el nombre de la Materia Prima" class="form-control"
                name="NombreMateriaPrima" required>
        </div>
        <div class="form-group">
            <label for="Stock">Stock Materia Prima</label>
            <input type="number" placeholder="Ingrese el stock de la Materia Prima" class="form-control" name="Stock"
                id="Stock" required>
        </div>
        <div class="form-group">
            <label for="IdMedida">Medida Materia Prima</label>
            <select name="IdMedida" id="IdMedida" class="form-control" required>
                <option value="">Seleccione la Medida</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" id="grabar" class="btn btn-primary" data-toggle="tooltip">Ingresar Materia
                Prima</button>
            <button id="cerrar" type="button" class="btn btn-danger" data-toggle="tooltip">Regresar</button>
        </div>

        <input type="hidden" id="nuevo" value="nuevo" name="accion" />
    </form>
</div>