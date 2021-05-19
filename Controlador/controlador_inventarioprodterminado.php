<?php
include_once "../Modelo/modelo_producto.php";
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$datos = $_POST; //datos
// var_dump ($_POST);
//     var_dump ($_FILES);
if (!empty($_GET['accion'])) {
    $accion = $_GET['accion'];
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    }

} else {
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (!empty($_FILES['Foto'])) {
        $revisar = getimagesize($_FILES["Foto"]["tmp_name"]);
        $image = $_FILES['Foto']['tmp_name'];
        $tamaño = $_FILES['Foto']['size'];
        
        // var_dump(base64_encode($imgContenido));
        if (($_FILES["Foto"]["type"] == "image/pjpeg")
            || ($_FILES["Foto"]["type"] == "image/jpeg")
            || ($_FILES["Foto"]["type"] == "image/png")
            || ($_FILES["Foto"]["type"] == "image/gif")) {
            if (move_uploaded_file($_FILES["Foto"]["tmp_name"], "images/" . $_FILES['Foto']['name'])) {
               
                // echo "images/" . $_FILES['Foto']['name'];
            } else {
                // echo 0;
            }
        } else {
            // echo 0;
        }
            $archivo_objetivo=fopen("images/" . $_FILES['Foto']['name'],"r");
            $contenidoimg=fread($archivo_objetivo,$tamaño);
            fclose($archivo_objetivo);
            $imgContenido1 = ($contenidoimg);
            // var_dump(base64_encode(($imgContenido1)));
           $datos['Foto']=$imgContenido1;
    }

    $accion = $_POST['accion'];

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
        // var_dump($datos);
        $datos = $producto->nuevo($datos);
        echo json_encode(array('data' => $datos), JSON_UNESCAPED_UNICODE);
        break;

}
