<?php

require_once "../Modelo/modelo_usuario.php";
require_once "../Modelo/modelo_tipo_usuario.php";
require_once "../Modelo/modelo_empleados.php";
require_once "../Modelo/modelo_sede.php";
require_once "../Modelo/modelo_clientes.php";
include_once "../pdf/informe_usuarios.php";
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
        // Empleado y cliente
        $cliente = new clientes();
        $empleado = new modelo_empleados();
        $tipo='';
        if($usuario->getIdTipoUsuario()!=5){
            $empleado = new modelo_empleados();
            $empleado->consultarEmp($usuario->getIdUsuario());
            $tipo=$empleado->getIdEmpleado();
        }else if($usuario->getIdTipoUsuario()==5){
           
            $cliente->consultar($usuario->getIdUsuario());
            $tipo=$cliente->getIdCliente();
        }
        // tipo usuario
        $tipoUsu = new modelo_tipo_usuario();
        $tipoUsu->consultar($usuario->getIdTipoUsuario());
        //Sede
        $sede = new modelo_sede();
        $sede->consultar($empleado->getIdSede());
        // var_dump($tipo);
       
        // echo $empleado->getNombreEmpleado();
        //     echo "id".$usuario->getIdUsuario();
        //    echo "contra".$usuario->getContrasena();
        // var_dump($resultado);
        // var_dump($empleado->getIdEmpleado().'usuario'.$usuario->getIdUsuario());
        
        if($usuario->getIdUsuario()!=null &&  $tipo == null){
            $respuesta = array(
                'respuesta' => 'no existe',
                
            );
        }else if ($usuario->getIdUsuario() == null && $tipo == null) {
            
            $respuesta = array(
                'respuesta' => 'no existe',
            );
        } else {
// var_dump(password_verify($datos['password'], $resultado['Contrasena']));
// var_dump($resultado);
            if (password_verify($datos['password'], $resultado['Contrasena'])) {
                session_start();
                $_SESSION['Usuario'] = $usuario->getUsuario();
                $_SESSION['IdEmpleado']= $empleado->getIdEmpleado();
                $_SESSION['NombreEmpleado']= $empleado->getNombreEmpleado();
                $_SESSION['IdTipoUsuario']= $usuario->getIdTipoUsuario();
                $_SESSION['TipoUsuario']= utf8_decode($tipoUsu->getTipoUsuario());
                $_SESSION['IdSede']= $empleado->getIdSede();
                $_SESSION['Sede']= $sede->getNombreSede();
                $_SESSION['IdEstado']= $empleado->getIdEstado();
                $_SESSION['IdCliente']=$cliente->getIdCliente();
                $_SESSION['NombreCliente']=$cliente->getNombreCliente();
                
                $respuesta = array(
                    'respuesta' => 'existe',
                    'tipoUsuario'=> $usuario->getIdTipoUsuario(),

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

        case "informe":
            $usuario = new modelo_usuario();
            $datos1 = $usuario->lista();
            $a=array();
            foreach ($datos1 as $key => $value) {
             $a[]= implode(";",$value);
            
            }
            $pdf = new PDF('L');
            // T�tulos de las columnas
            $titulos = array('Cedula', 'Usuario', 'TipoUsuario',utf8_decode('Contraseña'));
            // Carga de datos
            $datos = $pdf->cargarDatos($a);
            $pdf->SetFont('Arial', '', 10);
            $pdf->AddPage();
            $pdf->TablaElegante($titulos, $datos);
            $pdf->Output();
            break;

}