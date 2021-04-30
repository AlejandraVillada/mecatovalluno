<?php //include_once ("../../Funciones/sessiones.php"); ?>
<!-- quick email widget -->

<div class="card-body">
    <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" id="finventariomp">
                    <div class="form-group">
                        <label class="control-label col-sm-1" for="comu_codi">Codigo:</label>
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon"><i class="fas fa-tags"></i></span>
                            <input type="text" class="form-control " id="IdMateriaPrima" name="IdMateriaPrima"
                                placeholder="Ingrese Codigo" value="" readonly="true"
                                data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-1" for="NombreMateriaPrima">Nombre:</label>
                        <div class="input-group col-sm-10">
                            <span class="input-group-addon"><i class="fas fa-building"></i></span>
                            <input type="text" class="form-control" id="NombreMateriaPrima" name="NombreMateriaPrima"
                                placeholder="Ingrese Nombre Producto" value="">
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip"
                                title="Grabar ">Grabar </button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar" data-toggle="tooltip"
                                title="Cancelar">Cancelar</button>
                        </div>
                    </div>

                    <input type="hidden" id="nuevo" value="nuevo" name="accion" />
                    </fieldset>

                </form>
            </div>