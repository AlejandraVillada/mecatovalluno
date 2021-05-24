<body class="container">

    <div id="seccion-proveedores">

        <div class="card-body">

            <form id="datos1">

                <!-- <div class="form-group">
                    <label>NIT</label>
                    <input type="text" class="form-control" id="IdProveedor" name="IdProveedor"
                        placeholder="Ingrese ID o NIT del Proveedor" value="">
                </div> -->

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="NombreProveedor" name="NombreProveedor"
                        placeholder="Ingrese nombre del Proveedor" value="" required>
                </div>

                <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control" id="IdEstado" name="IdEstado" required>
                        <option value="">Seleccione el Estado</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" id="grabar1" class="btn btn-primary" data-toggle="tooltip">Crear
                        Proveedor</button>
                    <a href="./adminper.php" id="cerrar" class="btn btn-danger" data-toggle="tooltip">Regresar</a>
                </div>

                <input type="hidden" id="nuevo_proveedor" value="nuevo_proveedor" name="accion" />

            </form>
        </div>
    </div>