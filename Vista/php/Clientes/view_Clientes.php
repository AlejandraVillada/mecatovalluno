<!-- No funciona el alerta, pero graba y modifica normal -->
<?php include_once "../../../Templates/header1.php";?>

<body>
    

    <div class="container">
        <div class="jumbotron jumbotron-fluid" style="text-align: center;">
            <div class="container">
                <h1 id="titulo" class="display-4">Gestión Clientes</h1>
            </div>
        </div>
        <div class="card card-primary">
        <div class="card-header bg-dark text-center text-white titulo">Clientes</div>
        <div class="card-body">
            <div class="pull-right box-tools">
                <button class="btn btn-dark btn-sm" id="crear" data-toggle="tooltip" title="Registrar Nuevo Empleado">Registrar Cliente</button>
            </div>
        </div>
        <div class="card-body contenido">
            <div id="editado">
            </div>
            <div class="container">
            <div class="listado">
                <table id="tabla" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Cédula</th>
                            <th scope="col">Nombre Cliente</th>
                            <th scope="col">Email</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">IdEstado</th>
                            <th scope="col">IdCiudad</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            </div>

        </div>
    </div>


    <?php include_once "../../../Templates/footer1.php";?>
   
    <!-- <script src="Recursos/js/clientes/clientes.js"></script> -->
    <script src="../../../Recursos/js/clientes/clientes.js"></script>
    <script>
    $(document).ready(clientes);
    </script>
</body>
</html>
