<?php

class modelo_pais {
    private $IdPais;
    private $NombrePais;
    
  

    function __construct(){
        
    } 

      
    public function getIdPais()
    {
        return $this->IdPais;
    }

   
    public function setIdPais($IdPais)
    {
        $this->IdPais = $IdPais;

        return $this;
    }

  
    public function getNombrePais()
    {
        return $this->NombrePais;
    }

  
    public function setNombrePais($NombrePais)
    {
        $this->NombrePais = $NombrePais;

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