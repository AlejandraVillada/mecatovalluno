<body class="container">

    <div id="seccion-det-proveedores">

        <div class="card-body">

            <form id="datos2">

                <div class="form-group">
                    <label># Detalle</label>
                    <input type="text" class="form-control" id="IdDetalleProveedor" name="IdDetalleProveedor"
                        placeholder="Ingrese # de Detalle Proveedor" value="" readonly>
                </div>

                <div class="form-group">
                    <label>Proveedor</label>
                    <select class="form-control" id="IdProveedor" name="IdProveedor">
                        <option value="default">Seleccione El Proveedor</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Materia Prima</label>
                    <select class="form-control" id="IdMateriaPrima" name="IdMateriaPrima">
                        <option value="default">Seleccione El Producto</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="button" id="actualizar2" class="btn btn-primary" data-toggle="tooltip">Cambiar
                        Producto</button>
                    <a href="./adminper.php" id="cerrar" class="btn btn-danger" data-toggle="tooltip">Regresar</a>
                </div>

                <input type="hidden" id="editar_det_proveedor" value="editar_det_proveedor" name="accion" />

            </form>
        </div>
    </div>