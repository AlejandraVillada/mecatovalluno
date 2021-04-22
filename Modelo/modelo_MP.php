<?php
include_once __DIR__ . "/modeloAbstractoDB.php";

class modelo_materiaPrima extends ModeloAbstractoDB {
    private $IdMateriaPrima;
    private $NombreMateriaPrima;
    private $Stock;
  

    function __construct(){
        
    } 

    public function getIdMateriaPrima()
    {
        return $this->IdMateriaPrima;
    }

    public function setIdMateriaPrima($IdMateriaPrima)
    {
        $this->IdMateriaPrima = $IdMateriaPrima;
    }

    public function getNombreMateriaPrima()
    {
        return $this->NombreMateriaPrima;
    }

    public function setNombreMateriaPrima($NombreMateriaPrima)
    {
        $this->NombreMateriaPrima = $NombreMateriaPrima;
    }

    public function getStock()
    {
        return $this->Stock;
    }

    public function setStock($Stock)
    {
        $this->Stock = $Stock;
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