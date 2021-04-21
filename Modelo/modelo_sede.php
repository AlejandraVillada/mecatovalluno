<?php
    class modelo_sede {
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