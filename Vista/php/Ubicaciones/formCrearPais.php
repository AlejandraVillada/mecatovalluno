<div class="card-body">
    <!-- <div class="card-body"> -->
        <form id="formCrearPais">
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
                <button type="submit" id="grabar" class="btn btn-primary" data-toggle="tooltip">Ingresar
                    País</button>
                <button id="cerrar" type="button" class="btn btn-danger" data-toggle="tooltip">Regresar</button>
            </div>

            <input type="hidden" id="nuevo_pais" value="nuevo_pais" name="accion" />
        </form>
    <!-- </div> -->
</div>