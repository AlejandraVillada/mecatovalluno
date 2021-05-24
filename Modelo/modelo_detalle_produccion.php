<?php

require_once "modeloAbstractoDB.php";

class detalle_produccion extends ModeloAbstractoDB
{
    private $IdDetalleProduccion;
    private $IdProduccion;
    private $IdProducto;
    private $CantidadProduccion;
    private $CantidadProductoTerminado;
    private $seq;

    public function __construct()
    {

    }

    public function consultar($id = '', $producto = '')
    {

        if ($id != ''):
            $this->query = "SELECT dp.*,s.Estado
	            FROM detalle_produccion dp
	            INNER JOIN producto p ON(dp.IdProducto=p.IdProducto)
	            INNER JOIN estadosproduccion s ON(dp.Estado=s.IdEstado)
	            WHERE dp.IdDetalleProduccion='$id' AND dp.IdProduccion='$producto'";
            $this->obtener_resultados_query();
            //var_dump ($this->rows);
        endif;

        $result = $this->rows;

        return $result;

    }
    public function consultarsec($id)
    {

        $this->query = "SELECT Max(IdDetalleProduccion) as seq FROM `detalle_produccion` WHERE IdProduccion=$id";
        $this->obtener_resultados_query();
        foreach ($this->rows[0] as $propiedad => $valor):
            $this->$propiedad = $valor;
        endforeach;

    }
    public function nuevo($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "INSERT INTO  detalle_produccion
        VALUES($IdDetalleProduccion,$IdProduccion,
        $IdProducto,$CantidadProduccion,$CantidadProductoTerminado)";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }
    public function editar($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;

        $this->query = "UPDATE detalle_produccion SET
        IdProducto = '$IdProducto',CantidadProduccion='$CantidadProduccion',
        CantidadProductoTerminado='$CantidadProductoTerminado'
        WHERE IdProduccion = '$IdProduccion' AND IdDetalleProduccion='$IdDetalleProduccion'
        ";
        // print_r($this->query);
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function borrar()
    {

    }

    public function lista()
    {

    }

    public function buscar($IdProducto)
    {
        //echo $IdProducto;
        $this->query = "SELECT dp.IdMateriaPrima,dp.Cantidad,dp.IdMedida,m.NombreMedida
		FROM detalle_producto dp
        INNER JOIN Medidas m ON(dp.IdMedida=m.idMedida)
         WHERE dp.IdProducto='$IdProducto'";
        $this->obtener_resultados_query();
        return $this->rows;
    }
    public function cantidadmaxima($id)
    {

        $producto = $this->buscar($id);
        $this->rows = null;
        $this->query = "SELECT mp.IdMateriaPrima,mp.Stock,m.NombreMedida
		FROM materiaprima mp
        INNER JOIN Medidas m ON(mp.IdMedida=m.IdMedida)";
        $this->obtener_resultados_query();
        $materiaprima = $this->rows;

        // var_dump($materiaprima);

        foreach ($producto as $key => $value) {
            $stock;
            $idmp;
            $cantidad;
            $idmp = 0;
            foreach ($value as $key1 => $value1) {
                $x = 0;

                if ($key1 == "IdMateriaPrima") {
                    $idmp = $value1;
                    // echo "hola".$value1."+++";
                    for ($i = 0; $i < count($materiaprima); $i++) {
                        $x = 0;
                        foreach ($materiaprima[$i] as $key2 => $value2) {
                            if ($key2 == "IdMateriaPrima") {
                                if ($value1 == $value2) {
                                    $x = 1;

                                }

                            } else {
                                if ($x == 1 && $key2 == "Stock") {
                                    $stock = $value2;
                                }
                                if ($x == 1 && $key2 == "NombreMedida") {
                                    $medida = $value2;
                                }
                            }
                        }
                    }
                } else {

                    if ($key1 == "Cantidad") {
                        $cantidad = $value1;
                        // echo $stock;
                    }if ($key1 == "NombreMedida") {

                        if ($medida == $value1) {
                            $restante = $stock - $cantidad;
                            // echo $idmp;

                            $x = $this->validar($stock, $cantidad);
                            if ($restante > 0) {
                                $valor[] = array("Id" => $idmp, "val" => "ok", "veces" => $x);
                            } else {
                                $valor[] = array("Id" => $idmp, "val" => "No ok", "veces" => $x);

                            }
                        } else {
                            $a = 0;
                            $b = 0;
                            $x = 0;
                            // var_dump("fffff" . $cantidad);
                            // var_dump($idmp);

                            $hola = $this->validarmedida($value1, $medida, $cantidad);
                            $restante = $stock - $hola;
                            // var_dump("Medida" . $value1 . "Medida" . $medida . "Cantidad" . $cantidad);
                            // echo ("stock" . $stock . "restar" . $hola . "resultado:" . $this->validarmedida($value1, $medida, $cantidad));
                            $x = $this->validar($stock, $hola);

                            //var_dump($restante);
                            if ($restante > 0) {
                                $valor[] = array("Id" => $idmp, "val" => "ok", "veces" => $x);
                            } else {
                                $valor[] = array("Id" => $idmp, "val" => "No ok", "veces" => $x);

                            }

                        }
                    }
                }
            }
        }
        // var_dump($valor);
        $c = 0;
        $d = 0;
        $a = array();
        foreach ($valor as $key => $value) {
            foreach ($value as $key1 => $value1) {
                if ($key1 == "veces") {
                    $a[] = $value1;
                } else if ($value1 == "No ok") {
                    $c++;
                }
            }
        }
        $d = min($a);
        // echo $d;
        if ($c > 0) {
            return array("Habilitado" => "No", "max" => $d);
        } else {
            return array("Habilitado" => "Si", "max" => $d);
        }
    }
    private function validar($stock, $valor)
    {
        $c = 0;
        try {
            $c = $stock / $valor;
        } catch (\Throwable $th) {
            $c = 0;
        }

        return round($c, 0, PHP_ROUND_HALF_DOWN);

    }

    private function validarmedida($medidainicial, $medidafinal, $valor)
    {
        switch ($medidainicial) {
            case 'Libras':
                if ($medidafinal == "Kilos") {
                    return $valor / 2;
                } else if ($medidafinal == "Gramos") {
                    return $valor * 500;
                }

                break;
            case 'Kilos':
                if ($medidafinal == "Libras") {
                    return $valor * 2;
                } else if ($medidafinal == "Gramos") {
                    return $valor * 1000;
                }

                break;
            case 'Panales':
                if ($medidafinal == "Unidades") {
                    return $valor * 30;
                }

                break;
            case 'Unidades':
                if ($medidafinal == "Panales") {
                    return $valor / 30;
                }

                break;

            case 'Cucharada':
                if ($medidafinal == "Gramos") {
                    return $valor * 30;
                }

                break;
            case 'Gramos':
                if ($medidafinal == "Kilos") {
                    return $valor * 0.001;
                } else if ($medidafinal == "Libras") {
                    return $valor * 0.00220462;
                }

                break;

        }

    }
    /**
     * Get the value of IdDetalleProduccion
     */
    public function getIdDetalleProduccion()
    {
        return $this->IdDetalleProduccion;
    }

    /**
     * Set the value of IdDetalleProduccion
     *
     * @return  self
     */
    public function setIdDetalleProduccion($IdDetalleProduccion)
    {
        $this->IdDetalleProduccion = $IdDetalleProduccion;

        return $this;
    }

    /**
     * Get the value of IdProduccion
     */
    public function getIdProduccion()
    {
        return $this->IdProduccion;
    }

    /**
     * Set the value of IdProduccion
     *
     * @return  self
     */
    public function setIdProduccion($IdProduccion)
    {
        $this->IdProduccion = $IdProduccion;

        return $this;
    }

    /**
     * Get the value of IdProducto
     */
    public function getIdProducto()
    {
        return $this->IdProducto;
    }

    /**
     * Set the value of IdProducto
     *
     * @return  self
     */
    public function setIdProducto($IdProducto)
    {
        $this->IdProducto = $IdProducto;

        return $this;
    }

    /**
     * Get the value of CantidadProduccion
     */
    public function getCantidadProduccion()
    {
        return $this->CantidadProduccion;
    }

    /**
     * Set the value of CantidadProduccion
     *
     * @return  self
     */
    public function setCantidadProduccion($CantidadProduccion)
    {
        $this->CantidadProduccion = $CantidadProduccion;

        return $this;
    }

    /**
     * Get the value of CantidadProductoTerminado
     */
    public function getCantidadProductoTerminado()
    {
        return $this->CantidadProductoTerminado;
    }

    /**
     * Set the value of CantidadProductoTerminado
     *
     * @return  self
     */
    public function setCantidadProductoTerminado($CantidadProductoTerminado)
    {
        $this->CantidadProductoTerminado = $CantidadProductoTerminado;

        return $this;
    }

    /**
     * Get the value of seq
     */
    public function getSeq()
    {
        return $this->seq;
    }

    /**
     * Set the value of seq
     *
     * @return  self
     */
    public function setSeq($seq)
    {
        $this->seq = $seq;

        return $this;
    }
}
