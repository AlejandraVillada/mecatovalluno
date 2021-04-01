<?php include_once __DIR__."../../layout/header.php"?>

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
                    <div class="col-3 texto_bienvenido2">
                            <h1 class="card-title">Bienvenido</h1>
                            <h4 class="card-text">Jefe de produccion</h4>
                            <p id="nombre_empleado"></p>
                    </div>
                    <div class="col-3">
                        <div class="opciones">
                            <div class="opcion opcion1">
                                <a href="#"></a>
                            </div>
                            <div class="descripcion_boton1">
                                <p>Programacion de
                                <br>
                                    Produccion
                                </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="opciones">
                            <div class="opcion opcion2">
                                <a href="#"></a>
                            </div>
                            <div class="descripcion_boton1">
                                <p>Ingreso producto
                                <br>
                                    Terminado
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="opciones">
                            <div class="opcion opcion3">
                                <a href="#"></a>
                            </div>
                            <div class="descripcion_boton1">
                                <p>Gestion Proveedores</p>
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
                <div class="col-2">
                    <div class="opcion opcion4">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_boton">
                        <p>Compra Materia
                        <br>
                            Prima
                        </p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion5">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_boton">
                        <p>Gestion Inventario
                        <br>
                            Producto Terminado
                        </p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion6">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_boton">
                        <p>Visualizar Nomina</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion7">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_boton">
                        <p>Actualizacion Datos
                        <br>
                            Personales
                        </p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion8">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_boton">
                        <p>Gestion Inventario
                        <br>
                            Materia Prima
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contactanos -->
    <?php
    include_once("../layout/contactanos.php");
    ?>
    <!-- Copyright -->
    <div class="copyright">
        <h5 style="text-align: center;">@COPYRIGHT</h5>
    </div>
</div>    



















<?php
include_once ("../layout/footer.php");
?>

