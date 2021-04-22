<?php
include_once __DIR__ . "/modeloAbstractoDB.php";

    class modelo_tipo_usuario extends ModeloAbstractoDB{
        private $IdTipoUsuario;
        private $TipoUsuario;

        function __construct(){
            
        }        

        public function getIdTipoUsuario()
        {
                return $this->IdTipoUsuario;
        }

        public function setIdTipoUsuario($IdTipoUsuario)
        {
                $this->IdTipoUsuario = $IdTipoUsuario;
        }
 
        public function getTipoUsuario()
        {
                return $this->TipoUsuario;
        }

        public function setTipoUsuario($TipoUsuario)
        {
                $this->TipoUsuario = $TipoUsuario;
        }

        public function lista(){

        }

        public function consultar(){

        }

        public function nuevo(){

        }

        public function editar(){

        }

        public function borrar(){

        }
        
    }
?>