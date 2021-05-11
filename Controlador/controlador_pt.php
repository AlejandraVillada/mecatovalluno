<?php

    include_once __DIR__."../modelo/modelo_producto";
    include_once __DIR__."../modelo/modelo_detalle_producto";
    header('Content-Type: application/json');

    $datos=$_POST;//datos

    $accion=$_POST['accion'];

    switch($accion) {
        //Case/ contenido variable accion
        case "hola":
        
            //contenido

        break;//cierre
    }

?>