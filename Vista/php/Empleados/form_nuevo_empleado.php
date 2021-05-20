<body class="container">

    <div id="seccion-empleados">

        <div class="card-body">

            <form id="datos">

                <div class="form-group">
                    <label>Cedula</label>
                    <input type="number" class="form-control" id="IdEmpleado" name="IdEmpleado"
                        placeholder="Ingrese ID o CC del Empleado" value="" required>
                </div>

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="NombreEmpleado" name="NombreEmpleado"
                        placeholder="Ingrese Nombre del Empleado" value="" required>
                </div>

                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" id="Email" name="Email"
                        placeholder="Modifique Correo del Empleado" value="" required>
                </div>

                <div class="form-group">
                    <label>Sueldo Base</label>
                    <input type="number" class="form-control" id="SueldoBase" name="SueldoBase"
                        placeholder="Modifique Sueldo del Empleado" value="" required>
                </div>

                <div class="form-group">
                    <label>Telefono</label>
                    <input type="number" class="form-control" id="Telefono" name="Telefono"
                        placeholder="Modifique Telefono del Empleado" value="" required>
                </div>

                <div class="form-group">
                    <label for="Cargo">Cargo</label>
                    <select class="form-control" id="Cargo" name="Cargo" required>
                        <option value="">Seleccione un cargo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="IdSede">Sede</label>
                    <select class="form-control" id="IdSede" name="IdSede" required>
                        <option value="">Seleccione una sede</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control" id="IdEstado" name="IdEstado" required>
                        <option value="">Seleccione Estado</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" id="grabar" class="btn btn-primary" data-toggle="tooltip">Registrar
                        Empleado</button>
                        <a href="./adminper.php" id="cerrar" class="btn btn-danger"
                        data-toggle="tooltip">Regresar</a>
                </div>

                <input type="hidden" id="nuevo" value="nuevo" name="accion" />

            </form>
        </div>
    </div>