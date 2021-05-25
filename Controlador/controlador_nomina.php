<?php

    require_once "../Modelo/modelo_nomina.php";
    require_once "../Modelo/modelo_detalleNomina.php";
    // require_once "../Vista/informe/tabla.php";
    header('Content-Type: application/json');

    $datos = $_GET;
    $accion = $_GET['accion'];

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

switch ($accion) {
    // case "informe":
    //     $infoDetalle = new detalle_nomina();
    //     $listado = $infoDetalle->consultar($datos['codigo']);
    //     $pdf = new PDF();
    //         // T�tulos de las columnas
    //         $titulos = array('IdDetalle', 'IdNomina', 'IdEmpleado', 'Nombre','Sede','Comisiones','Sueldo','TotalSueldo');
    //         // Carga de datos
    //         $tabla = $pdf->cargarDatos('paises.txt');
    //         $pdf->SetFont('Arial','',10);
    //         $pdf->AddPage();
    //         $pdf->TablaElegante($titulos,$tabla);

    //         $pdf->Output();
    //     break;

    case "lista":
        $infoNomina = new modelo_nomina();
        $listado = $infoNomina->lista($datos['fecha']);
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
    break;

    case "consultar_detalle":
        $infoDetalle = new detalle_nomina();
        $listado = $infoDetalle->consultar($datos['codigo']);
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
    break;

    case 'generar_nomina':

        date_default_timezone_set('America/Bogota');
        $fecha1 = date("Y-m-d");
        $fechaEntera = strtotime($fecha1);
        $mesConsulta = date("m", $fechaEntera);

        $fechaNomina = new modelo_nomina();      
        $fechaNomina->fechas($fecha1); 

        $fechaEntera1 = strtotime($fechaNomina->getFechaNomina());
        $mesBase = date("m", $fechaEntera1);

        // var_dump($fechaConsulta."".$fechaBase);

    if($mesConsulta != $mesBase || $fecha1 != $fechaNomina->getFechaNomina()){

    //Nómina

        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d");            
            
        $datos = array(
            'FechaNomina'=> $fecha
        );

        $nomina = new modelo_nomina();
        $nomina-> nuevo($datos);


    //Detalle Nómina

        $empleados = new detalle_nomina();
        $listado = $empleados->listaEmpleados();

        $idNomina = new detalle_nomina();
        $idNomina->consultarIdNomina($fecha);


    //Cálculos Financieros

        $totalSueldo = array();
        $totalNomina = 0;
        $sueldoBase = array();
        $sueldoBase = array_column($listado,'SueldoBase');

        for ($i=0; $i < count($listado); $i++) { 
                
            $totalSueldo = $sueldoBase[$i];
            $totalNomina = $totalNomina + $totalSueldo;
                
        }


    //Actualización de Total Nómina

        $datosTotal = array(
            'FechaNomina'=> $fecha,
            'TotalNomina'=> $totalNomina,
            'IdNomina'=> $idNomina->getIdNomina(),
        );

        $total = new modelo_nomina();
        $total->actualizar_nomina($datosTotal);


    //Insertar Datos en Detalle

        $idEmpleados = array_column($listado,'IdEmpleado');

        $detalle = new detalle_nomina();

        for ($i=0; $i < count($listado) ; $i++) { 
            $pruebaNomina[]=array(
                'IdDetalleNomina'=> $i+1,
                'IdNomina'=> $idNomina->getIdNomina(),
                'IdEmpleado'=> $idEmpleados[$i],
                'SueldoBase'=> $sueldoBase[$i],
                'TotalSueldo'=> $sueldoBase[$i],
            );
        }

        $detalle->nuevo($pruebaNomina);

        $respuesta = array(
            'respuesta'=> 'existe'
        );

    } else {
        $respuesta = array(
            'respuesta'=> 'no existe'
        );
    }       

    echo json_encode($respuesta);

    break;

    case 'consultar':
        $nomina = new modelo_nomina();
        $nomina->consultar($datos['codigo']);

        if ($nomina->getIdNomina() == null) {
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