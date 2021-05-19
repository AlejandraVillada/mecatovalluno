<?php
require_once "modeloAbstractoDB.php";

class modelo_factura extends ModeloAbstractoDB
{
    private $IdFactura;
    private $Subtotal;
    private $TotalFactura;
    private $Id_Cliente;

    public function __construct()
    {

    }

    public function getIdFactura()
    {
        return $this->IdFactura;
    }

    public function setIdFactura($IdFactura)
    {
        $this->IdFactura = $IdFactura;
    }

    public function getSubtotal()
    {
        return $this->Subtotal;
    }

    public function setSubtotal($Subtotal)
    {
        $this->Subtotal = $Subtotal;
    }

    public function getTotalFactura()
    {
        return $this->TotalFactura;
    }

    public function setTotalFactura($TotalFactura)
    {
        $this->TotalFactura = $TotalFactura;
    }

    public function getId_Cliente()
    {
        return $this->Id_Cliente;
    }

    public function setId_Cliente($Id_Cliente)
    {
        $this->Id_Cliente = $Id_Cliente;
    }

    public function lista()
    {

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

}
