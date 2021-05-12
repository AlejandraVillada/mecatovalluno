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
                <h1 class="text-center">Bienvenid@ <?php echo $_SESSION["Usuario"]; ?></h1>
            </div>
        </div>
        <!-- Carrusel -->
        <div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./Vista/img/picada.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./Vista/img/picada2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./Vista/img/picada3.jpg" class="d-block w-100" alt="...">
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