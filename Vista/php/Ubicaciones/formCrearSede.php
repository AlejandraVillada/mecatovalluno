<div class="card-body">
    <!-- <div class="card-body"> -->
    <form id="formCrearSede">
        <div class="form-group">
            <label for="NombreSede">Nombre Sede</label>
            <input type="text" class="form-control" name="NombreSede" id="NombreSede"
                placeholder="Ingrese el nombre de la Sede" required>
        </div>
        <div class="form-group">
            <label for="IdCiudad">Nombre Ciudad</label>
            <select name="IdCiudad" id="IdCiudad" class="form-control" required>
                <option value="">Seleccione la Ciudad</option>
            </select>
        </div>
        <div class="form-group">
            <label>Estado</label>
            <select class="form-control" id="IdEstado" name="IdEstado" required>
                <option value="">Seleccione el Estado</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" id="grabar" class="btn btn-primary" data-toggle="tooltip">Ingresar Sede</button>
            <button id="cerrar" class="btn btn-danger" data-toggle="tooltip">Regresar</button>
        </div>

        <input type="hidden" id="nuevo_sede" value="nuevo_sede" name="accion" />
    </form>
    <!-- </div> -->
</div>