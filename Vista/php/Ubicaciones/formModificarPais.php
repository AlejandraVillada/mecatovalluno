<div class="card">
    <div class="card-body">
        <form id="formModificarPais">
            <input type="hidden" id="IdPais" name="IdPais">
            <div class="form-group">
                <label for="NombrePais">Nombre Pais</label>
                <input type="text" class="form-control" name="NombrePais" id="NombrePais"
                    placeholder="Ingrese el nombre del pais">
            </div>
            <br>
            <button class="btn btn-info" id="actualizar">Modificar registro</button>
            <a href="../Ubicaciones/view_paises.php" class="btn btn-danger">Regresar</a>
            <input type="hidden" id="editar_pais" value="editar_pais" name="accion" />
        </form>
    </div>
</div>