<?php

require_once "../Modelo/modelo_empleados.php";
include_once "../pdf/informe_empleados.php";
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

        case "informe":
            $empleado = new modelo_empleados();
            $datos1 = $empleado->lista();
            $a=array();
            foreach ($datos1 as $key => $value) {
             $a[]= implode(";",$value);
            
            }
            $pdf = new PDF('L');
            // T�tulos de las columnas
            $titulos = array('Cedula', 'Nombre', 'Email','SueldoBase','Telefono','Cargo','Sede','Estado');
            // Carga de datos
            $datos = $pdf->cargarDatos($a);
            $pdf->SetFont('Arial', '', 10);
            $pdf->AddPage();
            $pdf->TablaElegante($titulos, $datos);
            $pdf->Output();
            break;

    case 'borrar':
        //No se usa
        break;
}
