<div class="card">
    <div class="card-body">
        <form id="formCrearCliente">
            <div class="form-group">
                <label for="IdCliente">Cédula del cliente</label>
                <input type="text" class="form-control" name="IdCliente" id="IdCliente">
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
                    <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip">Registrar
                        Cliente</button>
                    <a href="./adminper.php" id="cerrar" class="btn btn-danger"
                        data-toggle="tooltip">Regresar</a>
                        <!-- <a href="../Clientes/view_Clientes.php" id="cerrar" class="btn btn-danger"
                        data-toggle="tooltip">Regresar</a> -->
                </div>

                <input type="hidden" id="nuevo" value="nuevo" name="accion" />
        </form>
    </div>
</div>