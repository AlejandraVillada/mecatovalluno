<!-- No funciona el alerta, pero graba y modifica normal -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
    integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/9804ed7a29.js" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="../../layout/Style.css">



</head>

<body>

    <div class="container">
        <div class="jumbotron jumbotron-fluid" style="text-align: center;">
            <div class="container">
                <h1 id="titulo" class="display-4">Gestión Clientes</h1>
            </div>
        </div>

        <div class="contenido">
            <div id="editado">
            </div>
            <div class="listado">
                <div class="boton_ingresar">
                    <button class="btn btn-dark" id="crear">Ingresar Nuevo Registro</button>
                </div>
                <br>
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

    <footer class="main-footer">

        <!-- jQuery 3 -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script>
        src = "https://code.jquery.com/jquery-3.6.0.min.js"
        integrity = "sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin = "anonymous"
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>

        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="../../../Recursos/js/clientes/clientes.js"></script>
        <script>
        $(document).ready(clientes);
        </script>