<?php

    require_once("modeloAbstractoDB.php");


    class modelo_detProveedor extends ModeloAbstractoDB{

        private $IdDetalleProveedor;
        private $IdProveedor;
        private $IdMateriaPrima;
    

        function __construct(){
            
        } 

        public function getIdDetalleProveedor()
        {
            return $this->IdDetalleProveedor;
        }        

        public function getIdMateriaPrima()
        {
            return $this->IdMateriaPrima;
        }

        public function getIdProveedor()
        {
            return $this->IdProveedor;
        }

        //Metodos
    
        public function lista(){
            $this->query = "
			SELECT IdDetalleProveedor, p.NombreProveedor, m.NombreMateriaPrima
			FROM detalle_proveedor AS d 
            INNER JOIN proveedor AS p
            ON (d.IdProveedor = p.IdProveedor)
            INNER JOIN materiaprima AS m
            ON (d.IdMateriaPrima = m.IdMateriaPrima)
            ORDER BY IdDetalleProveedor
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
        }

        public function consultar($IdDetalleProveedor = ''){
            if($IdDetalleProveedor != ''):
				$this->query = "
				SELECT IdDetalleProveedor, IdProveedor, IdMateriaPrima
				FROM detalle_proveedor
				WHERE IdDetalleProveedor = '$IdDetalleProveedor' ORDER BY IdDetalleProveedor
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
            if(array_key_exists('IdDetalleProveedor', $datos)):
				foreach ($datos as $campo => $valor):
					$$campo = $valor;
				endforeach;
				$this->query = "
					INSERT INTO detalle_proveedor
					(IdDetalleProveedor, IdProveedor, IdMateriaPrima)
					VALUES
					('$IdDetalleProveedor', '$IdProveedor', '$IdMateriaPrima')
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
			UPDATE detalle_proveedor
			SET IdProveedor = '$IdProveedor',
			IdMateriaPrima = '$IdMateriaPrima'
			WHERE IdDetalleProveedor = '$IdDetalleProveedor'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
        }

        public function borrar(){

        }
        
    }

?>