<div class="card-body">
    <!-- <div class="card-body"> -->
    <form id="formCrearCiudad">
        <div class="form-group">
            <label for="NombreCiudad">Nombre Ciudad</label>
            <input type="text" class="form-control" name="NombreCiudad" id="NombreCiudad"
                placeholder="Ingrese el nombre de la Ciudad" required>
        </div>
        <div class="form-group">
            <label for="IdPais">Nombre País</label>
            <select name="IdPais" id="IdPais" class="form-control" required>
                <option value="">Seleccione el País</option>
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
            <button type="submit" id="grabar" class="btn btn-primary" data-toggle="tooltip">Ingresar Ciudad</button>
            <button id="cerrar" class="btn btn-danger" data-toggle="tooltip">Regresar</button>
        </div>

        <input type="hidden" id="nuevo_ciudad" value="nuevo_ciudad" name="accion" />
    </form>
    <!-- </div> -->
</div>