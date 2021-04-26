<?php
include_once __DIR__ . "/modeloAbstractoDB.php";
    
class modelo_usuario extends ModeloAbstractoDB{
    private $IdUsuario;
    private $Usuario;
    private $IdTipoUsuario;
    private $Contrasena;

    function __construct(){
        
    }    
    public function lista(){

    }

    public function consultar($datos=array()){
             $usuario = $datos['usuario'];
		//	$password = $datos['password'];
            $this->query = "
            SELECT *
			FROM usuarios 
			WHERE Usuario = '$usuario'
			";

            $this->obtener_resultados_query();
			
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
					 $this->$propiedad = $valor;
	            //  echo $propiedad;
				endforeach;
			endif;
	    return($this->rows);

    }

    public function nuevo(){

    }

    public function editar(){

    }

    public function borrar(){

    }
    

    
    

    /**
     * Get the value of IdUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->IdUsuario;
    }

    /**
     * Set the value of IdUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($IdUsuario)
    {
        $this->IdUsuario = $IdUsuario;

        return $this;
    }

    /**
     * Get the value of Usuario
     */ 
    public function getUsuario()
    {
        return $this->Usuario;
    }

    /**
     * Set the value of Usuario
     *
     * @return  self
     */ 
    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    /**
     * Get the value of IdTipoUsuario
     */ 
    public function getIdTipoUsuario()
    {
        return $this->IdTipoUsuario;
    }

    /**
     * Set the value of IdTipoUsuario
     *
     * @return  self
     */ 
    public function setIdTipoUsuario($IdTipoUsuario)
    {
        $this->IdTipoUsuario = $IdTipoUsuario;

        return $this;
    }

    /**
     * Get the value of Contrasena
     */ 
    public function getContrasena()
    {
        return $this->Contrasena;
    }

    /**
     * Set the value of Contrasena
     *
     * @return  self
     */ 
    public function setContrasena($Contrasena)
    {
        $this->Contrasena = $Contrasena;

        return $this;
    }
}

?>
