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
// var_dump($_SESSION);
if (!empty($_SESSION["IdSede"])) {
    $IdSede = $_SESSION["IdSede"];
}
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
        $datos = $ventas->consultarprod($IdProducto, $IdSede);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);

        break;
    case "listarProductos":
        $datos = $ventas->listaprod($IdSede);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;
    case 'GenerarFactura':

        $array = explode("&", $datos['datos']);
        foreach ($array as $value) {
            $a = explode("=", $value);
            $b[$a[0]] = $a[1];
        }
        $b['IdEmpleado'] = $_SESSION['IdEmpleado'];
        $b['IdSede'] = $IdSede;
        $productos = $_POST['Productos'];
        $datos = $ventas->nuevo($b, $productos);
        // var_dump($b);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;

    case 'listarfacturas':
        $datos = $ventas->consultar($IdSede);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);

        break;
    case 'GenerarFacturacliente':

        if(!empty($_SESSION['IdCliente'])){
            $b['IdEmpleado']="";
            $b['IdCliente']=$_SESSION['IdCliente'];
            $b['subtotal']=$_POST['subtotal'];
            $b['total']=$_POST['total'];
            $productos = $_POST['Productos'];
            $datos = $ventas->nuevo($b, $productos);
        }else{
            $datos =2;
        }
        
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);

        break;
}
