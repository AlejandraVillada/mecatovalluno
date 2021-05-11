<?php
include_once "../Modelo/modelo_inventarioMP.php";
header('Content-Type: application/json');
$datos = $_POST; //datos

if (!empty($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = $_POST['accion'];
    // var_dump ($datos);
}
$materiaPrima = new modelo_materiaPrima();
switch ($accion) {
    //Case/ contenido variable accion
    case "listar":
        $datos = $materiaPrima->lista();
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break; //cierre
    case "consultar":

        $datos = $materiaPrima->consultar($datos['id']);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break; //cierr
    case "actualizar":
        $datos = $materiaPrima->actualizar($datos);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;

}
