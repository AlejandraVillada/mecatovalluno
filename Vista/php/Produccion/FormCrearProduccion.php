<div class="card-body">
    <form action="" method="POST" id="formCrearP">

        <div class="form-group">
            <label for="nombreMP">Fecha</label>
            <input required type="date" name="DiaProduccion" placeholder="" class="form-control">
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
        <input type="hidden" name="accion" value="nuevo">
        <input type="submit" class="btn btn-primary nuevo" value="Crear Registro">
        <a id="volvercrearprod" class="btn btn-danger">Regresar</a>
    </form>
</div>