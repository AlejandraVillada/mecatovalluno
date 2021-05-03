<?php
require_once "modeloAbstractoDB.php";

class modelo_materiaPrima extends ModeloAbstractoDB {
    private $IdMateriaPrima;
    private $NombreMateriaPrima;
    private $Stock;
    private $IdMedida;
    private $NombreMedida;
  

    function __construct(){
        
    } 
    // abstract protected function consultar();
    // abstract protected function nuevo();
    // abstract protected function editar();
    // abstract protected function borrar();
    // abstract protected function lista();
    public function lista(){
        $this->query="SELECT mp.*,m.NombreMedida FROM materiaprima mp 
        INNER JOIN Medidas m ON(mp.IdMedida=m.idMedida)ORDER BY NombreMateriaPrima";
		$this->obtener_resultados_query();
		return $this->rows;
    }

    public function consultar($id=''){
        if($id != ''):
            $this->query = "SELECT mp.*,m.NombreMedida FROM materiaprima mp 
            INNER JOIN Medidas m ON(mp.IdMedida=m.idMedida) WHERE mp.IdMateriaPrima='$id'";
            $this->obtener_resultados_query();
            //var_dump ($this->rows);
        endif;
        // if(count($this->rows) == 1):
        //     foreach ($this->rows[0] as $propiedad=>$valor):
        //         $this->$propiedad = $valor;
        //     endforeach;
        // endif;
		return $this->rows;

    }

    public function actualizar($datos=array()){
        foreach ($datos as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $Stock1=$Stock+$datos['Cantidad_Actual'];
        
        $this->query = "UPDATE materiaprima SET Stock='$Stock1'
        WHERE IdMateriaPrima = '$IdMateriaPrima'
        ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;

    }
    public function borrar(){

    }

   
    public function editar(){
        
    }
    public function nuevo(){
        
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


   
    

    /**
     * Get the value of IdMedida
     */ 
    public function getIdMedida()
    {
        return $this->IdMedida;
    }

    /**
     * Set the value of IdMedida
     *
     * @return  self
     */ 
    public function setIdMedida($IdMedida)
    {
        $this->IdMedida = $IdMedida;

        return $this;
    }

    /**
     * Get the value of NombreMedida
     */ 
    public function getNombreMedida()
    {
        return $this->NombreMedida;
    }

    /**
     * Set the value of NombreMedida
     *
     * @return  self
     */ 
    public function setNombreMedida($NombreMedida)
    {
        $this->NombreMedida = $NombreMedida;

        return $this;
    }
}

?>