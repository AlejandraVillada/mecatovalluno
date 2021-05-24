<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>MecatoValluno | Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Icono -->
    <link rel="shortcut icon" href="../img/logo.ico">
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Restaurantly - v1.2.1
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto" style="font-family:Zulia;"><a href="#"> <img src="assets/img/text.png" alt=""></a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            <!-- <span class="logo mr-auto"><img src="../img/logo.png" ></span> -->
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="#about">Sobre Nosotros</a></li>
                    <li><a href="#menu">Productos</a></li>
                    <li><a href="#gallery">Fotos</a></li>
                    <li><a href="#chefs">Proveedores</a></li>
                    <?php if(!isset($_SESSION['NombreCliente'])){ ?>
                    <li><a href="../../login.php">Login</a></li>
                    <li><a href="../../Vista/php/Usuarios/FormCrearCliente_registrar.php">Registrarse</a></li>
                    <?php }else{ ?>
                    <li><a id="act" href="#actualizacion">Actualizar Datos personales</a></li>
                    <li><a href="index.php"><?php session_destroy(); ?>Cerrar Sesion</a></li>
                    <?php } ?>

                </ul>
            </nav>
            <!-- .nav-menu -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center" style="height: 500px;">
        <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <?php if(isset($_SESSION['NombreCliente'])){ ?>
                    <h1>Bienvenid@ <span style="color: white;"><?php echo $_SESSION['NombreCliente']; ?></span></h1>
                    <h2>Nos gusta tenerte aqui, es un placer tenerte de nuevo con nosotros</h2>
                    <?php }else{ ?>
                    <h1>MecatoValluno</h1>
                    <h2>Fritanga de la mejor calidad y manejo de menos coresterol</h2>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <section id="actualizacion">
            <div class="container">
                <div class="jumbotron jumbotron-fluid"
                    style="text-align: center; background-color: #0c0b09; color: white;">
                    <div class="container">
                        <h1 id="titulo" class="display-4" style="text-align: center;">Actualización Datos Personales
                        </h1>
                    </div>
                </div>
                <div class="card card-primary" style="background-color: #0c0b09;">
                    <div class="card" style="background-color: rgb(255,255,255,0.3);">
                        <div class="card-body">
                            <!-- Cambio y eliminacion en el servidor, poner variable sesion para datos de cedula de consulta -->
                            <input type="hidden" class="form-control" id="Cedula" name="Cedula"
                                value="<?php echo $_SESSION['IdCliente']; ?>">
                            <div class="cuerpo  book-a-table">

                                <form id="formModificarCliente" class="php-email-form">
                                    <div class="form-group">
                                        <label for="IdCliente">Cédula del Cliente</label>
                                        <input type="number" class="form-control" name="IdCliente" id="IdCliente"
                                            readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="NombreCliente">Nombre Cliente</label>
                                        <input type="text" class="form-control" name="NombreCliente" id="NombreCliente"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Correo Electrónico</label>
                                        <input type="email" class="form-control" name="Email" id="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Direccion">Dirección</label>
                                        <input type="text" class="form-control" name="Direccion" id="Direccion"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Telefono">Teléfono</label>
                                        <input type="number" class="form-control" name="Telefono" id="Telefono"
                                            required>
                                    </div>
                                    <input type="hidden" name="IdEstado" id="IdEstado">
                                    <input type="hidden" name="IdCiudad" id="IdCiudad">


                                    <input type="hidden" id="editar1" value="editar" name="accion" />
                                </form>
                                <div class="usuario">
                                    <form id="formModificarUsuario">
                                        <div class="form-group">
                                            <label for="Usuario">Usuario</label>
                                            <input type="text" class="form-control" name="Usuario" id="Usuario"
                                                placeholder="Ingrese el nombre de usuario" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="Contrasena">Contraseña</label>
                                            <input type="password" class="form-control" name="Contrasena"
                                                id="Contrasena" placeholder="Ingrese la contraseña">
                                        </div>
                                        <input type="hidden" id="IdUsuario" name="IdUsuario">
                                        <input type="hidden" id="IdTipoUsuario" name="IdTipoUsuario">
                                        <input type="hidden" id="editar2" value="editar" name="accion" />
                                    </form>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info" id="actualizar">Actualizar
                                        Información</button>
                                    <button class="btn btn-dark" id="apareceUsu"
                                        style="background-color: #625b4b;">Cambiar Contraseña</button>
                                    <button class="btn btn-danger" id="cerrar">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <div id="pagina">
            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container" data-aos="fade-up">

                    <div class="row">
                        <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                            <div class="about-img">
                                <img src="assets/img/nosotros.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                            <h3>MecatoValluno N°1 en el mercado en alimentos</h3>
                            <p class="font-italic">
                                Nuestros productos estan caracterizados por manejar la menor cantidad de coresterol y
                                excesos en sodio, liberados de aceite tradicional con un empaquetado profesional y
                                completo
                                tanto para nuestros clientes como para el usuario final.
                            </p>
                            <ul>
                                <li><i class="icofont-check-circled"></i> Líderes en elegancia y calidad</li>
                                <li><i class="icofont-check-circled"></i> Exportaciones internacionales</li>
                                <li><i class="icofont-check-circled"></i> Exclusividad y envío de productos al por mayor
                                    y
                                    al detal</li>
                            </ul>

                        </div>
                    </div>

                </div>
            </section>
            <!-- End About Section -->

            <!-- ======= Why Us Section ======= -->
            <!-- <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Why Us</h2>
                    <p>Why Choose Our Restaurant</p>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="box" data-aos="zoom-in" data-aos-delay="100">
                            <span>01</span>
                            <h4>Lorem Ipsum</h4>
                            <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero
                                placeat</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="200">
                            <span>02</span>
                            <h4>Repellat Nihil</h4>
                            <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire
                                leno para dest</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="zoom-in" data-aos-delay="300">
                            <span>03</span>
                            <h4> Ad ad velit qui</h4>
                            <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam
                                quis</p>
                        </div>
                    </div>

                </div>

            </div>
        </section> -->
            <!-- End Why Us Section -->

            <!-- ======= Menu Section ======= -->
            <section id="menu" class="menu section-bg">
                <div class="container" data-aos="fade-up" style="height: 600px;">

                    <div class="section-title">
                        <h2>Productos</h2>
                        <p>Nuestros productos a la venta</p>
                    </div>

                    <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-starters">Starters</li>
                            <li data-filter=".filter-salads">Salads</li>
                            <li data-filter=".filter-specialty">Specialty</li>
                        </ul>
                    </div>
                </div> -->

                    <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

                        <!-- <div class="col-lg-6 menu-item filter-starters">
                        <img src="assets/img/menu/lobster-bisque.jpg" class="menu-img" alt="">
                        <div class="menu-content">
                            <a href="#">Lobster Bisque</a><span>$5.95</span>
                        </div>
                        <div class="menu-ingredients">
                            Lorem, deren, trataro, filede, nerada
                        </div>
                    </div> -->



                    </div>

                </div>
            </section>
            <!-- End Menu Section -->

            <!-- ======= Specials Section ======= -->
            <!-- <section id="specials" class="specials">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Specials</h2>
                    <p>Check Our Specials</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#tab-1">Modi sit est</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2">Unde praesentium sed</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-3">Pariatur explicabo vel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-4">Nostrum qui quasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Architecto ut aperiam autem id</h3>
                                        <p class="font-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                                        <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem
                                            quaerat quos qui similique accusamus nostrum rem vero</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/specials-1.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Et blanditiis nemo veritatis excepturi</h3>
                                        <p class="font-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                                        <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode
                                            pakto madirna desera vafle de nideran pal</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/specials-2.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                                        <p class="font-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                                        <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit
                                            ullam. Soluta et harum voluptatem optio quae</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/specials-3.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-4">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                                        <p class="font-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                                        <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis
                                            aperiam quia a laborum inventore</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/specials-4.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-5">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                                        <p class="font-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                                        <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/specials-5.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section> -->
            <!-- End Specials Section -->

            <!-- ======= Events Section ======= -->
            <!-- <section id="events" class="events">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Events</h2>
                    <p>Organize Your Events in our Restaurant</p>
                </div>

                <div class="owl-carousel events-carousel" data-aos="fade-up" data-aos-delay="100">

                    <div class="row event-item">
                        <div class="col-lg-6">
                            <img src="assets/img/event-birthday.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                            <h3>Birthday Parties</h3>
                            <div class="price">
                                <p><span>$189</span></p>
                            </div>
                            <p class="font-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </p>
                            <ul>
                                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                                <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in
                                    voluptate velit.</li>
                                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                            </ul>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                            </p>
                        </div>
                    </div>

                    <div class="row event-item">
                        <div class="col-lg-6">
                            <img src="assets/img/event-private.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                            <h3>Private Parties</h3>
                            <div class="price">
                                <p><span>$290</span></p>
                            </div>
                            <p class="font-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </p>
                            <ul>
                                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                                <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in
                                    voluptate velit.</li>
                                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                            </ul>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                            </p>
                        </div>
                    </div>

                    <div class="row event-item">
                        <div class="col-lg-6">
                            <img src="assets/img/event-custom.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content">
                            <h3>Custom Parties</h3>
                            <div class="price">
                                <p><span>$99</span></p>
                            </div>
                            <p class="font-italic">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </p>
                            <ul>
                                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                                <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in
                                    voluptate velit.</li>
                                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</li>
                            </ul>
                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section> -->
            <!-- End Events Section -->

            <!-- ======= Book A Table Section ======= -->
            <!-- <section id="book-a-table" class="book-a-table">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Reservation</h2>
                    <p>Book a Table</p>
                </div>

                <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form"
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="form-row">
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <div class="validate"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                data-rule="email" data-msg="Please enter a valid email">
                            <div class="validate"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone"
                                data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <div class="validate"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="text" name="date" class="form-control" id="date" placeholder="Date"
                                data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <div class="validate"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="text" class="form-control" name="time" id="time" placeholder="Time"
                                data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <div class="validate"></div>
                        </div>
                        <div class="col-lg-4 col-md-6 form-group">
                            <input type="number" class="form-control" name="people" id="people"
                                placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your booking request was sent. We will call back or send an Email to
                            confirm your reservation. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Book a Table</button></div>
                </form>

            </div>
        </section> -->
            <!-- End Book A Table Section -->

            <!-- ======= Testimonials Section ======= -->
            <!-- <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Testimonials</h2>
                    <p>What they're saying about us</p>
                </div>

                <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i> Proin iaculis purus consequat sem cure
                            digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id,
                            aliquam eget nibh et. Maecen aliquam, risus
                            at semper.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                        <h3>Saul Goodman</h3>
                        <h4>Ceo &amp; Founder</h4>
                    </div>

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i> Export tempor illum tamen malis malis
                            eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit
                            sunt aliqua noster fugiat irure amet legam
                            anim culpa.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                        <h3>Sara Wilsson</h3>
                        <h4>Designer</h4>
                    </div>

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i> Enim nisi quem export duis labore
                            cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis
                            noster aute amet eram fore quis sint minim.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                        <h3>Jena Karlis</h3>
                        <h4>Store Owner</h4>
                    </div>

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i> Fugiat enim eram quae cillum dolore
                            dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam
                            ipsum anim magna sunt elit fore quem dolore
                            labore illum veniam.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                        <h3>Matt Brandon</h3>
                        <h4>Freelancer</h4>
                    </div>

                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i> Quis quorum aliqua sint quem legam
                            fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa
                            nulla illum cillum fugiat legam esse veniam
                            culpa fore nisi cillum quid.
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                        <h3>John Larson</h3>
                        <h4>Entrepreneur</h4>
                    </div>

                </div>

            </div>
        </section> -->
            <!-- End Testimonials Section -->

            <!-- ======= Gallery Section ======= -->
            <section id="gallery" class="gallery">

                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Galería de fotos</h2>
                        <p>Algunas fotos de nuestros maravillosos productos</p>
                    </div>
                </div>

                <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

                    <div class="row no-gutters">

                        <div class="col-lg-3 col-md-4">
                            <div class="gallery-item">
                                <a href="assets/img/gallery/galeria1.png" class="venobox" data-gall="gallery-item">
                                    <img src="assets/img/gallery/galeria1.png" alt="" class="img-fluid"
                                        style="height: 200px;">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="gallery-item">
                                <a href="assets/img/gallery/galeria2.jpg" class="venobox" data-gall="gallery-item">
                                    <img src="assets/img/gallery/galeria2.jpg" alt="" class="img-fluid"
                                        style="height: 200px;">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="gallery-item">
                                <a href="assets/img/gallery/galeria3.webp" class="venobox" data-gall="gallery-item">
                                    <img src="assets/img/gallery/galeria3.webp" alt="" class="img-fluid"
                                        style="height: 200px;">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="gallery-item">
                                <a href="assets/img/gallery/galeria4.jpg" class="venobox" data-gall="gallery-item">
                                    <img src="assets/img/gallery/galeria4.jpg" alt="" class="img-fluid"
                                        style="height: 200px;">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="gallery-item">
                                <a href="assets/img/gallery/galeria5.jpg" class="venobox" data-gall="gallery-item">
                                    <img src="assets/img/gallery/galeria5.jpg" alt="" class="img-fluid"
                                        style="height: 200px;">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="gallery-item">
                                <a href="assets/img/gallery/galeria6.jpg" class="venobox" data-gall="gallery-item">
                                    <img src="assets/img/gallery/galeria6.jpg" alt="" class="img-fluid"
                                        style="height: 200px;">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="gallery-item">
                                <a href="assets/img/gallery/galeria7.jpg" class="venobox" data-gall="gallery-item">
                                    <img src="assets/img/gallery/galeria7.jpg" alt="" class="img-fluid"
                                        style="height: 200px;">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4">
                            <div class="gallery-item">
                                <a href="assets/img/gallery/galeria8.gif" class="venobox" data-gall="gallery-item">
                                    <img src="assets/img/gallery/galeria8.gif" alt="" class="img-fluid"
                                        style="height: 200px;">
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            <!-- End Gallery Section -->

            <!-- ======= Chefs Section ======= -->
            <section id="chefs" class="chefs">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Proveedores</h2>
                        <p>Nuestros más poderosos proveedores</p>
                    </div>

                    <div class="row">

                        <div class="col-lg-4 col-md-6">
                            <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                <img src="assets/img/chefs/refisal.jpg" class="img-fluid" alt="" style="height: 350px;">
                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h4>Refisal</h4>
                                        <span>Proveedor líder en darle sabor a nuestros productos de la mejor
                                            calidad</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="member" data-aos="zoom-in" data-aos-delay="200">
                                <img src="assets/img/chefs/bucanero.jpeg" class="img-fluid" alt=""
                                    style="height: 350px;">
                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h4>Bucanero</h4>
                                        <span>Proveedor con el mejor pollo campesino alimentado con amor para que tu
                                            producto final tenga el mismo concepto en calidad</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="member" data-aos="zoom-in" data-aos-delay="300">
                                <img src="assets/img/chefs/cervalle.jpeg" class="img-fluid" alt=""
                                    style="height: 350px;">
                                <div class="member-info">
                                    <div class="member-info-content">
                                        <h4>Cervalle</h4>
                                        <span>Proveedor especializado del distriubuidor de carnes más especializado en
                                            sasonar de la mejor manera la mejor carne del país</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            <!-- End Chefs Section -->

            <!-- ======= Contact Section ======= -->
            <!-- <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>
            </div>

            <div data-aos="fade-up">
                <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                    frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="container" data-aos="fade-up">

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>

                            <div class="open-hours">
                                <i class="icofont-clock-time icofont-rotate-90"></i>
                                <h4>Open Hours:</h4>
                                <p>
                                    Monday-Saturday:<br> 11:00 AM - 2300 PM
                                </p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="8" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section> -->
            <!-- End Contact Section -->
        </div>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 mt-5 mr-6">
                        <div class="footer-info">
                            <h3>MecatoValluno</h3>
                            <p>
                                Bogotá-Colombia <br> CL 22545582 COL<br><br>
                                <strong>Celular:</strong> +57 3104681530<br>
                                <strong>Correo:</strong> info@mecatovalluno.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8 m-2">
                        <div data-aos="fade-up">
                            <iframe style="border:0; width: 100%; height: 350px;"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                                frameborder="0" allowfullscreen></iframe>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Restaurantly</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="../../Recursos/js/home_productos/home_productos.js"></script>

    <script>
    $(document).ready(productos);
    </script>
</body>

</html>