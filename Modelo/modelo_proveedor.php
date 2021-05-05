<?php

    require_once("modeloAbstractoDB.php");

    class modelo_proveedor extends ModeloAbstractoDB{

        private $IdProveedor;
        private $NombreProveedor;
        private $IdEstado;

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

        public function getIdEstado()
        {
                return $this->IdEstado;
        }

        //Metodos

        public function estados(){
            $this->query = "
			SELECT IdEstado, Estado
			FROM estados
			";
			$this->obtener_resultados_query();
			return $this->rows;
        }

        public function lista(){
            $this->query = "
	    SELECT IdProveedor, NombreProveedor, e.Estado
	    FROM proveedor AS p
        INNER JOIN estados AS e
        ON (p.IdEstado = e.IdEstado)
        ORDER BY IdProveedor
	    ";
			
	    $this->obtener_resultados_query();
	    return $this->rows;

        }

        public function consultar($IdProveedor = ''){
            if($IdProveedor != ''):
                $this->query = "
                SELECT IdProveedor, NombreProveedor, IdEstado
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
            
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
                
            $this->query = "
                INSERT INTO proveedor
                (NombreProveedor, IdEstado)
                VALUES
                ('$NombreProveedor', '$IdEstado')
                ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
            
        }

        public function editar($datos = array()){
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            $this->query = "
            UPDATE proveedor
            SET NombreProveedor = '$NombreProveedor',
            IdEstado = '$IdEstado'
            WHERE IdProveedor = '$IdProveedor'
            ";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        }

        public function borrar(){

        }
        
    }
?>