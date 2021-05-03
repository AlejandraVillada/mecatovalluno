<?php// include_once "../../../Templates/header1.php";?>


<!-- quick email widget -->

<div class="card-body">
    <div class="panel-group">
        <div class="panel panel-primary">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" id="finventariomp">
                    <div class="form-group">
                        <label class="form-label">Producto:</label>
                        <div class="form-group col-sm-10">
                            <span class="form-group-addon mr-2"><i class="fas fa-building"></i></span>
                            <select class="form-control" name="IdMateriaPrima" id="Productos">

                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="NombreMateriaPrima">Cantidad Actual:</label>
                        <div class="form-group col-sm-10">
                            <span class="form-group-addon mr-2"><i class="fas fa-building"></i></span>
                            <input class="form-control" type="text" id="Cantidad_Actual1" disabled>
                            <input class="form-control" type="hidden" id="Cantidad_Actual" name="Cantidad_Actual" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group col-sm-10">
                            <div class="row">
                                <div class="col">
                                    <span class="form-group-addon mr-2"><i class="fas fa-building"></i></span>
                                    <label class="control-label " for="NombreMateriaPrima">Cantidad a Ingresar:</label>

                                    <input class="form-control" type="text" name="Stock">

                                </div>
                                <div class="col-sm-4">
                                    <label for="">Medida</label>
                                    <input class="form-control" type="text" name="Medida" id="Medida" disabled>
                                    <input type="hidden" name="accion" value="actualizar">
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" value=" Actualizar Stock">

                            <button type="button" id="cerrar" class="btn btn-success btncerrar" data-toggle="tooltip"
                                title="Cancelar">Cancelar</button>
                        </div>
                    </div>

                    </fieldset>

                </form>
            </div>
            <?php// include_once "../../../Templates/footer1.php";?>

            <script src="../../../Recursos/js/materia_prima/materia_prima_invntario1.js"></script>
            <script>
            // $(document).ready(inventario);
            </script>