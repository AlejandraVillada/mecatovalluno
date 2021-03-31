<link rel="stylesheet" href="../layout/style.css">
<?php
include_once ("../layout/header.php");
?>

<div class="container">
<!-- menu -->
    <div class="menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio sesion Empleados</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </div>
    <!-- promocion -->
    <div class="promocion" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body" style="padding: 30px;">
                <div class="row">
                    <div class="col-sm-6 textopromo">
                            <h1 class="card-title">GRAN PROMO!!!!!!!</h1>
                            <h4 class="card-text">10 papas rellenas por solo 10.000 pesos comlombianos - LLEVALO YA!!</h4>
                            <a href="#" class="btn btn-dark btnvermas" >Mas informacion</a>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <img src="../img/picadita_MCC.jpg" alt=""  class="imgpromo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mision y vision -->
    <div id="mision_vision">
        <div class="mision">
            <div class="titulo_mision">
                <div class="alert alert-secondary" role="alert">
                    Mision
                </div>  
            </div>
            <div class="contenido_mv">
                <p>Satisfacer las necesidades gastronómicas de nuestros clientes, ofreciendo alimentos y servicios con la más alta calidad, donde se sobrepasen las expectativas de nuestros clientes y ser un espacio de trabajo que permita la realización personal y el Desarrollo de sus colaboradores en el grupo.</p>
            </div>
        </div>
        <div class="vision">
            <div class="titulo_vision">
                <div class="alert alert-secondary" role="alert">
                    Vision
                </div>  
            </div>
            <div class="contenido_mv">
                <p>Nuestra vision es darle una facilidad al cliente de conseguir productos de calidad y sabrosos a el mejor precio, proporcionando nuestros productos desde la comodidad de su casa y brindarles un momento agradable, teniendo como promordialidad el enfasis de conseguir comida deliciosa al mejor ptecio y el menor tiempo posible</p>
            </div>
        </div>

    </div>
    <!-- Productos -->
    <div class="productos">
        <div class="container">
            <div class="titulo_prod">
                <div class="alert alert-secondary" role="alert">
                    Productos
                </div>  
            </div>
            <div class="row conjunto_prod">
                <div class="col-3">
                    <div class="prod prod1">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_prod">
                        <p>Descripcion</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="prod prod2">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_prod">
                        <p>Descripcion</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="prod prod3">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_prod">
                        <p>Descripcion</p>
                    </div>
                </div>
                <div class="col-3">
                    <div class="prod prod4">
                        <a href="#"></a>
                    </div>
                    <div class="descripcion_prod">
                        <p>Descripcion</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contactanos -->
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
                    <img src="../img/picadita_MCC.jpg" alt=""  class="img_contacto">
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
include_once ("../layout/footer.php");
?>