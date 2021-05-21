<!-- No funciona el alerta, pero graba y modifica normal -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>MecatoValluno | Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Icono -->
    <link rel="shortcut icon" href="../../img/logo.ico">
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../home/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../../home/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../home/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../home/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../home/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../../home/assets/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">

    <!-- Template Main CSS File -->
    <link href="../../home/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <main id="main">
        <div class="container" id="editado">
            <div class="jumbotron jumbotron-fluid" style="text-align: center;background-color: #0c0b09; color: white;">
                <div class="container">
                    <h1 id="titulo" class="display-4">Registro de Usuario Cliente</h1>
                </div>
            </div>
            <div class="card card-primary book-a-table" style="background-color: #0c0b09;">

                <div class="card" style="background-color: rgb(255,255,255,0.3);">
                    <div class="card-body">

                        <form id="formCrearCliente" class="php-email-form">
                            <div class="form-group">
                                <label for="IdCliente">Cédula del cliente</label>
                                <input type="number" class="form-control" name="IdCliente" id="IdCliente"
                                    placeholder="Ingresa su Cedula" required>
                            </div>
                            <div class="form-group">
                                <label for="NombreCliente">Nombre Cliente</label>
                                <input type="text" class="form-control" name="NombreCliente" id="NombreCliente"
                                    placeholder="Ingresa su Nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="Email">Correo Electronico</label>
                                <input type="email" class="form-control" name="Email" id="Email"
                                    placeholder="Ingrese su correo electronico" required>
                            </div>
                            <div class="form-group">
                                <label for="Direccion">Direccion</label>
                                <input type="text" class="form-control" name="Direccion" id="Direccion"
                                    placeholder="Ingrese Su direccion" required>
                            </div>
                            <div class="form-group">
                                <label for="Telefono">Telefono</label>
                                <input type="number" class="form-control" name="Telefono" id="Telefono"
                                    placeholder="Ingrese su telefono celular" required>
                            </div>

                            <div class="form-group">
                                <label for="IdCuidad">Ciudad</label>
                                <select name="IdCiudad" id="IdCiudad" class="form-control" required
                                    style="color:#a49b89; font-size: 15px; border-radius: 5px;">
                                    <option value="">Seleccione su Ciudad..</option>
                                </select>
                            </div>
                            <input type="hidden" id="nuevo1" value="nuevo" name="accion" />
                        </form>
                        <form id="formCrearUsuario" class="php-email-form">
                            <div class="form-group">
                                <label for="Usuario">Usuario</label>
                                <input type="text" class="form-control" name="Usuario" id="Usuario"
                                    placeholder="Ingrese el nombre de usuario" required>
                            </div>
                            <div class="form-group">
                                <label for="Contrasena">Contraseña</label>
                                <input type="password" class="form-control" name="Contrasena" id="Contrasena"
                                    placeholder="Ingrese la contraseña" required>
                            </div>
                            <input type="hidden" id="IdUsuario" name="IdUsuario">
                            <input type="hidden" id="nuevo2" value="nuevo" name="accion" />
                        </form>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark" id="grabar"
                                style="background-color: #625b4b;">Ingresar Usuario</button>
                            <a href="../../home/index.php" class="btn btn-dark"
                                style="background-color: maroon;">Regresar</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="../../home/assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../home/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../../home/assets/vendor/php-email-form/validate.js"></script>
    <script src="../../home/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../../home/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../../home/assets/vendor/venobox/venobox.min.js"></script>
    <script src="../../home/assets/vendor/aos/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <!-- Template Main JS File -->
    <script src="../../home/assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>

    <script src="../../../Recursos/js/usuarios/registerCliente.js"></script>
    <script>
    $(document).ready(registrar);
    </script>

</body>

</html>