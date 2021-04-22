<?php

include_once __DIR__ . "/modeloAbstractoDB.php";

class detalle_producto extends ModeloAbstractoDB{
    private $IdDetalleProducto;
    private $IdProducto;
    private $IdMateriaPrima;
    private $Cantidad;
    private $CantidadProducido;
    private $DescripcionProducto;

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
     * Get the value of CantidadProducido
     */ 
    public function getCantidadProducido()
    {
        return $this->CantidadProducido;
    }

    /**
     * Set the value of CantidadProducido
     *
     * @return  self
     */ 
    public function setCantidadProducido($CantidadProducido)
    {
        $this->CantidadProducido = $CantidadProducido;

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
}

?>