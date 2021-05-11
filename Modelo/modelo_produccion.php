<?php
include_once __DIR__ . "/modeloAbstractoDB.php";

    class modelo_produccion extends ModeloAbstractoDB{
        private $IdProduccion;
        private $IdMateriaPrima;
        private $DiaProduccion;
        private $HorarioInicioProduccion;
        private $HorarioFinProduccion;
        private $Estado;

        function __construct(){
            
        } 

        public function getIdProduccion()
        {
            return $this->IdProduccion;
        }

        public function setIdProduccion($IdProduccion)
        {
            $this->IdProduccion = $IdProduccion;
        }

        public function getIdMateriaPrima()
        {
            return $this->IdMateriaPrima;
        }

        public function setIdMateriaPrima($IdMateriaPrima)
        {
            $this->IdMateriaPrima = $IdMateriaPrima;
        }

        public function getDiaProduccion()
        {
            return $this->DiaProduccion;
        }

        public function setDiaProduccion($DiaProduccion)
        {
            $this->DiaProduccion = $DiaProduccion;
        }

        public function getHorarioInicioProduccion()
        {
            return $this->HorarioInicioProduccion;
        }

        public function setHorarioInicioProduccion($HorarioInicioProduccion)
        {
            $this->HorarioInicioProduccion = $HorarioInicioProduccion;
        }

        public function getHorarioFinProduccion()
        {
            return $this->HorarioFinProduccion;
        }

        public function setHorarioFinProduccion($HorarioFinProduccion)
        {
            $this->HorarioFinProduccion = $HorarioFinProduccion;
        }

        public function getEstado()
        {
            return $this->Estado;
        }

        public function setEstado($Estado)
        {
            $this->Estado = $Estado;
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