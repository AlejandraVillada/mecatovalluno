<?php
  include_once __DIR__."./Funciones/sessiones.php";
  include_once __DIR__.'./Templates/header.php';

  include_once __DIR__.'./Templates/barra.php';

   include_once __DIR__.'./Templates/navegacion.php';
  session_start();
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="mt-4">
            <div class="jumbotron">
                <h1 class="text-center" style="font-size: 50px; font-family: fantasy;">Bienvenid@ <?php echo $_SESSION["NombreEmpleado"]; ?></h1>
            </div>
        </div>
        <!-- Carrusel -->
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner container">
                    <div class="carousel-item active">
                        <img style="height: 300px; width: 900px; display: block; margin: auto; " src="./Vista/img/picada.jpg" class="d-block" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img style="height: 300px; width: 900px; display: block; margin: auto; "  src="./Vista/img/picada2.jpg" class="d-block " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img style="height: 300px; width: 900px; display: block; margin: auto; "  src="./Vista/img/picada3.jpg" class="d-block " alt="...">
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
  include_once __DIR__.'./Templates/footer.php';
?>