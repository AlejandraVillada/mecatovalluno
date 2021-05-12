<?php
include_once "../Modelo/modelo_producto.php";
header('Content-Type: application/json');
$datos = $_POST; //datos

if (!empty($_GET['accion'])) {
    $accion = $_GET['accion'];
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    }

} else {
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
    }
    //  $id = $_POST['id'];
    $accion = $_POST['accion'];
    //var_dump($datos);
}
$producto = new modelo_producto();
switch ($accion) {
    //Case/ contenido variable accion
    case "listar":
        $datos = $producto->lista();
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break; //cierre
    case "consultar":

        $datos = $producto->consultar($id);
        //$datos1=$datos;
        if (!empty($datos)) {
            foreach ($datos as $key => $value) {

                foreach ($value as $key => $val) {
                    //var_dump($key."---".$val);
                    $datos2[$key] = utf8_decode($val);
                    # code...
                }
                $datos1[] = $datos2;

            }
            echo json_encode(array('data' => $datos1), JSON_UNESCAPED_UNICODE);

        } else {
            echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);

        }

        // var_dump($datos1);
        break; //cierr
    case "consultarprod":

        $datos = $producto->consultarprod($id);
        //var_dump($datos);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break; //cierr

    case "actualizar":
        $datos = $producto->actualizar($datos);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;
    case "nuevo":
        $datos = $producto->nuevo($datos);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;

}
