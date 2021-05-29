<?php
	abstract class ModeloAbstractoDB {
		private static $db_host ="151.106.97.204";// 127.0.0.1
		private static $db_user = "u310614642_admin";
		private static $db_pass = "M3cat0Vallun0";
		protected $db_name = "u310614642_mecatovalluno";
		protected $query;
		protected $rows = array();
		private $conexion;
		
		# métodos abstractos para Gestión de clases que hereden
		abstract protected function consultar();
		abstract protected function nuevo();
		abstract protected function editar();
		abstract protected function borrar();
		abstract protected function lista();
		
		
		# los siguientes métodos pueden definirse con exactitud y no son abstractos
		# Conectar a la base de datos
		private function abrir_conexion() {
			$this->conexion = 
			new mysqli(self::$db_host, self::$db_user, self::$db_pass, $this->db_name);
		}

		# Desconectar la base de datos
		private function cerrar_conexion() {
			$this->conexion->close();
		}
		
		# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE
		protected function ejecutar_query_simple() {			
			try {
				$this->abrir_conexion();
		        $this->conexion->query($this->query) 
				or die(mysqli_errno($this->conexion)." : " 
				.mysqli_error($this->conexion)."  | Query=".$this->query);
				$resultado = $this->conexion->affected_rows;
				$this->cerrar_conexion();
				return $resultado;
		    } catch(Exception $e) {
		        echo "Error! : " . $e->getMessage();
		        return false;
		    }
			
		}
		
		# Traer resultados de una consulta en un Array
		protected function obtener_resultados_query() {
			try {
				$this->abrir_conexion();
				$result = $this->conexion->query($this->query) 
					or die(mysqli_errno($this->conexion)." : " 
					.mysqli_error($this->conexion)." | Query=".$this->query);

				while ($fila = $result->fetch_assoc()){
					$this->rows[] = array_map('utf8_encode',$fila);
				}
				$result->close();
				$this->cerrar_conexion();
				//array_pop($this->rows);
			} catch(Exception $e) {
		        echo "Error! : " . $e->getMessage();
		        return false;
		    }
		}
	}
?>
