<?php

require_once "modeloAbstractoDB.php";

class detalle_producto extends ModeloAbstractoDB
{
    private $IdDetalleProducto;
    private $IdProducto;
    private $IdMateriaPrima;
    private $Cantidad;
    private $IdMedida;
    private $DescripcionProducto;
    private $seq;

    public function __construct()
    {

    }
    public function listamedida()
    {
        $this->query = "SELECT IdMedida,NombreMedida
		FROM Medidas";
        $this->obtener_resultados_query();
        return $this->rows;
    }
    public function listamp()
    {
        $this->query = "SELECT *
		FROM materiaprima";
        $this->obtener_resultados_query();
        return $this->rows;
    }
    public function consultar($id = '', $producto = '')
    {
        $this->consultarsec($producto);
        if ($id != ''):
            $this->query = "SELECT dp.Cantidad,dp.IdProducto,dp.DescripcionProducto, dp.IdDetalleProducto,
		            m.IdMedida,mp.NombreMateriaPrima,dp.IdMateriaPrima
		            FROM detalle_producto dp
		            INNER JOIN Medidas m ON(dp.IdMedida=m.idMedida)
		            INNER JOIN materiaprima mp ON(dp.IdMateriaPrima=mp.IdMateriaPrima)
		            INNER JOIN producto p ON(dp.IdProducto=p.IdProducto)
		            WHERE dp.IdDetalleProducto='$id' AND dp.IdProducto='$producto'";
            $this->obtener_resultados_query();
            //var_dump ($this->rows);
        endif;

        $result = $this->rows;

        return $result;

    }
    public function consultarsec($id)
    {

        $this->query = "SELECT Max(IdDetalleProducto) as seq FROM `detalle_producto` WHERE IdProducto=$id";
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
        $this->query = "INSERT INTO  detalle_producto
        VALUES($IdDetalleProducto,$IdProducto,$IdMateriaPrima,$Cantidad,$IdMedida
        ,'$DescripcionProducto')";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }
    public function editar($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;

        $this->query = "UPDATE detalle_producto SET
        IdMateriaPrima = '$IdMateriaPrima',Cantidad='$Cantidad',
        IdMedida='$IdMedida',DescripcionProducto='$DescripcionProducto'
        WHERE IdProducto = '$IdProducto' AND 	IdDetalleProducto='$IdDetalleProducto'
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
    public function buscar($IdProductos){
        $this->query = "SELECT NombreProducto
		FROM producto WHERE IdProducto='$IdProductos'";
        $this->obtener_resultados_query();
        return $this->rows;
    }

    /**
     * Get the value of IdDetalleProducto
     */
    public function getIdDetalleProducto()
    {
        return $this->IdDetalleProducto;
    }

    /**
     * Set the value of IdDetalleProducto
     *
     * @return  self
     */
    public function setIdDetalleProducto($IdDetalleProducto)
    {
        $this->IdDetalleProducto = $IdDetalleProducto;

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
     * Get the value of IdMateriaPrima
     */
    public function getIdMateriaPrima()
    {
        return $this->IdMateriaPrima;
    }

    /**
     * Set the value of IdMateriaPrima
     *
     * @return  self
     */
    public function setIdMateriaPrima($IdMateriaPrima)
    {
        $this->IdMateriaPrima = $IdMateriaPrima;

        return $this;
    }

    /**
     * Get the value of Cantidad
     */
    public function getCantidad()
    {
        return $this->Cantidad;
    }

    /**
     * Set the value of Cantidad
     *
     * @return  self
     */
    public function setCantidad($Cantidad)
    {
        $this->Cantidad = $Cantidad;

        return $this;
    }

    /**
     * Get the value of IdMedida
     */
    public function getIdMedida()
    {
        return $this->IdMedida;
    }

    /**
     * Set the value of IdMedida
     *
     * @return  self
     */
    public function setIdMedida($IdMedida)
    {
        $this->IdMedida = $IdMedida;

        return $this;
    }

    /**
     * Get the value of DescripcionProducto
     */
    public function getDescripcionProducto()
    {
        return $this->DescripcionProducto;
    }

    /**
     * Set the value of DescripcionProducto
     *
     * @return  self
     */
    public function setDescripcionProducto($DescripcionProducto)
    {
        $this->DescripcionProducto = $DescripcionProducto;

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
