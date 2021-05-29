<?php
include_once __DIR__ . "/Funciones/sessiones.php";
include_once __DIR__ . '/Templates/header.php';

include_once __DIR__ . '/Templates/barra.php';

include_once __DIR__ . '/Templates/navegacion.php';
//session_start();
?>
<style>
.cartas {
    width: 350px;
    height: 150px;
    max-width: 350px;
    max-height: 200px;
    margin-bottom: 100px;
    border-radius: 50px;
    text-align: center;
    padding-top: auto;
    padding-bottom: auto;
    display: table-cell;
    vertical-align: middle;
    justify-content: center;
    background:linear-gradient(to right, rgb(255, 187, 0),rgb(207, 45, 45));
    border:0px;
    

}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color:rgb(255, 255, 255)">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="mt-4 mb-5">
            <div class="jumbotron" style="background-color:rgb(149, 16, 9) ;color:rgb(255, 255, 255);">
                <h1 class="text-center" style="font-size: 50px; font-family: fantasy;">Bienvenid@
                    <?php echo $_SESSION["NombreEmpleado"]; ?></h1>
            </div>
        </div>
        <!-- Carrusel -->
        <div class="center-block">
            <div id="carouselExampleControls" class="carousel slide center-block" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./Vista/img/1.png" class="img-responsive" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./Vista/img/2.png" class="img-responsive" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./Vista/img/3.png" class="img-responsive" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="row mt-5 ">
            <div class="col">
                <div class="card cartas mb-5">
                    <div class="row">
                        <div class="col-4">
                            <h1>0</h1>
                        </div>
                        <div class="col">
                            <h1>Ventas Hoy</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card cartas mb-5">
                    <div class="row">
                        <div class="col-4">
                            <h1>0%</h1>
                        </div>
                        <div class="col">
                            <h1>Producción</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card cartas mb-5">
                    <div class="row">
                        <div class="col-4">
                            <h1>0</h1>
                        </div>
                        <div class="col">
                            <h1>Ventas Mes</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5"></div>

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<?php
include_once __DIR__ . '/Templates/footer.php';
?>
