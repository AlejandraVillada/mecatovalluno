<?php
  session_start();

  if(isset($_GET["cerrar_session"]) and $_GET["cerrar_session"]==true){
    session_destroy();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MecatoValluno | Log in</title>
  <link rel="shortcut icon" href="./Vista/img/logo.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="Recursos/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
 
  <!-- Ionicons -->
  <link rel="stylesheet" href="Recursos/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Recursos/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="Recursos/css/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
    .fondon {
        background-image: url("Vista/home/assets/img/fondoprueba.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
    }
</style>
<body class="hold-transition login-page fondon" style="background-color:rgb(0,0,0,1); ">
<div class=" container m-5">
  <div  style="margin-top:50px;margin-bottom:50px;">
   <img src="Vista/home/assets/img/text.png" class="center-block img-responsive" alt="" style="height: auto; width: auto;">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body jumbotron "  style=" background-color:rgb(99, 96, 96,0.5); height: 300px; width: 450px; float:right">
    <p class="login-box-msg" style="color: rgb(255,255,255);">Autenticarse para iniciar sesión</p>

    <form id="login-form" action="" method="post" >
      <div class="form-group has-feedback">
        <input type="type" id="usuario" name="usuario" class="form-control" placeholder="Usuario">
        <span class="form-control-feedback"><i class="fas fa-user-tie"></i></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        <span class="form-control-feedback"> <i class="fas fa-key"></i></span>
      </div>
      <div class="row">
       
        <!-- /.col -->
        <div class="center-block" style="padding-top:15px">
          <button href="submit" id="ingresar" class="btn btn-block btn-flat" style="background-color:#F3D70F; color: #0C0B0B; border-radius:10px; "><strong>Ingresar</strong></button>
          <a href="./Vista/home/index.php" class="btn btn-block btn-flat btn-danger" style="border-radius:10px;">Regresar al Home</a>
        </div>
        <!-- /.col -->
        <input type="hidden" value="login" name="accion">
      </div>
    </form>

   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>
<script src="./Recursos/js/funcionesUsuario.js"></script>
<!-- Funciones de Lógica de neogcio -->
<script>
    $(document).ready(usuario);
</script>


</body>
</html>
