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
                    <div class="col-3 texto_bienvenida">
                            <h1 class="card-title">Bienvenido</h1>
                            <h4 class="card-text">Administrador</h4>
                            <p id="nombre_empleado"></p>
                    </div>
                    <div class="col-3">
                        <div class="opciones">
                            <div class="opcion opcion1">
                                <a href="#"></a>
                            </div>
                            <div class="descripcion_botones2">
                                <p>Actualizar Datos
                                    <br>
                                    Cliente
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
                                <p>Venta de
                                    <br>
                                    Productos
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="opciones">
                            <div class="opcion opcion3">
                                <a href="#"></a>
                            </div>
                            <div class="descripcion_botones2">
                                <p>Gestión Producto
                                    <br>
                                    Terminado
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Botones Primera Seccion -->
    <div class="seccion_botones">
        <div class="botones_acceso">
            <div class="row conjunto_asesor2">
                <div class="col-2">
                    <div class="opcion opcion4">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
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
                    <div class="descripcion_botones3">
                        <p>Descripción Productos</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion6">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
                        <p>Visualizar Nomina</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion7">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
                        <p>Actualización Datos
                            <br>
                            Personales
                        </p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion8">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
                        <p>Gestion Materia
                            <br>
                            Prima
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Botones Segunda Sección-->
    <div class="seccion_botones">
        <div class="botones_acceso">
            <div class="row conjunto_asesor2">
                <div class="col-2">
                    <div class="opcion opcion4">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
                        <p>Gestión Proveedores</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion5">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
                        <p>Gestión Empleados</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion6">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
                        <p>Gestión Clientes</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion7">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
                        <p>Nómina</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion8">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
                        <p>Programación de
                            <br>
                            Producción
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Botones Tercera Sección-->
    <div class="seccion_botones">
        <div class="botones_acceso">
            <div class="row conjunto_asesor2">
                <div class="col-2">
                    <div class="opcion opcion4">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
                        <p>Gestión Localidades</p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion5">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
                        <p>Gestión de Inventario
                            <br>
                            Producto Terminado
                        </p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion6">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
                        <p>Gestión Inventario
                            <br>
                            Materia Prima
                        </p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="opcion opcion7">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_botones3">
                        <p>Gestión Nómina</p>
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

