<?php
include_once "modeloAbstractoDB.php";

class modelo_materiaPrima extends ModeloAbstractoDB {
    private $IdMateriaPrima;
    private $NombreMateriaPrima;
    private $Stock;
    private $Medida;
  

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

    public function getMedida()
    {
        return $this->Medida;
    }

    public function setMedida($Medida)
    {
        $this->Medida = $Medida;

    }


   
    public function lista(){
        $this->query = "
		SELECT IdMateriaPrima,NombreMateriaPrima,Stock,Medida
		FROM materiaprima 
        ORDER BY NombreMateriaPrima";
		$this->obtener_resultados_query();
		return $this->rows;
    }

    public function consultar($id=''){
        if($id != ''):
            $this->query = "
		    SELECT IdMateriaPrima,NombreMateriaPrima,Stock,Medida
		    FROM materiaprima 
            WHERE IdMateriaPrima = '$id'";
            $this->obtener_resultados_query();
        endif;
        if(count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad=>$valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
    }

    public function nuevo($datos=array()){
        if(array_key_exists('IdMateriaPrima', $datos)):
            foreach ($datos as $campo=>$valor):
                $$campo = $valor;
            endforeach;
            $this->query = "
            INSERT INTO materiaprima
            (IdMateriaPrima, NombreMateriaPrima, Stock,Medida)
            VALUES
            ('$IdMateriaPrima', '$NombreMateriaPrima', '$Stock','$Medida')
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        endif;

    }

    public function editar($datos=array()){
        foreach ($datos as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        UPDATE materiaprima
        SET NombreMateriaPrima='$NombreMateriaPrima',
        Stock='$Stock',
        Medida='$Medida'
        WHERE IdMateriaPrima = '$IdMateriaPrima'
        ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;

    }

    public function borrar(){

    }
    

   
   
}

?>