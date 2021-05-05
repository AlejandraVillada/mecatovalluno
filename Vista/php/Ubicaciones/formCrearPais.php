<div class="card">
    <div class="card-body">
        <form id="formCrearCiudad">
            <div class="form-group">
                <label for="NombrePais">Nombre Pais</label>
                <input type="text" class="form-control" name="NombrePais" id="NombrePais"
                    placeholder="Ingrese el nombre del pais">
            </div>
            <br>
            <button class="btn btn-info" id="grabar">Crear registro</button>
            <a href="../Ubicaciones/view_paises.php" class="btn btn-danger">Regresar</a>
            <input type="hidden" id="nuevo_pais" value="nuevo_pais" name="accion" />
        </form>
    </div>
</div>