<div class="card-body">
    <form action="" method="POST" id="formModP">

        <div class="form-group">
            <label for="nombreMP">Fecha</label>
            <input required type="date" name="DiaProduccion" id="DiaProduccion" placeholder="" class="form-control">
            <input type="hidden" name="IdProduccion" id="IdProduccion" placeholder="" class="form-control">
        </div>

        <div class="form-group">
            <label for="idMP">Hora de Inicio</label>
            <input required type="time" name="HorarioInicioProduccion" id="HorarioInicioProduccion"
                class="form-control">
        </div>

        <div class="form-group">
            <label for="idMP">Hora de Inicio</label>
            <input required type="time" name="HorarioFinProduccion" id="HorarioFinProduccion" class="form-control">
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
        <input type="submit" class="btn btn-primary nuevo" value="Actualizar">
        <a id="volvermodprod" class="btn btn-danger">Regresar</a>
    </form>
</div>