<link rel="stylesheet" href="../layout/style.css">
<?php
include_once ("../layout/header.php");
?>

<div class="container">
<!-- menu -->
<?php
    include_once ("../layout/menu_cerrarEmpleados.php");
?>
    <!-- acceso rapido -->
    <div class="acceso_rapido" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body" style="padding: 30px;">
                <div class="row botones_acceso">
                    <div class="col-4 texto_bienvenido">
                            <h1 class="card-title">Bienvenido(a)</h1>
                            <h4 class="card-text">Asesor de Ventas</h4>
                            <p id="nombre_empleado"></p>
                    </div>
                    <div class="col-3">
                        <div class="opciones">
                            <div class="opcion opcion1">
                                <a href="#"></a>
                            </div>
                            <div class="descripcion_botones2">
                                <p>Actualizar Datos Cliente
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="opciones">
                            <div class="opcion opcion2">
                                <a href="#"></a>
                            </div>
                            <div class="descripcion_botones2">
                                <p>Venta de Productos
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Botones de seccion -->
    <div class="seccion_botones">
        <div class="botones_acceso">
            <div class="row linea">
                <div class="col-3">
                    <div class="opcion opcion3">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones">
                        <p>Compra Materia Prima
                        </p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="opcion opcion4">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones">
                        <p>Ingreso Productos
                        </p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="opcion opcion5">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones">
                        <p>Visualizar Nómina</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="opcion opcion6">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones">
                        <p>Actualización Datos
                        <br>
                            Personales
                        </p>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>

<?php
include_once ("../layout/footer.php");
?>