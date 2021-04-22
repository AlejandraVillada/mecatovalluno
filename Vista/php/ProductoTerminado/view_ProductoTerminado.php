<link rel="stylesheet" href="../../layout/Style.css">
<?php
include_once ("../../layout/header.php");
?>

<div class="container-fluid">
    <!-- menu -->
    <?php
        include_once ("../../layout/menu_cerrarSesion.php");
    ?>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 banner-links">
            <div class="links1">
                <a href="#" id="inventarioPT">Inventario Producto Terminado</a>
                <br>
                <a href="#" id="gestionPT">Gestion de Producto Terminado</a>
            </div>
        </div>
        <div class="col-8 tabla-form">

        </div>
    </div>
</div>
<div class="contacto">
    <div class="contenido_contacto">
        <div class="row">
            <div class="col-6 texto_contacto">
                <p>Contacto</p>
                <p>Sedes</p>
                <p>Direccion</p>
                <p>Telefonos</p>
            </div>
            <div class="col-6">
                <img src="../../img/picadita_MCC.jpg" alt="" class="img_contacto">
            </div>
        </div>
    </div>
</div>
<!-- copyright -->
<div class="copyright">
    <h5 style="text-align: center;">@COPYRIGHT</h5>
</div>
</div>


<?php
include_once ("../../layout/footer.php");
?>