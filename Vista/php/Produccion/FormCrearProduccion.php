<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" 
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Producción</title>
<body>
    <div class="container mt-4">
        <div class="jumbotron">
            <h1 align="center">Gestión de Producción</h1>   
        </div>
    </div>

    <div class="container">

        <div class="card">
            <div class="card-header bg-success text-center text-white">Datos de Ingreso</div>
                <div class="card-body">

                    <form  name="formulario" action="" method="POST">  

                        <div class="form-group"> 
                            <input type="text" class="form-control" name="id-produccion" placeholder="Ingrese ID de Producción">                            
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success dropdown-toggle" type="button" name="materia-prima" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Seleccione la Materia Prima
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Salchichas</a>
                              <a class="dropdown-item" href="#">Papas</a>
                              <a class="dropdown-item" href="#">Harina</a>
                            </div>
                        </div>

                        <div class="form-group"> 
                            <input type="text" class="form-control" name="hora-inicio" placeholder="Ingrese Hora de Inicio">                            
                        </div>

                        <div class="form-group"> 
                            <input type="text" class="form-control" name="hora-fin" placeholder="Ingrese Hora de Fin">                            
                        </div>

                        <div class="form-group">       
                            <input type="text" class="form-control" name="fecha-produccion" placeholder="Ingrese Fecha de Producción">                            
                        </div>

                        <div class="form-group">     
                            <input type="text" class="form-control" name="cantidad" placeholder="Ingrese la Cantidad">                            
                        </div>
                                
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Registrar</button>
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