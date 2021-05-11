<?php
 include_once __DIR__."../modelo/modelo_factura.php";
 include_once __DIR__."../modelo/modelo_detallefact.php";
 header('Content-Type: application/json');


$datos=$_POST;//datos

$accion=$_POST['accion'];

switch($accion){
    //Case/ contenido variable accion
    case "hola":
    
        //contenido

    break;//cierre
}





?>