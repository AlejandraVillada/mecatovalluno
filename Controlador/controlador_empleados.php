<?php

require_once "../Modelo/modelo_empleados.php";
header('Content-Type: application/json');
$datos = $_GET;
$accion = $_GET['accion'];


switch ($accion) {
    case 'listar':
        $empleados = new modelo_empleados();
        $listado = $empleados->lista();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

    case 'listar_estados':
        $estado = new modelo_empleados();
        $listado = $estado->estado();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

    case 'consultar':
        $empleados = new modelo_empleados();
        $empleados->consultar($datos['codigo']);

        if ($empleados->getIdEmpleado() == null) {
            $respuesta = array(
                'respuesta' => 'no existe',
            );
        } else {
            $respuesta = array(
                'codigo' => $empleados->getIdEmpleado(),
                'nombre' => $empleados->getNombreEmpleado(),
                'email' => $empleados->getEmail(),
                'sueldo' => $empleados->getSueldoBase(),
                'telefono' => $empleados->getTelefono(),
                'cargo' => utf8_decode($empleados->getCargo()),
                'sede' => $empleados->getIdSede(),
                'estado' => $empleados->getIdEstado(),
                'respuesta' => 'existe',
            );
        }
        echo json_encode($respuesta);
        break;

    case 'nuevo':
        $empleados = new modelo_empleados();
        $resultado = $empleados->nuevo($datos);
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

    case 'editar':
        $empleados = new modelo_empleados();
        $resultado = $empleados->editar($datos);
        $respuesta = array(
            'respuesta' => $resultado,
        );
        echo json_encode($respuesta);
        break;

    case 'borrar':
        //No se usa
        break;
}
