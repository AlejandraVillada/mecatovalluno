<body class="container">

    <div id="seccion-empleados">

        <div class="card-body">

            <form id="datos">

                <div class="form-group">
                    <label>Cedula</label>
                    <input type="text" class="form-control" id="IdEmpleado" name="IdEmpleado"
                        placeholder="Ingrese ID o CC del Empleado" value="">
                </div>

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="NombreEmpleado" name="NombreEmpleado"
                        placeholder="Ingrese Nombre del Empleado" value="">
                </div>

                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" id="Email" name="Email"
                        placeholder="Modifique Correo del Empleado" value="">
                </div>

                <div class="form-group">
                    <label>Sueldo Base</label>
                    <input type="text" class="form-control" id="SueldoBase" name="SueldoBase"
                        placeholder="Modifique Sueldo del Empleado" value="">
                </div>

                <div class="form-group">
                    <label>Telefono</label>
                    <input type="text" class="form-control" id="Telefono" name="Telefono"
                        placeholder="Modifique Telefono del Empleado" value="">
                </div>

                <div class="form-group">
                    <label for="muni_codi">Cargo</label>
                    <select class="form-control" id="Cargo" name="Cargo">
                        <option value="default">Seleccione un cargo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="muni_codi">Sede</label>
                    <select class="form-control" id="IdSede" name="IdSede">
                        <option value="default">Seleccione una sede</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Estado</label>
                    <input type="text" class="form-control" id="Estado" name="Estado"
                        placeholder="Modifique Estado Actual del Empleado" value="">
                </div>

                <div class="form-group">
                    <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip">Registrar
                        Empleado</button>
                    <a href="../Empleados/form_empleados.php" id="cerrar" class="btn btn-danger"
                        data-toggle="tooltip">Cancelar</a>
                </div>

                <input type="hidden" id="nuevo" value="nuevo" name="accion" />

            </form>
        </div>
    </div>