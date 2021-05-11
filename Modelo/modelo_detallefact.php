<?php

require_once "modeloAbstractoDB.php";

class detalle_factura extends ModeloAbstractoDB{
    private $IdDetalleFactura;
    private $IdFactura;
    private $IdProducto;
    private $Descuento;

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
     * Get the value of IdDetalleFactura
     */ 
    public function getIdDetalleFactura()
    {
        return $this->IdDetalleFactura;
    }

    /**
     * Set the value of IdDetalleFactura
     *
     * @return  self
     */ 
    public function setIdDetalleFactura($IdDetalleFactura)
    {
        $this->IdDetalleFactura = $IdDetalleFactura;

        return $this;
    }

    /**
     * Get the value of IdFactura
     */ 
    public function getIdFactura()
    {
        return $this->IdFactura;
    }

    /**
     * Set the value of IdFactura
     *
     * @return  self
     */ 
    public function setIdFactura($IdFactura)
    {
        $this->IdFactura = $IdFactura;

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
     * Get the value of Descuento
     */ 
    public function getDescuento()
    {
        return $this->Descuento;
    }

    /**
     * Set the value of Descuento
     *
     * @return  self
     */ 
    public function setDescuento($Descuento)
    {
        $this->Descuento = $Descuento;

        return $this;
    }
}

?>