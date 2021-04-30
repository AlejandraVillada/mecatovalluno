<?php
 include_once "../Modelo/modelo_inventarioMP.php";


$datos=$_POST;//datos

if(!empty($_GET['accion'])){
    $accion=$_GET['accion'];
}else{
$accion=$_POST['accion'];

}
$materiaPrima= new modelo_materiaPrima();
switch($accion){
    //Case/ contenido variable accion
    case "listar":
     $datos=$materiaPrima->lista();
     echo json_encode(array('data'=>$datos), JSON_UNESCAPED_UNICODE);
    break;//cierre
}





?>