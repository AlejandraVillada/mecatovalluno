<?php
 include_once __DIR__."/../Modelo/modelo_usuario.php";//corregir ruta

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$datos=$_POST;//datos

$accion=$_POST['accion'];

switch($accion){
    //Case/ contenido variable accion
    case 'login':
        $usuario = new modelo_usuario();
        $usuario->consultar($datos);
        echo "id".$usuario->getIdUsuario();
        echo "contra".$usuario->getContrasena();
  
        if($usuario->getIdUsuario() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            if(password_verify($datos['password'],$usuario->getContrasena())){
                session_start();
                $_SESSION['usuario'] = $usuario->getUsuario();
              //  $_SESSION['nombre'] = $usuario->getUsua_nomb();
            //    $_SESSION['foto'] = $usuario->getUsua_foto();
                $respuesta = array(
                    'respuesta' =>'existe'
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            }
            
        }
        echo json_encode($respuesta);
        break;
    break;
}





?>
