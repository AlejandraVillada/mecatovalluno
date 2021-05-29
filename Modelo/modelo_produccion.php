<?php
require_once "modeloAbstractoDB.php";
require_once "modelo_detalle_produccion.php";

class modelo_produccion extends ModeloAbstractoDB
{
    private $IdProduccion;
    private $IdMateriaPrima;
    private $DiaProduccion;
    private $HorarioInicioProduccion;
    private $HorarioFinProduccion;
    private $Estado;
    private $IdSede;

    public function __construct()
    {

    }
    public function lista()
    {
        $this->query = "SELECT p.*,s.NombreSede,n.Estado  FROM produccion p
                    INNER JOIN estadosproduccion n ON(p.Estado=n.IdEstado)
                    INNER JOIN sede s ON(p.IdSede=s.IdSede)
                     ORDER BY DiaProduccion";
        $this->obtener_resultados_query();
        return $this->rows;
    }
    public function consultarprod($id = '')
    {
        if ($id != ''):
            $this->query = "SELECT p.* FROM produccion p WHERE p.Idproduccion='$id'";
            $this->obtener_resultados_query();
        endif;
        return $this->rows;
    }

    public function consultar($id = '')
    {
        if ($id != ''):
            $this->query = "SELECT dp.*,m.NombreProducto,s.Estado
					FROM detalle_produccion dp
					INNER JOIN producto m ON(dp.IdProducto=m.IdProducto)
					INNER JOIN estadosproduccion s ON(dp.Estado=s.IdEstado)
					WHERE dp.Idproduccion='$id'";
            $this->obtener_resultados_query();
            // var_dump ($this->rows);
        endif;

        return $this->rows;

    }

    public function actualizar($datos = array())
    {

        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        if ($Estado == 1) {
            $this->query = "UPDATE produccion p SET  p.DiaProduccion='$DiaProduccion',
                            p.HorarioInicioProduccion='$HorarioInicioProduccion',
                            p.HorarioFinProduccion='$HorarioFinProduccion',
                            p.Estado='$Estado',p.IdSede='$IdSede'
                            WHERE IdProduccion = $IdProduccion
                    ";

            $resultado = $this->ejecutar_query_simple();
        }
        if ($Estado == 2) {
            $modelodetalle = new detalle_produccion();
            $detalles = $this->consultar($IdProduccion);
            $resultados=null;
            foreach ($detalles as $value) {
                // $a=array("CantidadProduccion"=>$value["CantidadProduccion"]);
                $materiaprimaporproducto[] = array("CantidadProduccion" => $value["CantidadProduccion"], "MateriaPrima" => $modelodetalle->buscar($value["IdProducto"]),"IdProducto"=>$value["IdProducto"]);

                $completo = ($materiaprimaporproducto);
            }
            foreach ($completo as $value) {
                
                $cproduct = $value["IdProducto"];

                foreach ($value as $key => $produccion) {

                    if ($key == "CantidadProduccion") {
                        $cantproduccion = $produccion;
                    } else if($key=="MateriaPrima"){
                        foreach ($produccion as $key => $value1) {
                            $resultado1 = 0;
                            $id = $value1["IdMateriaPrima"];
                            $cantidad = $value1['Cantidad'];
                            $cantidadprod = $cantidad * $cantproduccion;
                            // echo $cantidadprod;
                            $medida = $value1['NombreMedida'];
                            $this->rows = null;
                            $this->query = "SELECT mp.IdMateriaPrima,mp.Stock,m.NombreMedida
                                    FROM materiaprima mp
                                    INNER JOIN Medidas m ON(mp.IdMedida=m.IdMedida)
                                    where mp.IdMateriaPrima= '$id'";
                            $this->obtener_resultados_query();
                            $materiaprima = $this->rows;
                            foreach ($materiaprima as $key => $stock) {
                                // var_dump($stock);
                                $stockor = $stock['Stock'];
                                $medidaor = $stock['NombreMedida'];
                            }
                            if ($stock <= 0) {
                                $resultado1 = 1;
                            } else {

                                if ($medidaor == $medida) {
                                    $stockFinal = $stockor - $cantidadprod;
                                } else {
                                    //valor con la medida adecuada
                                    $valorconmedida = $modelodetalle->validarmedida($medida, $medidaor, $cantidadprod);
                                    $stockFinal = $stockor - $valorconmedida;

                                }

                                $this->query = "UPDATE materiaprima
                                                SET Stock='$stockFinal'
                                                WHERE IdMateriaPrima = '$id'";
                                $resultado = $this->ejecutar_query_simple();

                                // var_dump("medidainicial:" . $medida . " /medidafinal:" . $medidaor . "  /CantidadOriginal:" . $cantidad . "  /stock:" . $stockor . "  /cantidadproduccion" . $cantidadprod . "  /stockfinal" . $stockFinal . " // Resultado: " . $resultado);
                            }

                            if ($resultado1 == 1) {
                                $resultados[] = array("advertencia" => "si", "IdMP" => $id, "IdProducto" => $cproduct);
                            }
                        }

                    }

                }

            }

            foreach ($detalles as $value) {
                $CantidadProducto = $value["CantidadProductoTerminado"];
                $IdDetalleP = $value["IdDetalleProduccion"];
                $cantprod = $value["CantidadProduccion"];
                $cprod = $value["IdProduccion"];
                $this->query = "UPDATE detalle_produccion SET
                CantidadProductoTerminado='$CantidadProducto',CantidadProduccion='$cantprod',Estado=2
                WHERE IdProduccion = '$cprod' AND IdDetalleProduccion='$IdDetalleP'
                ";

                $resultado = $this->ejecutar_query_simple();
            }
            $this->query = "UPDATE produccion p SET  p.DiaProduccion='$DiaProduccion',
            p.HorarioInicioProduccion='$HorarioInicioProduccion',
            p.HorarioFinProduccion='$HorarioFinProduccion',
            p.Estado='$Estado',p.IdSede='$IdSede'
            WHERE IdProduccion = $IdProduccion
                         ";

            $resultado = $this->ejecutar_query_simple();

        }
        if (is_array($resultados)) {
            return $resultados;

        } else {
            return $resultado;

        }

    }
    public function estado()
    {
        $this->query = "
			SELECT IdEstado, Estado
			FROM estadosproduccion
			";
        $this->obtener_resultados_query();
        return $this->rows;
    }

    public function nuevo($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "INSERT INTO produccion SET
        DiaProduccion='$DiaProduccion',
        HorarioInicioProduccion='$HorarioInicioProduccion',
        HorarioFinProduccion='$HorarioFinProduccion',
        Estado='$Estado',IdSede='$IdSede'

                ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;

    }

    public function editar()
    {

    }

    public function borrar()
    {

    }
    public function getIdProduccion()
    {
        return $this->IdProduccion;
    }

    public function setIdProduccion($IdProduccion)
    {
        $this->IdProduccion = $IdProduccion;
    }

    public function getIdMateriaPrima()
    {
        return $this->IdMateriaPrima;
    }

    public function setIdMateriaPrima($IdMateriaPrima)
    {
        $this->IdMateriaPrima = $IdMateriaPrima;
    }

    public function getDiaProduccion()
    {
        return $this->DiaProduccion;
    }

    public function setDiaProduccion($DiaProduccion)
    {
        $this->DiaProduccion = $DiaProduccion;
    }

    public function getHorarioInicioProduccion()
    {
        return $this->HorarioInicioProduccion;
    }

    public function setHorarioInicioProduccion($HorarioInicioProduccion)
    {
        $this->HorarioInicioProduccion = $HorarioInicioProduccion;
    }

    public function getHorarioFinProduccion()
    {
        return $this->HorarioFinProduccion;
    }

    public function setHorarioFinProduccion($HorarioFinProduccion)
    {
        $this->HorarioFinProduccion = $HorarioFinProduccion;
    }

    public function getEstado()
    {
        return $this->Estado;
    }

    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    /**
     * Get the value of IdSede
     */
    public function getIdSede()
    {
        return $this->IdSede;
    }

    /**
     * Set the value of IdSede
     *
     * @return  self
     */
    public function setIdSede($IdSede)
    {
        $this->IdSede = $IdSede;

        return $this;
    }
}
