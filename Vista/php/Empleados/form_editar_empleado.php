<body class="container">

    <div id="seccion-empleados">

        <div class="card-body">

            <form id="datos">

                <div class="form-group">
                    <label>Cedula</label>
                    <input type="number" class="form-control" id="IdEmpleado" name="IdEmpleado"
                        placeholder="Modifique ID o CC del Empleado" value="" readonly required>
                </div>

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="NombreEmpleado" name="NombreEmpleado"
                        placeholder="Modifique Nombre del Empleado" value="" required>
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
                        <option value="">Seleccione un Cargo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="IdSede">Sede</label>
                    <select class="form-control" id="IdSede" name="IdSede" required>
                        <option value="">Seleccione una Sede</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control" id="IdEstado" name="IdEstado" required>
                        <option value="">Seleccione el Estado</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" id="actualizar" data-toggle="tooltip"
                        class="btn btn-primary">Actualizar</button>
                        <button id="cerrar" type="button" class="btn btn-danger"
                        data-toggle="tooltip">Regresar</button>
                        
                </div>

                <input type="hidden" id="editar" value="editar" name="accion" />

            </form>

        </div>
    </div>