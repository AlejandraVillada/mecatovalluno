<?php
include_once "../modelo/modelo_factura.php";
include_once "../modelo/modelo_ventas.php";
include_once "../modelo/modelo_detallefact.php";
header('Content-Type: application/json');
$datos = $_POST; //datos
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$Sede = $_SESSION["IdSede"];
$datos = $_POST; //datos

if (!empty($_GET['accion'])) {
    $accion = $_GET['accion'];
    if (!empty($_GET['IdProducto'])) {
        $IdProducto = $_GET['IdProducto'];
    }

} else if (!empty($_POST['accion'])) {
    $accion = $_POST['accion'];
    if (!empty($_POST['IdProducto'])) {
        $IdProducto = $_POST['IdProducto'];
    }

}
$ventas = new modelo_ventas();
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
    case "listarProd":
        $datos = $ventas->consultarprod($IdProducto, $Sede);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);

        break;
    case "listarProductos":
        $datos = $ventas->listaprod($Sede);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;
}
