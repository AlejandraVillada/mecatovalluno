<?php

    require_once("../Modelo/modelo_detProveedor.php");
    require_once("../Modelo/modelo_proveedor.php");

    $datos=$_GET;
    $accion=$_GET['accion'];

    switch($accion) {
        case "lista_proveedores":
            $proveedores = new modelo_detProveedor();
            $listado = $proveedores->proveedores();
            echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);    
        break;

        case "lista_productos":
            $productos = new modelo_detProveedor();
            $listado = $productos->productos();
            echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);    
        break;

        case "lista_estados":
            $estado = new modelo_proveedor();
            $listado = $estado->estados();
            echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);    
        break;

        case "lista_proveedor":        
            $proveedores = new modelo_proveedor();
            $listado = $proveedores->lista();
            echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);  
        break;

        case "lista_det_proveedor":        
            $det_proveedores = new modelo_detProveedor();
            $listado = $det_proveedores->lista();
            echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE);  
        break;

        case "consultar_proveedor":        
            $proveedores = new modelo_proveedor();
            $proveedores->consultar($datos['codigo']);
    
            if($proveedores->getIdProveedor() == null) {
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            }  else {
                $respuesta = array(
                    'codigo' => $proveedores->getIdProveedor(),
                    'nombre' => $proveedores->getNombreProveedor(),
                    'estado' => $proveedores->getIdEstado(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta);
        break;

        case "consultar_det_proveedor":        
            $det_proveedores = new modelo_detProveedor();
            $listado = $det_proveedores->consultar_proveedor($datos['codigo']);            
            echo json_encode(array('data' => $listado), JSON_UNESCAPED_UNICODE); 
        break;

        case "consultar_det_proveedor2":        
            $det_proveedores = new modelo_detProveedor();
            $listado = $det_proveedores->consultar($datos['codigo'], $datos['codigo2']);
    
            if($det_proveedores->getIdDetalleProveedor() == null) {
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            }  else {
                $respuesta = array(
                    'codigo' => $det_proveedores->getIdDetalleProveedor(),
                    'proveedor' => $det_proveedores->getIdProveedor(),
                    'materia' => $det_proveedores->getIdMateriaPrima(),
                    'respuesta' => 'existe'
                );
            }
            echo json_encode($respuesta); 
        break;

        case 'nuevo_proveedor':
            $proveedores = new modelo_proveedor();
            $resultado = $proveedores->nuevo($datos);
            if($resultado > 0) {
                $respuesta = array(
                    'respuesta' => 'correcto'
                );
            }  else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'nuevo_det_proveedor':
            $det_proveedores = new modelo_detProveedor();
            $resultado = $det_proveedores->nuevo($datos);
            if($resultado > 0) {
                $respuesta = array(
                    'respuesta' => 'correcto'
                );
            }  else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            echo json_encode($respuesta);
        break;

        case 'editar_proveedor':
            $proveedores = new modelo_proveedor();
            $resultado = $proveedores->editar($datos);
            $respuesta = array(
                    'respuesta' => $resultado
                );
            echo json_encode($respuesta);
        break;

        case 'editar_det_proveedor':
            $det_proveedores = new modelo_detProveedor();
            $resultado = $det_proveedores->editar($datos);
            $respuesta = array(
                    'respuesta' => $resultado
                );
            echo json_encode($respuesta);
        break;
    }

?>