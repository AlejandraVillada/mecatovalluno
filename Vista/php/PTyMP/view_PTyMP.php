<link rel="stylesheet" href="../layout/Style.css">
<?php
include_once ("../layout/header.php");
?>

<div class="container-fluid">
<!-- menu -->
    <?php
        include_once ("../layout/menu_cerrarSesion.php");
    ?>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 banner-links">
            <div class="links1">
                <a href="#" id="inventarioPT" >Inventario Producto Terminado</a>
                <br>
                <a href="#" id="inventarioMP">Inventario Materia Prima</a>
                <br>
                <a href="#" id="gestionPT" >Gestion de Producto Terminado</a>
                <br>
                <a href="#" id="gestionMP">Gestion de Materia Prima</a>
                <br>
                <a href="#" id="compraMP">Compra de Materia Prima</a>
            </div>
        </div>
        <div class="col-8 tabla-form">
            
        </div>
    </div>
</div>

<?php
    include_once ("../layout/contactanos.php");
?>
    <!-- copyright -->
    <div class="copyright">
        <h5 style="text-align: center;">@COPYRIGHT</h5>
    </div>
</div>


<?php
include_once ("../layout/footer.php");
?>

