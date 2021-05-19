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
                    <option value="default">Seleccione Estado..</option>
                </select>
            </div>
            <div class="form-group">
                <label for="IdCuidad">Ciudad</label>
                <select name="IdCiudad" id="IdCiudad" class="form-control">
                    <option value="default">Seleccione Ciudad..</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <button type="button" id="actualizar" data-toggle="tooltip" class="btn btn-primary">Actualizar</button>
                <a href="./adminper.php" id="cancelar" data-toggle="tooltip"
                    class="btn btn-danger btncerrar3">
                    Regresar</a>
                <!-- <a href="../Clientes/view_Clientes.php" id="cancelar" data-toggle="tooltip"
                        class="btn btn-danger btncerrar3">
                        Regresar</a> -->
            </div>

            <input type="hidden" id="editar" value="editar" name="accion" />
        </form>
    </div>
</div>