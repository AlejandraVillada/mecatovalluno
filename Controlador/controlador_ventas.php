<?php
include_once  "../modelo/modelo_factura.php";
include_once  "../modelo/modelo_ventas.php";
include_once  "../modelo/modelo_detallefact.php";
header('Content-Type: application/json');
$datos = $_POST; //datos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$datos = $_POST; //datos

if (!empty($_GET['accion'])) {
    $accion = $_GET['accion'];
    if (!empty($_GET['iddetalle'])) {
        $iddetalle = $_GET['iddetalle'];
    }

}
$ventas= new modelo_ventas();
switch ($accion) {
    //Case/ contenido variable accion
    case "listarestadisticas":

        $datos = $ventas->lista();
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
      

    break; //cierre

    case "listarProdHome":
        $datos = $ventas->listaprodVista();
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
    break;
}
