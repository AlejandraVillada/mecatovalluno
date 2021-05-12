<?php

require_once "modeloAbstractoDB.php";

class detalle_produccion extends ModeloAbstractoDB{
    private $IdDetalleProduccion;
    private $IdProduccion;
    private $IdProduccion;
    private $CantidadProduccion;
    private $CantidadProductoTerminado;

    function __construct(){

    }
    

    public function consultar($id = '', $producto = '')
    {
       
        if ($id != ''):
            $this->query = "SELECT dp.CantidadProduccion,dp.IdProduccion,dp.DescripcionProducto, dp.IdDetalleProduccion,
		            m.IdMedida,mp.NombreMateriaPrima,dp.IdProducto
		            FROM detalle_produccion dp
		            INNER JOIN Medidas m ON(dp.IdMedida=m.idMedida)
		            INNER JOIN materiaprima mp ON(dp.IdProducto=mp.IdProducto)
		            INNER JOIN producto p ON(dp.IdProducto=p.IdProducto)
		            WHERE dp.IdDetalleProduccion='$id' AND dp.IdProducto='$producto'";
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
    public function buscar($IdProducto){
        $this->query = "SELECT NombreProducto
		FROM producto WHERE IdProducto='$IdProducto'";
        $this->obtener_resultados_query();
        return $this->rows;
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
}

?>