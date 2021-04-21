<?php

class modelo_empleados {
    private $IdEmpleado;
    private $NombreEmpleado;
    private $Email;
    private $SueldoBase;
    private $Telefono;
    private $Cargo;
    private $IdSede;
    private $Estado;
  

    function __construct(){
        
    } 

    public function getIdEmpleado()
    {
        return $this->IdEmpleado;
    }

    public function setIdEmpleado($IdEmpleado)
    {
        $this->IdEmpleado = $IdEmpleado;
    }

    public function getNombreEmpleado()
    {
        return $this->NombreEmpleado;
    }

    public function setNombreEmpleado($NombreEmpleado)
    {
        $this->NombreEmpleado = $NombreEmpleado;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getSueldoBase()
    {
        return $this->SueldoBase;
    }


    public function setSueldoBase($SueldoBase)
    {
        $this->SueldoBase = $SueldoBase;

    }

    public function getTelefono()
    {
        return $this->Telefono;
    }

    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    public function getCargo()
    {
        return $this->Cargo;
    }

   
    public function setCargo($Cargo)
    {
        $this->Cargo = $Cargo;

        return $this;
    }

 
    public function getIdSede()
    {
        return $this->IdSede;
    }

 
    public function setIdSede($IdSede)
    {
        $this->IdSede = $IdSede;

        return $this;
    }

    public function getEstado()
    {
        return $this->Estado;
    }


    public function setEstado($Estado)
    {
        $this->Estado = $Estado;

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