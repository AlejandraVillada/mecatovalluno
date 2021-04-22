<?php
include_once __DIR__ . "/modeloAbstractoDB.php";

    class modelo_producto extends ModeloAbstractoDB{
        private $IdProducto;
        private $NombreProducto;

        function __construct(){
            
        } 

        public function getIdProducto()
        {
                return $this->IdProducto;
        }

        public function setIdProducto($IdProducto)
        {
                $this->IdProducto = $IdProducto;
        }

        public function getNombreProducto()
        {
                return $this->NombreProducto;
        }

        public function setNombreProducto($NombreProducto)
        {
                $this->NombreProducto = $NombreProducto;
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