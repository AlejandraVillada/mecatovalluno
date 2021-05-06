<?php
  require_once("../Modelo/modelo_sede.php");
  require_once("../Modelo/modelo_pais.php");
  require_once("../Modelo/modelo_ciudades.php");

$datos=$_GET;

$accion=$_GET['accion'];

switch($accion){
    case 'editar_pais':
        $pais = new modelo_pais();
        $resultado = $pais->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo_pais':
        $pais = new modelo_pais();
        $resultado = $pais->nuevo($datos);
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
    case 'borrar':
      break;
    case 'consultar_pais':
        $pais = new modelo_pais();
        $pais->consultar($datos['codigo']);

        if($pais->getIdPais() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $pais->getIdPais(),
                'pais' => $pais->getNombrePais(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar_pais':
        $pais = new modelo_pais();
        $listado = $pais->lista();        
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
        break;


        case 'editar_ciudad':
            $ciudad = new modelo_ciudad();
            $resultado = $ciudad->editar($datos);
            $respuesta = array(
                    'respuesta' => $resultado
                );
            echo json_encode($respuesta);
            break;
        case 'nuevo_ciudad':
            $ciudad = new modelo_ciudad();
            $resultado = $ciudad->nuevo($datos);
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
        case 'borrar':
          break;
        case 'consultar_ciudad':
            $ciudad = new modelo_ciudad();
            $ciudad->consultar($datos['codigo']);
    
            if($ciudad->getIdCiudad() == null) {
                $respuesta = array(
                    'respuesta' => 'no existe'
                );
            }  else {
                $respuesta = array(
                    'codigo' => $ciudad->getIdCiudad(),
                    'pais' => $ciudad->getIdPais(),
                    'ciudad' => $ciudad->getNombreCiudad(),
                    'respuesta' =>'existe'
                );
            }
            echo json_encode($respuesta);
            break;
    
        case 'listar_ciudad':
            $ciudad = new modelo_ciudad();
            $listado = $ciudad->lista();        
            echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
            break;

            case 'editar_sede':
                $sede = new modelo_sede();
                $resultado = $sede->editar($datos);
                $respuesta = array(
                        'respuesta' => $resultado
                    );
                echo json_encode($respuesta);
                break;
            case 'nuevo_sede':
                $sede = new modelo_sede();
                $resultado = $sede->nuevo($datos);
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
            case 'borrar':
              break;
            case 'consultar_sede':
                $sede = new modelo_sede();
                $sede->consultar($datos['codigo']);
        
                if($sede->getIdSede() == null) {
                    $respuesta = array(
                        'respuesta' => 'no existe'
                    );
                }  else {
                    $respuesta = array(
                        'codigo' => $sede->getIdSede(),
                        'ciudad' => $sede->getIdCiudad(),
                        'sede' => $sede->getNombreSede(),
                        'respuesta' =>'existe'
                    );
                }
                echo json_encode($respuesta);
                break;
        
            case 'listar_sede':
                $sede = new modelo_sede();
                $listado = $sede->lista();        
                echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);
                break;


}






?>