<?php

require_once "../Modelo/modelo_usuario.php";
require_once "../Modelo/modelo_tipo_usuario.php";
require_once "../Modelo/modelo_empleados.php";
require_once "../Modelo/modelo_sede.php";
header('Content-Type: application/json');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $datos=$_GET;//datos

if (!empty($_GET["accion"])) {
    $accion = $_GET["accion"];
    $datos = $_GET;
}
if (!empty($_POST["accion"])) {
    $accion = $_POST["accion"];
    $datos = $_POST;
}

switch ($accion) {
    //Case/ contenido variable accion
    case 'login':
        $usuario = new modelo_usuario();
        $resultado = $usuario->consultar($datos);
        // Empleado
        $empleado = new modelo_empleados();
        $empleado->consultar($usuario->getIdUsuario());
        // tipo usuario
        $tipoUsu = new modelo_tipo_usuario();
        $tipoUsu->consultar($usuario->getIdTipoUsuario());
        //Sede
        $sede = new modelo_sede();
        $sede->consultar($empleado->getIdSede());
        // echo $empleado->getNombreEmpleado();
        //     echo "id".$usuario->getIdUsuario();
        //    echo "contra".$usuario->getContrasena();
        // var_dump($resultado);
        
        if ($usuario->getIdUsuario() == null && $empleado->getIdEstado()==1) {
            $respuesta = array(
                'respuesta' => 'no existe',
            );
        } else {

            if (password_verify($datos['password'], $resultado['Contrasena'])) {
                session_start();
                $_SESSION['Usuario'] = $usuario->getUsuario();
                $_SESSION['IdEmpleado']= $empleado->getIdEmpleado();
                $_SESSION['NombreEmpleado']= $empleado->getNombreEmpleado();
                $_SESSION['IdTipoUsuario']= $usuario->getIdTipoUsuario();
                $_SESSION['TipoUsuario']= $tipoUsu->getTipoUsuario();
                $_SESSION['IdSede']= $empleado->getIdSede();
                $_SESSION['Sede']= $sede->getNombreSede();
                $_SESSION['IdEstado']= $empleado->getIdEstado();
                
                $respuesta = array(
                    'respuesta' => 'existe',
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'no existe',
                );
            }

        }
        echo json_encode($respuesta);
        break;


    case 'editar':
        $usuario = new modelo_usuario();
        $resultado = $usuario->editar($datos);
        $respuesta = array(
            'respuesta' => $resultado,
        );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $usuarios = new modelo_usuario();
        $resultado = $usuarios->nuevo($datos);
        if ($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto',
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error',
            );
        }
        echo json_encode($respuesta);
        break;
    case 'borrar':
        break;
    case 'consultar':
        $usuarios = new modelo_usuario();
        $usuarios->consultarUsu($datos['codigo']);

        if ($usuarios->getIdUsuario() == null) {
            $respuesta = array(
                'respuesta' => 'no existe',
            );
        } else {
            $respuesta = array(
                'codigo' => $usuarios->getIdUsuario(),
                'usuario' => $usuarios->getUsuario(),
                'tipoUsuario' => $usuarios->getIdTipoUsuario(),
                'contrasena' => $usuarios->getContrasena(),
                'respuesta' => 'existe',
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $usuario = new modelo_usuario();
        $listado = $usuario->lista();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

    case 'listar_tipo_usu':
        $tipoUsu = new modelo_tipo_usuario();
        $listado = $tipoUsu->lista();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

}
