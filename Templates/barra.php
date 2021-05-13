<?php include_once ("./Funciones/sessiones.php"); ?>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header  ">
            <!-- Logo -->
            <a href="adminper.php" class="logo" style="background-color:rgb(0,0,0,0.5);">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"> <img src="./Vista/img/logo.png" style=" width: 50px;" alt=""></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="./Vista/img/logo.png" style=" width: 50px;" alt=""> Mecato Valluno
                </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top  "
                style="justify-content:normal;background-color: rgb(0,0,0,0.2); display:block;">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle " data-toggle="push-menu" role="button"></a>

                <div class="navbar-custom-menu mr-5" style="justify-content:flex-end;">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="./Vista/img/logo.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"> <?php // echo $_SESSION["nombre"]; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header" style="background-color: lightgray;">
                                    <!-- <img src="./Recursos/img/<?php //echo $_SESSION['foto'] ?>" class="img-circle" alt="User Image"> -->

                                    <p style="color: black;">
                                        <?php echo $_SESSION["NombreEmpleado"] . " - ".$_SESSION['TipoUsuario']; ?>
                                        <small>Informacion Breve del Empleado</small>
                                        <br>
                                        <small><?php echo "Usuario: ".$_SESSION["Usuario"] ?></small>
                                        <small><?php echo "Sede: ".$_SESSION["Sede"] ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left actualizarDatos">
                                        <a href="./Vista/php/Empleados/Actualizacion_datos.php"
                                            class="btn btn-default btn-flat">Actualizar datos personales</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="login.php?cerrar_session=true"
                                            class="btn btn-default btn-flat">Cerrar</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->