<?php
include_once __DIR__ . "/modeloAbstractoDB.php";
    
class modelo_usuario extends ModeloAbstractoDB{
    private $IdUsuario;
    private $usuario;
    private $IdTipoUsuario;
    private $contrasena;

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
	              echo $propiedad;
				endforeach;
			endif;
	    var_dump($this->rows);

    }

    public function nuevo(){

    }

    public function editar(){

    }

    public function borrar(){

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

    
    
}

?>
