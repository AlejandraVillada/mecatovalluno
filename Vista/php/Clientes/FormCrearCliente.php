<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Clientes</title>
<body>
    <div class="container mt-4">
        <div class="jumbotron">
            <h1 align="center">Registro de Clientes</h1>   
        </div>
    </div>

    <div class="container">

        <div class="card">
            <div class="card-header bg-success text-center text-white">Datos de Ingreso</div>
                <div class="card-body">

                    <form  name="formulario" action="" method="POST">  
                        
                        <div class="form-group"> 
                            <label>ID Cliente</label>
                            <input type="text" class="form-control" name="id-cliente" placeholder="Ingrese ID del Cliente">                            
                        </div>

                        <div class="form-group">
                            <label>Nombre</label> 
                            <input type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre del Cliente">                            
                        </div>

                        <div class="form-group">    
                            <label>Correo Electronico</label>   
                            <input type="text" class="form-control" name="email" placeholder="Ingrese Email del Cliente">                            
                        </div>

                        <div class="form-group">    
                            <label>Dirección</label> 
                            <input type="text" class="form-control" name="direccion" placeholder="Ingrese Dirección del Cliente">                            
                        </div>

                        <div class="form-group">    
                            <label>Teléfono</label> 
                            <input type="text" class="form-control" name="telefono" placeholder="Ingrese Teléfono del Cliente">                            
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success dropdown-toggle" type="button" name="estado" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Seleccione el Estado del Cliente
                            </button>
                            <div class="dropdown-menu" aria-labelledby="estado">
                              <a class="dropdown-item" href="#">Activo</a>
                              <a class="dropdown-item" href="#">Inactivo</a>
                            </div>
                        </div>
                                
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Registrar Cliente</button>
                            <a href="#" class="btn btn-dark">Regresar</a>
                        </div>

                    </form>
                </div>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
			crossorigin="anonymous"
	></script>
    
</body>
</html>