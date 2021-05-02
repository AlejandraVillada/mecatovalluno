  <div class="card">
      <div class="card-body">
          <form id="formCrearMP">
              <div class="form-group">
                  <label for="nombreMP">Nombre Materia Prima</label>
                  <input type="text" placeholder="Ingerese el nombre de Materia Prima" class="form-control"
                      name="NombreMateriaPrima">
              </div>
              <div class="form-group">
                  <label for="Stock">Stock Materia Prima</label>
                  <input type="text" placeholder="Ingerese el stock de Materia Prima" class="form-control" name="Stock"
                      id="Stock">
              </div>
              <div class="form-group">
                  <label for="IdMedida">Medida Materia Prima</label>
                  <select name="IdMedida" id="IdMedida" class="form-control">
                      <option value="default">Seleccione la Medida</option>
                  </select>
              </div>
              <br>
              <button class="btn btn-dark" id="grabar">Crear registro</button>
              <a href="../MateriaPrima/view_MateriaPrima.php" class="btn btn-dark regresar">Regresar</a>

              <input type="hidden" id="nuevo" value="nuevo" name="accion"/>
          </form>
      </div>
  </div>
  <div style="margin: 20px;"></div>
  </div>