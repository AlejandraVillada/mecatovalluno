<?php
require_once "modeloAbstractoDB.php";

class modelo_pais extends ModeloAbstractoDB{
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
        $this->query = "
		SELECT IdPais,NombrePais
		FROM pais";
		$this->obtener_resultados_query();
		return $this->rows;
    }

    public function consultar($id=''){
        if($id != ''):
            $this->query = "
		    SELECT IdPais,NombrePais
		    FROM pais
            WHERE IdPais = '$id'";
            $this->obtener_resultados_query();
        endif;
        if(count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad=>$valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
    }

    public function nuevo($datos=array()){
        foreach ($datos as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        INSERT INTO pais
        (NombrePais)
        VALUES ('$NombrePais')";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function editar($datos=array()){
        foreach ($datos as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        UPDATE pais
        SET NombrePais='$NombrePais'
        WHERE IdPais = '$IdPais'";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function borrar(){

    }
    

   
 
}

?>