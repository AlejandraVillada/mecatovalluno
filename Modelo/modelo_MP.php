<?php
include_once "modeloAbstractoDB.php";

class modelo_materiaPrima extends ModeloAbstractoDB {
    private $IdMateriaPrima;
    private $NombreMateriaPrima;
    private $Stock;
    private $IdMedida;
  

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

    public function getIdMedida()
    {
        return $this->IdMedida;
    }

    public function setIdMedida($IdMedida)
    {
        $this->IdMedida = $IdMedida;

    }


   
    public function lista(){
        $this->query = "
		SELECT IdMateriaPrima,NombreMateriaPrima,Stock,m.NombreMedida
		FROM materiaprima AS mp INNER JOIN Medidas AS m
        ON(mp.IdMedida = m.IdMedida)
        ORDER BY NombreMateriaPrima";
		$this->obtener_resultados_query();
		return $this->rows;
    }

    public function lista_medidas(){
        $this->query = "
		SELECT IdMedida,NombreMedida
		FROM Medidas";
		$this->obtener_resultados_query();
		return $this->rows;
    }

    public function consultar($id=''){
        if($id != ''):
            $this->query = "
		    SELECT IdMateriaPrima,NombreMateriaPrima,Stock,IdMedida
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
            foreach ($datos as $campo=>$valor):
                $$campo = $valor;
            endforeach;
            $this->query = "
            INSERT INTO materiaprima
            (NombreMateriaPrima, Stock,IdMedida)
            VALUES
            ('$NombreMateriaPrima', '$Stock','$IdMedida')
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;

    }

    public function editar($datos=array()){
        foreach ($datos as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        UPDATE materiaprima
        SET NombreMateriaPrima='$NombreMateriaPrima',
        Stock='$Stock',
        IdMedida='$IdMedida'
        WHERE IdMateriaPrima = '$IdMateriaPrima'
        ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;

    }

    public function borrar(){

    }
    

   
   
}

?>