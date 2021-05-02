<div class="card">
    <div class="card-body">
        <form id="formModificarMP">
        <input type="hidden" id="IdMateriaPrima" name="IdMateriaPrima">

            <div class="form-group">
                <label for="NombreMateriaPrima">Nombre Materia Prima</label>
                <input type="text" class="form-control" name="NombreMateriaPrima" id="NombreMateriaPrima">
            </div>
            <div class="form-group">
                <label for="Stock">Stock Materia Prima</label>
                <input type="text" class="form-control" name="Stock" id="Stock">
            </div>
            <div class="form-group">
                <label for="IdMedida">Seleccione Medida</label>
                <select name="IdMedida" id="IdMedida" class="form-control">

                </select>
            </div>
            <br>
            <button class="btn btn-dark" id="actualizar">Modificar registro</button>
            <a href="../MateriaPrima/view_MateriaPrima.php" class="btn btn-dark">Regresar</a>
            <input type="hidden" id="editar" value="editar" name="accion"/>
        </form>
    </div>
</div>