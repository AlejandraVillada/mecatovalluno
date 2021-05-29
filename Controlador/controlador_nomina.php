<?php

    require_once "../Modelo/modelo_nomina.php";
    require_once "../Modelo/modelo_detalleNomina.php";
    include_once "../pdf/informe_nomina.php";

    header('Content-Type: application/json');

    $datos = $_GET;
    $accion = $_GET['accion'];

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

switch ($accion) {
  
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

        $fechaNomina1 = new modelo_nomina();   
        $fechaNomina1->fechamaxima();
        
        $fechaFinal=0;
        $mesBase=0;
        if($fechaNomina->getFechaNomina() != NULL){
            $fechaEntera1 = strtotime($fechaNomina->getFechaNomina());
            $fechaFinal=$fechaNomina->getFechaNomina();
            $mesBase = date("m", $fechaEntera1);
        }else{
            
            $fechaEntera2 = strtotime($fechaNomina1->getFechaNomina());
            $fechaFinal=$fechaNomina1->getFechaNomina();
            $mesBase = date("m", $fechaEntera2);
            // var_dump($mesBase);
        }

        // var_dump($fechaFinal);

        // var_dump($fechaConsulta."".$fechaBase);
        // var_dump($mesConsulta);
        $fechaInicioMes=("2021-".$mesConsulta."-01");
        // var_dump($fechaInicioMes);
    
if($mesConsulta != $mesBase){
    if($fecha1 != $fechaNomina->getFechaNomina() || $fecha1 != $fechaNomina1->getFechaNomina()){

    //Nómina

        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d");            
            
        $datos = array(
            'FechaNomina'=> $fecha
        );

        $nomina = new modelo_nomina();
        $nomina-> nuevo($datos);


    // //Detalle Nómina

        $empleados = new detalle_nomina();
        $listado = $empleados->listaEmpleados();

        $idNomina = new detalle_nomina();
        $idNomina->consultarIdNomina($fecha);


    //Cálculos Financieros

        $totalSueldo = array();
        $totalNomina = 0;
        $sueldoBase = array();
        $sueldoBase = array_column($listado,'SueldoBase');

        $idEmpleados = array_column($listado,'IdEmpleado');
        $ConsultaCom = new detalle_nomina();
        
        foreach ($idEmpleados as $key => $value) {
            
            $Comisiones = $ConsultaCom->consultarComisiones($value,$fechaInicioMes,$fecha);
        }


        for ($i=0; $i < count($listado) ; $i++) { 
            $comision1=$Comisiones[$i]['Comisiones'];
            // var_dump($comision);
            settype($comision1,"integer");
            $totalNomina = $totalNomina+$sueldoBase[$i]+$comision1;
        }
        // echo $totalNomina;
       
                
    //Actualización de Total Nómina

        $datosTotal = array(
            'FechaNomina'=> $fecha,
            'TotalNomina'=> $totalNomina,
            'IdNomina'=> $idNomina->getIdNomina(),
        );

        $total = new modelo_nomina();
        $total->actualizar_nomina($datosTotal);


    // //Insertar Datos en Detalle

       
        // var_dump($Comisiones);

        $detalle = new detalle_nomina();

        for ($i=0; $i < count($listado) ; $i++) { 
            $comision=$Comisiones[$i]['Comisiones'];
            // var_dump($comision);
            settype($comision,"integer");
            $pruebaNomina[]=array(
                'IdDetalleNomina'=> $i+1,
                'IdNomina'=> $idNomina->getIdNomina(),
                'IdEmpleado'=> $idEmpleados[$i],
                'SueldoBase'=> $sueldoBase[$i],
                'Comisiones'=>$comision,
                'TotalSueldo'=>$sueldoBase[$i]+$comision,
            );


            // var_dump($pruebaNomina[$i]);
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
}else {
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


        case "informe":
            $nomina = new detalle_nomina();
            $datos1 = $nomina->consultar($datos['codigo']);
            $a=array();
            foreach ($datos1 as $key => $value) {
             $a[]= implode(";",$value);
            
            }
            $pdf = new PDF('L');
            // T�tulos de las columnas
            $titulos = array('Id', 'Nomina', 'IdEmpleado','Nombre','IdSede','Sede','Comisiones','SueldoBase');
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