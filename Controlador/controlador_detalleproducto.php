<?php
include_once "../Modelo/modelo_detalle_producto.php";
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
    if (!empty($_POST['IdProducto'])) {
        $IdProducto = $_POST['IdProducto'];
    }
    //  $id = $_POST['id'];
    $accion = $_POST['accion'];
    //var_dump($datos);
}
$detalle_producto = new detalle_producto();
switch ($accion) {
    //Case/ contenido variable accion
    case "listar":
        $datos = $detalle_producto->lista();
        foreach ($value as $a => $value) {
            $datos1[$a] = utf8_decode($value);
        }
        echo json_encode(array('data' => $datos1), JSON_UNESCAPED_UNICODE);
        break; //cierre
    case "consultar":

        //  $datos = $detalle_producto->consultarsec($IdProducto);
        $datos = $detalle_producto->consultar($iddetalle, $IdProducto);
        foreach ($datos as $key => $value) {
            foreach ($value as $a => $value) {
                $datos1[$a] = utf8_decode($value);
            }
        }
        // var_dump($datos1);
        echo json_encode(array('data' => $datos1), JSON_UNESCAPED_UNICODE);
        break; //cierre
    case "actualizar":
        $datos = $detalle_producto->editar($datos);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;
    case "nuevo":
        $datos = $detalle_producto->nuevo($datos);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;
    case "listarmedida":
        $datos = $detalle_producto->listamedida();
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break; //cierre
    case "listarmp":
        $datos = $detalle_producto->listamp();
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;
    case 'secuencia':
        // var_dump($IdProducto);
        $datos = $detalle_producto->consultarsec($IdProducto);
        echo json_encode(array('data' => $detalle_producto->getSeq()), JSON_UNESCAPED_UNICODE);
        break;
    case "buscar":
        $datos = $detalle_producto->buscar($IdProducto);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;
}
