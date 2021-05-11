<?php
require_once "modeloAbstractoDB.php";

    class modelo_sede extends ModeloAbstractoDB{
        private $IdSede;
        private $IdCiudad;
        private $NombreSede;

        function __construct(){
            
        }

        public function getIdSede()
        {
                return $this->IdSede;
        }

        public function setIdSede($IdSede)
        {
                $this->IdSede = $IdSede;
        }

        public function getIdCiudad()
        {
                return $this->IdCiudad;
        }

        public function setIdCiudad($IdCiudad)
        {
                $this->IdCiudad = $IdCiudad;
        }

        public function getNombreSede()
        {
                return $this->NombreSede;
        }

        public function setNombreSede($NombreSede)
        {
                $this->NombreSede = $NombreSede;
        }

        public function lista(){
                $this->query = "
		SELECT IdSede,NombreSede,c.NombreCiudad
		FROM sede AS s INNER JOIN ciudad AS c
                ON(s.IdCiudad = c.IdCiudad)";
		$this->obtener_resultados_query();
		return $this->rows;

        }

        public function consultar($id=''){
                if($id != ''):
                        $this->query = "
                        SELECT IdSede,IdCiudad,NombreSede
                        FROM sede
                        WHERE IdSede = '$id'";
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
                    INSERT INTO sede
                    (IdCiudad, NombreSede)
                    VALUES ('$IdCiudad','$NombreSede')";
                    $resultado = $this->ejecutar_query_simple();
                    return $resultado;
        }

        public function editar($datos=array()){
                foreach ($datos as $campo=>$valor):
                        $$campo = $valor;
                endforeach;
                $this->query = "
                UPDATE sede
                SET IdCiudad='$IdCiudad',
                NombreSede='$NombreSede'
                WHERE IdSede = '$IdSede'";
                $resultado = $this->ejecutar_query_simple();
                return $resultado;
        }

        public function borrar(){

        }
        
    }
?>