<div class="card-body">
    <!-- <div class="card-body"> -->
    <form id="formCrearCliente">
        <div class="form-group">
            <label for="IdCliente">Cédula del cliente</label>
            <input required type="number" class="form-control" name="IdCliente" id="IdCliente">
        </div>
        <div class="form-group">
            <label for="NombreCliente">Nombre Cliente</label>
            <input type="text" class="form-control" name="NombreCliente" id="NombreCliente" required>
        </div>
        <div class="form-group">
            <label for="Email">Correo Electronico</label>
            <input type="email" class="form-control" name="Email" id="Email" required>
        </div>
        <div class="form-group">
            <label for="Direccion">Dirección</label>
            <input type="text" class="form-control" name="Direccion" id="Direccion" required>
        </div>
        <div class="form-group">
            <label for="Telefono">Teléfono</label>
            <input type="number" class="form-control" name="Telefono" id="Telefono" required>
        </div>
        <div class="form-group">
            <label for="IdEstado">Estado</label>
            <select name="IdEstado" id="IdEstado" class="form-control" required>
                <option value="">Seleccione el Estado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="IdCuidad">Ciudad</label>
            <select name="IdCiudad" id="IdCiudad" class="form-control" required>
                <option value="">Seleccione la Ciudad</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" id="grabar" class="btn btn-primary" data-toggle="tooltip">Ingresar
                Cliente</button>
            <button id="cerrar" type="button" class="btn btn-danger" data-toggle="tooltip">Regresar</button>
            <!-- <a href="../Clientes/view_Clientes.php" id="cerrar" class="btn btn-danger"
                        data-toggle="tooltip">Regresar</a> -->
        </div>

        <input type="hidden" id="nuevo" value="nuevo" name="accion" />
    </form>
    <!-- </div> -->
</div>