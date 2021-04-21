<?php
    
class modelo_usuario {
    private $IdUsuario;
    private $usuario;
    private $IdTipoUsuario;
    private $contrasena;

    function __construct(){
        
    }    

    public function getIdUsuario()
    {
        return $this->IdUsuario;
    }

    public function setIdUsuario($IdUsuario)
    {
        $this->IdUsuario = $IdUsuario;
    }
    
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function getIdTipoUsuario()
    {
        return $this->IdTipoUsuario;
    }
 
    public function setIdTipoUsuario($IdTipoUsuario)
    {
        $this->IdTipoUsuario = $IdTipoUsuario;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }
    
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
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