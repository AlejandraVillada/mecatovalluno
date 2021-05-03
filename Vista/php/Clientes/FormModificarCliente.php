<div class="card">
    <div class="card-body">
        <form id="formModificarCliente">
            <div class="form-group">
                <label for="IdCliente">Cédula del cliente</label>
                <input type="text" class="form-control" name="IdCliente" id="IdCliente" readonly>
            </div>
            <div class="form-group">
                <label for="NombreCliente">Nombre Cliente</label>
                <input type="text" class="form-control" name="NombreCliente" id="NombreCliente">
            </div>
            <div class="form-group">
                <label for="Email">Correo Electronico</label>
                <input type="text" class="form-control" name="Email" id="Email">
            </div>
            <div class="form-group">
                <label for="Direccion">Direccion</label>
                <input type="text" class="form-control" name="Direccion" id="Direccion">
            </div>
            <div class="form-group">
                <label for="Telefono">Telefono</label>
                <input type="text" class="form-control" name="Telefono" id="Telefono">
            </div>
            <div class="form-group">
                <label for="IdEstado">Estado</label>
                <select name="IdEstado" id="IdEstado" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="IdCuidad">Ciudad</label>
                <select name="IdCiudad" id="IdCiudad" class="form-control">
                </select>
            </div>
            <br>
            <button class="btn btn-dark" id="actualizar">Modificar registro</button>
            <a href="../Clientes/view_Clientes.php" class="btn btn-dark">Regresar</a>
            <input type="hidden" id="editar" value="editar" name="accion" />
        </form>
    </div>
</div>