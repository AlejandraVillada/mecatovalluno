<div class="card">
    <div class="card-header" style="text-align: center; ">
        <h1>Crear Produccion Terminado</h1>
    </div>
    <div class="card-body">
        <form action="" method="POST" id="formModP">

            <div class="form-group">
                <label for="nombreMP">Fecha</label>
                <input required type="date" name="DiaProduccion" placeholder="" class="form-control">
                <input  type="hidden" name="IdProduccion" placeholder="" class="form-control">
            </div>
            <div class="form-group">
                <label for="idMP">Hora de Inicio</label>
                <input required type="time" name="HorarioInicioProduccion" class="form-control">
            </div>
            <div class="form-group">
                <label for="idMP">Hora de Inicio</label>
                <input required type="time" name="HorarioFinProduccion" class="form-control">
            </div>
            <div class="form-group">
                <select required class="form-control" name="Estado" id="Estado">
                </select>
            </div>
            <div class="form-group">
                <select required class="form-control" name="IdSede" id="IdSede">
                </select>
            </div>
            <br>
            <input type="hidden" name="accion" value="actualizar">
            <input type="submit" class="btn btn-dark nuevo" value="Actualizar">
            <a href="view_Produccion.php" class="btn btn-dark">Regresar</a>
        </form>
    </div>
</div>