<?php

include_once __DIR__ . "/modeloAbstractoDB.php";

class detalle_produccion extends ModeloAbstractoDB{
    private $IdDetalleProduccion;
    private $IdProduccion;
    private $IdProducto;
    private $CantidadProduccion;

    function __construct(){

    }
    public function consultar()
    {

    }

    public function nuevo()
    {

    }
    public function editar()
    {

    }

    public function borrar()
    {

    }

    public function lista()
    {

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
}

?>