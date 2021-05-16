<?php

    require_once "../Modelo/modelo_nomina.php";
    require_once "../Modelo/modelo_detalleNomina.php";
    header('Content-Type: application/json');

    $datos = $_GET;
    $accion = $_GET['accion'];

switch ($accion) {
    case 'generar_nomina':
    //Nómina
        // $hoy = getdate();
        // print_r($hoy);
        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d");
        // echo $fecha;
        $datos = array(
            'FechaNomina'=> $fecha
        );
        $nomina = new modelo_nomina();
        // $nomina-> nuevo($datos);

    //Detalle Nómina
        $empleados = new detalle_nomina();
        $listado = $empleados->listaEmpleados();
        // count($listado);
        // var_dump(count($listado));
        $idDetalle = array();
        for ($i=1; $i <= count($listado); $i++) { 
            $idDetalle = $i;
            // var_dump($idDetalle);
        }

        $idNomina = new detalle_nomina();
        $idNomina->consultarIdNomina($fecha);
        // var_dump($idNomina->getIdNomina());
        // echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);

    //Calculos Financieros
        $totalSueldo = array();
        // var_dump($listado["SueldoBase"]);
        $totalNomina = 0;
        $sueldoBase = array();
        $sueldoBase = array_column($listado,'SueldoBase');
        // var_dump(array_column($listado,'SueldoBase')); 
        for ($i=0; $i < count($listado); $i++) { 
            
            $totalSueldo = $sueldoBase[$i];
            // var_dump($totalSueldo);
            $totalNomina = $totalNomina + $totalSueldo;
            
        }
        
        // var_dump($totalNomina);


    //Actualización de Total Nómina

        $datosTotal = array(
            'FechaNomina'=> $fecha,
            'TotalNomina'=> $totalNomina,
            'IdNomina'=> $idNomina->getIdNomina(),
        );
        // var_dump($idNomina->getIdNomina());
        // var_dump($datosTotal);

        $total = new modelo_nomina();
        $total->actualizar_nomina($datosTotal);


    //Insertar Datos en Detalle

    $idEmpleados = array_column($listado,'IdEmpleado');

    $detalle = new detalle_nomina();
    
    for ($i=0; $i < count($listado) ; $i++) { 
        $final_detalle = array(
            'IdDetalleNomina'=> $idDetalle,
            'IdNomina'=> $idNomina->getIdNomina(),
            'IdEmpleado'=> $idEmpleados,
            'SueldoBase'=> $sueldoBase,
            'TotalSueldo'=> $totalSueldo,
        );
        $detalle->nuevo($final_detalle);
    }




        break;

    case 'consultar':
        $nomina = new modelo_nomina();
        $nomina->consultar($datos['codigo']);

        if ($nomina->getIdEmpleado() == null) {
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
                'cargo' => $empleados->getCargo(),
                'sede' => $empleados->getIdSede(),
                'estado' => $empleados->getIdEstado(),
                'respuesta' => 'existe',
            );
        }
        echo json_encode($respuesta);
        break;

    case 'nuevo':
        $nomina = new modelo_nomina();
        $resultado = $nomina->nuevo($datos);
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
        $nomina = new modelo_nomina();
        $resultado = $nomina->editar($datos);
        $respuesta = array(
            'respuesta' => $resultado,
        );
        echo json_encode($respuesta);
        break;

    case 'borrar':
        //No se usa
        break;
}