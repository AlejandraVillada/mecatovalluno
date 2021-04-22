<?php
include_once __DIR__ . "/modeloAbstractoDB.php";

class modelo_nomina extends ModeloAbstractoDB{
    private $IdNomina;
    private $FechaNomina;
    private $TotalNomina;
    
  

    function __construct(){
        
    } 

    public function getIdNomina()
    {
        return $this->IdNomina;
    }


    public function setIdNomina($IdNomina)
    {
        $this->IdNomina = $IdNomina;

        return $this;
    }

  
    public function getFechaNomina()
    {
        return $this->FechaNomina;
    }

 
    public function setFechaNomina($FechaNomina)
    {
        $this->FechaNomina = $FechaNomina;

        return $this;
    }


    public function getTotalNomina()
    {
        return $this->TotalNomina;
    }

    public function setTotalNomina($TotalNomina)
    {
        $this->TotalNomina = $TotalNomina;

        return $this;
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