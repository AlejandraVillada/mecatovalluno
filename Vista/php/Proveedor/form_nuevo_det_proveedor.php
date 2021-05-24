<body class="container">

    <div id="seccion-det-proveedores">

        <div class="card-body">

            <form id="datos2">

                <div class="form-group">
                    <label># Detalle</label>
                    <input type="number" class="form-control" id="IdDetalleProveedor" name="IdDetalleProveedor"
                        placeholder="Ingrese # de Detalle Proveedor" value="" required>
                </div>

                <div class="form-group">
                    <label>Proveedor</label>
                    <input class="form-control" id="IdProveedor" name="IdProveedor" required readonly>
                </div>

                <div class="form-group">
                    <label>Materia Prima</label>
                    <select class="form-control" id="IdMateriaPrima" name="IdMateriaPrima" required>
                        <option value="">Seleccione El Producto</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" id="grabar2" class="btn btn-primary" data-toggle="tooltip">Asignar
                        Producto</button>
                    <a href="./adminper.php" id="cerrar" class="btn btn-danger" data-toggle="tooltip">Regresar</a>
                </div>

                <input type="hidden" id="nuevo_det_proveedor" value="nuevo_det_proveedor" name="accion" />

            </form>
        </div>
    </div>