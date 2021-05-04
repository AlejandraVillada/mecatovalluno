<?php

    require_once("../Modelo/modelo_usuario.php");
    require_once("../Modelo/modelo_tipo_usuario.php");
   
    $datos=$_GET;//datos

    switch ($_GET['accion']){
    //Case/ contenido variable accion
    case 'login':
        $usuario = new modelo_usuario();
       $resultado= $usuario->consultar($datos);
        //echo "id".$usuario->getIdUsuario();
      //  echo "contra".$usuario->getContrasena();
        
        if($usuario->getIdUsuario() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            if(password_verify($datos['password'],$usuario->getContrasena())){
                session_start();
                $_SESSION['Usuario'] = $usuario->getUsuario();
              
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

    case 'editar':
        $usuario = new modelo_usuario();
        $resultado = $usuario->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $usuarios = new modelo_usuario();
        $resultado = $usuarios->nuevo($datos);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;
    case 'borrar':
      break;
    case 'consultar':
        $usuarios = new modelo_usuario();
        $usuarios->consultarUsu($datos['codigo']);

        if($usuarios->getIdUsuario() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $usuarios->getIdUsuario(),
                'usuario' => $usuarios->getUsuario(),
                'tipoUsuario' =>$usuarios->getIdTipoUsuario(),
                'contrasena' =>$usuarios->getContrasena(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $usuario = new modelo_usuario();
        $listado = $usuario->lista();        
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;

        case 'listar_tipo_usu':
            $tipoUsu = new modelo_tipo_usuario();
            $listado = $tipoUsu->lista();        
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
            break;
   
        }
?>