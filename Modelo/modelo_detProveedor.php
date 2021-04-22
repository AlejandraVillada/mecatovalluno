<?php
include_once __DIR__ . "/modeloAbstractoDB.php";


class modelo_detProveedor extends ModeloAbstractoDB{
    private $IdDetalleProveedor;
    private $IdProveedor;
    private $IdMateriaPrima;
  

    function __construct(){
        
    } 

    public function getIdDetalleProveedor()
    {
        return $this->IdDetalleProveedor;
    }

    public function setIdDetalleProveedor($IdDetalleProveedor)
    {
        $this->IdDetalleProveedor = $IdDetalleProveedor;
    }

    public function getIdMateriaPrima()
    {
        return $this->IdMateriaPrima;
    }

    public function setIdMateriaPrima($IdMateriaPrima)
    {
        $this->IdMateriaPrima = $IdMateriaPrima;
    }

    public function getIdProveedor()
    {
        return $this->IdProveedor;
    }

    public function setIdProveedor($IdProveedor)
    {
        $this->IdProveedor = $IdProveedor;
    }

   
    public function lista(){

    }

    public function consultar(){

    }

    public function nuevo(){

    }

    public function editar(){

    }

    public function borrar(){

    }
    
}

?>