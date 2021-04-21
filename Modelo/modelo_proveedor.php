<?php
    class modelo_proveedor {
        private $IdProveedor;
        private $NombreProveedor;

        function __construct(){
            
        }        

        public function getIdProveedor()
        {
                return $this->IdProveedor;
        }

        public function setIdProveedor($IdProveedor)
        {
                $this->IdProveedor = $IdProveedor;
        }

        public function getNombreProveedor()
        {
                return $this->NombreProveedor;
        }

        public function setNombreProveedor($NombreProveedor)
        {
                $this->NombreProveedor = $NombreProveedor;
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