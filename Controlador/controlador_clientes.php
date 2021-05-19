<?php
require_once "../Modelo/modelo_clientes.php";
header('Content-Type: application/json');
$datos = $_GET; //datos 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

switch ($_GET['accion']) {

    case 'editar':
        $cliente = new clientes();
        $resultado = $cliente->editar($datos);
        $respuesta = array(
            'respuesta' => $resultado
        );
        echo json_encode($respuesta);
        break;

    case 'nuevo':
        $cliente = new clientes();
        $resultado = $cliente->nuevo($datos);
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
        $cliente = new clientes();
        $cliente->consultar($datos['codigo']);

        if ($cliente->getIdCliente() == null) {
            $respuesta = array(
                'respuesta' => 'no existe',
            );
        } else {
            $respuesta = array(
                'codigo' => $cliente->getIdCliente(),
                'nombre' => $cliente->getNombreCliente(),
                'email' => $cliente->getEmail(),
                'direccion' => $cliente->getDireccion(),
                'telefono' => $cliente->getTelefono(),
                'estado' => $cliente->getIdEstado(),
                'ciudad' => $cliente->getIdCiudad(),
                'respuesta' => 'existe',
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $cliente = new clientes();
        $listado = $cliente->lista();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

    case 'listar_estados':
        $estado = new clientes();
        $listado = $estado->lista_estados();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;


}
