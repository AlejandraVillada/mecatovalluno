<?php

    require_once("modeloAbstractoDB.php");

    class modelo_proveedor extends ModeloAbstractoDB{

        private $IdProveedor;
        private $NombreProveedor;

        function __construct(){
            
        }        

        public function getIdProveedor()
        {
                return $this->IdProveedor;
        }

        public function getNombreProveedor()
        {
                return $this->NombreProveedor;
        }

        //Metodos

        public function lista(){
            $this->query = "
	    SELECT IdProveedor, NombreProveedor
	    FROM proveedor
        ORDER BY IdProveedor
	    ";
			
	    $this->obtener_resultados_query();
	    return $this->rows;

        }

        public function consultar($IdProveedor = ''){
            if($IdProveedor != ''):
                $this->query = "
                SELECT IdProveedor, NombreProveedor
                FROM proveedor
                WHERE IdProveedor = '$IdProveedor' ORDER BY IdProveedor
                ";
                $this->obtener_resultados_query();
            endif;
            if(count($this->rows) == 1):
                foreach ($this->rows[0] as $propiedad=>$valor):
                    $this->$propiedad = $valor;
                endforeach;
            endif;
        }

        public function nuevo($datos = array()){
            if(array_key_exists('IdProveedor', $datos)):
                foreach ($datos as $campo => $valor):
                    $$campo = $valor;
                endforeach;
                $NombreProveedor = utf8_decode($NombreProveedor);
                $this->query = "
                    INSERT INTO proveedor
                    (IdProveedor, NombreProveedor)
                    VALUES
                    ('$IdProveedor', '$NombreProveedor')
                    ";
                $resultado = $this->ejecutar_query_simple();
                return $resultado;
            endif;
        }

        public function editar($datos = array()){
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            $this->query = "
            UPDATE proveedor
            SET NombreProveedor = '$NombreProveedor'
            WHERE IdProveedor = '$IdProveedor'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }

        public function borrar(){

        }
        
    }
?>