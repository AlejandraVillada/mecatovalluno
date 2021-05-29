<?php

require_once "../Modelo/modelo_MP.php";
include_once "../pdf/informe_mp.php";
header('Content-Type: application/json');
$datos = $_GET; //datos

switch ($_GET['accion']) {
    case 'editar':
        $materiaPrima = new modelo_materiaPrima();
        $resultado = $materiaPrima->editar($datos);
        $respuesta = array(
            'respuesta' => $resultado,
        );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $materiaPrima = new modelo_materiaPrima();
        $resultado = $materiaPrima->nuevo($datos);
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
        $materiaPrima = new modelo_materiaPrima();
        $materiaPrima->consultar($datos['codigo']);

        if ($materiaPrima->getIdMateriaPrima() == null) {
            $respuesta = array(
                'respuesta' => 'no existe',
            );
        } else {
            $respuesta = array(
                'codigo' => $materiaPrima->getIdMateriaPrima(),
                'materiaPrima' => $materiaPrima->getNombreMateriaPrima(),
                'stock' => $materiaPrima->getStock(),
                'medida' => $materiaPrima->getIdMedida(),
                'respuesta' => 'existe',
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $materiaPrima = new modelo_materiaPrima();
        $listado = $materiaPrima->lista();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

    case 'listar_medidas':
        $medidas = new modelo_materiaPrima();
        $listado = $medidas->lista_medidas();
        echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);
        break;

        case "informe":
            $mp = new modelo_materiaPrima();
            $datos1 = $mp->lista();
            $a=array();
            foreach ($datos1 as $key => $value) {
             $a[]= implode(";",$value);
            
            }
            $pdf = new PDF();
            // T�tulos de las columnas
            $titulos = array('IdMateriaPrima', 'NombreMateriaPrima', 'Stock','Medida');
            // Carga de datos
            $datos = $pdf->cargarDatos($a);
            $pdf->SetFont('Arial', '', 10);
            $pdf->AddPage();
            $pdf->TablaElegante($titulos, $datos);
            $pdf->Output();
            break;

}
