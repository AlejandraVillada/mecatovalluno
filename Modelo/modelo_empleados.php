<?php

    require_once("modeloAbstractoDB.php");

    class modelo_empleados extends ModeloAbstractoDB {

        private $IdEmpleado;
        private $NombreEmpleado;
        private $Email;
        private $SueldoBase;
        private $Telefono;
        private $Cargo;
        private $IdSede;
        private $IdEstado;
    
        function __construct(){
            
        } 

        public function getIdEmpleado()
        {
            return $this->IdEmpleado;
        }        

        public function getNombreEmpleado()
        {
            return $this->NombreEmpleado;
        }        

        public function getEmail()
        {
            return $this->Email;
        }        

        public function getSueldoBase()
        {
            return $this->SueldoBase;
        }        

        public function getTelefono()
        {
            return $this->Telefono;
        }        

        public function getCargo()
        {
            return $this->Cargo;
        }        
    
        public function getIdSede()
        {
            return $this->IdSede;
        }           

        public function getIdEstado()
        {
            return $this->IdEstado;
        }       
    
        //Metodos    
    
        public function lista(){
            $this->query = "
			SELECT IdEmpleado, NombreEmpleado, Email, SueldoBase, Telefono,
            c.TipoUsuario, s.NombreSede, es.Estado
			FROM empleados AS e 
            INNER JOIN sede AS s
			ON (e.IdSede = s.IdSede) 
            INNER JOIN tipo_usuario AS c
            ON (e.Cargo = c.IdTipoUsuario)
            INNER JOIN estados AS es
            ON (e.IdEstado = es.IdEstado)
            ORDER BY IdEmpleado
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
        }

        public function usuarios(){
            $this->query = "
			SELECT IdTipoUsuario, TipoUsuario
			FROM tipo_usuario
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
        }

        public function sedes(){
            $this->query = "
			SELECT IdSede, IdCiudad, NombreSede
			FROM sede
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
        }

        public function estado(){
            $this->query = "
			SELECT IdEstado, Estado
			FROM estados
			";
			$this->obtener_resultados_query();
			return $this->rows;
        }


        public function lista2(){
            $this->query = "
			SELECT IdTipoUsuario, TipoUsuario
			FROM tipo_usuario
            ORDER BY IdTipoUsuario
			";
			
			$this->obtener_resultados_query();
			return $this->rows;
        }        

        public function consultar($IdEmpleado = ''){
            if($IdEmpleado != ''):
				$this->query = "
				SELECT IdEmpleado, NombreEmpleado, Email, SueldoBase, Telefono, Cargo, IdSede, IdEstado
				FROM empleados
				WHERE IdEmpleado = '$IdEmpleado' ORDER BY IdEmpleado
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
            if(array_key_exists('IdEmpleado', $datos)):
				foreach ($datos as $campo => $valor):
					$$campo = $valor;
				endforeach;
				$NombreEmpleado = utf8_decode($NombreEmpleado);
                $Email = utf8_decode($Email);
				$this->query = "
					INSERT INTO empleados
					(IdEmpleado, NombreEmpleado, Email, SueldoBase, Telefono, Cargo, IdSede, IdEstado)
					VALUES
					('$IdEmpleado', '$NombreEmpleado', '$Email', '$SueldoBase', '$Telefono', '$Cargo', '$IdSede', '$IdEstado')
					";
				$resultado = $this->ejecutar_query_simple();
				return $resultado;
			endif;
        }

        public function editar($datos = array()){
            foreach ($datos as $campo => $valor):
				$$campo = $valor;
			endforeach;
			// $NombreEmpleado = utf8_decode($NombreEmpleado);
            // $Email = utf8_decode($Email);
            // $Estado = utf8_decode($Estado);
			$this->query = "
			UPDATE empleados
			SET NombreEmpleado = '$NombreEmpleado',
			Email = '$Email',
			SueldoBase = '$SueldoBase',
			Telefono = '$Telefono',
			Cargo = '$Cargo',
			IdSede = '$IdSede',
			IdEstado = '$IdEstado'
			WHERE IdEmpleado = '$IdEmpleado'
			";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
        }

        public function borrar(){
           
        } 
    }

?>