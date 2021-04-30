<?php

    include_once __DIR__."../modelo/modelo_MP";

    $datos=$_POST;//datos

    switch ($_POST['accion']){
        // case 'editar':
        //     $materiaPrima = new modelo_materiaPrima();
        //     $resultado = $materiaPrima->editar($datos);
        //     $respuesta = array(
        //             'respuesta' => $resultado
        //         );
        //     echo json_encode($respuesta);
        //     break;
        // case 'nuevo':
        //     $departamento = new modelo_materiaPrima();
        //     $resultado = $departamento->nuevo($datos);
        //     if($resultado > 0) {
        //         $respuesta = array(
        //             'respuesta' => 'correcto'
        //         );
        //     }  else {
        //         $respuesta = array(
        //             'respuesta' => 'error'
        //         );
        //     }
        //     echo json_encode($respuesta);
        //     break;
        // case 'borrar':
        //   break;
        // case 'consultar':
        //     $departamento = new modelo_materiaPrima();
        //     $departamento->consultar($datos['codigo']);
    
        //     if($departamento->getDepa_codi() == null) {
        //         $respuesta = array(
        //             'respuesta' => 'no existe'
        //         );
        //     }  else {
        //         $respuesta = array(
        //             'codigo' => $departamento->getDepa_codi(),
        //             'departamento' => $departamento->getDepa_nomb(),
        //             'pais' =>$departamento->getPais_codi(),
        //             'respuesta' =>'existe'
        //         );
        //     }
        //     echo json_encode($respuesta);
        //     break;
    
        // case 'listar':
        //     $departamento = new modelo_materiaPrima();
        //     $listado = $departamento->lista();        
        //     echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        //     break;
    }
?>