<?php
include_once "../Modelo/modelo_detalle_produccion.php";
header('Content-Type: application/json');
$datos = $_POST; //datos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!empty($_GET['accion'])) {
    $accion = $_GET['accion'];
    if (!empty($_GET['iddetalle'])) {
        $iddetalle = $_GET['iddetalle'];
    }

} else {
    if (!empty($_POST['iddetalle'])) {
        $iddetalle = $_POST['iddetalle'];
    }
    if (!empty($_POST['IdProduccion'])) {
        $IdProduccion = $_POST['IdProduccion'];
    }
    if (!empty($_POST['IdProducto'])) {
        $IdProducto = $_POST['IdProducto'];
    }
    //  $id = $_POST['id'];
    $accion = $_POST['accion'];
    //var_dump($datos);
}

$detalle_produccion = new detalle_produccion();

switch ($accion) {
    //Case/ contenido variable accion
    case "listar":
        $datos = $detalle_produccion->lista();
        foreach ($value as $a => $value) {
            $datos1[$a] = utf8_decode($value);
        }
        echo json_encode(array('data' => $datos1), JSON_UNESCAPED_UNICODE);
        break; //cierre
    case "consultar":

        //  $datos = $detalle_produccion->consultarsec($IdProducto);
        $datos = $detalle_produccion->consultar($iddetalle, $IdProduccion);
        foreach ($datos as $key => $value) {
            foreach ($value as $a => $value) {
                $datos1[$a] = utf8_decode($value);
            }
        }
        // var_dump($datos1);
        echo json_encode(array('data' => $datos1), JSON_UNESCAPED_UNICODE);
        break; //cierre
    case "actualizar":
        $datos = $detalle_produccion->editar($datos);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;
    case "nuevo":
        $datos = $detalle_produccion->nuevo($datos);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;
    case "listarmedida":
        $datos = $detalle_produccion->listamedida();
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break; //cierre
    case "listarmp":
        $datos = $detalle_produccion->listamp();
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;
    case 'secuencia':
        // var_dump($IdProducto);
        $datos = $detalle_produccion->consultarsec($IdProduccion);
        echo json_encode(array('data' => $detalle_produccion->getSeq()), JSON_UNESCAPED_UNICODE);
        break;
    case "buscar":
        $datos = $detalle_produccion->buscar($IdProduccion);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;

    case "cantidadmaxima":

        $datos = $detalle_produccion->validarproducto($IdProducto,$IdProduccion);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;
    break;
}
