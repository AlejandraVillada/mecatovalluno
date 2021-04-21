<?php
    
class modelo_usuario {
    private $usuario;
    private $contrasena;


    function _construct($usuario){
        $this->usuario=$usuario;
    }

    function listar(){

    }
    function consultar($id){

    }
    function nuevo(){

    }
    function modificar(){

    }
    
    
    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */ 
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of contrasena
     */ 
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set the value of contrasena
     *
     * @return  self
     */ 
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }
}


?>