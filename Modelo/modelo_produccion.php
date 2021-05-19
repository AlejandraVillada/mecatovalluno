<?php
require_once "modeloAbstractoDB.php";

    class modelo_produccion extends ModeloAbstractoDB{
        private $IdProduccion;
        private $IdMateriaPrima;
        private $DiaProduccion;
        private $HorarioInicioProduccion;
        private $HorarioFinProduccion;
        private $Estado;
        private $IdSede;

        function __construct(){
            
        } 
        public function lista()
    {
        $this->query = "SELECT p.*,s.NombreSede FROM produccion p 
        INNER JOIN sede s ON(p.IdSede=s.IdSede) ORDER BY DiaProduccion";
        $this->obtener_resultados_query();
        return $this->rows;
    }
    public function consultarprod($id = '')
    {
        if ($id != ''):
            $this->query = "SELECT p.* FROM produccion p WHERE p.Idproduccion='$id'";
            $this->obtener_resultados_query();
        endif;
        return $this->rows;
    }

    public function consultar($id = '')
    {
        if ($id != ''):
            $this->query = "SELECT dp.*,m.NombreProducto
	            FROM detalle_produccion dp
	            INNER JOIN producto m ON(dp.IdProducto=m.IdProducto)
	            WHERE dp.Idproduccion='$id'";
            $this->obtener_resultados_query();
            // var_dump ($this->rows);
        endif;

        return $this->rows;

    }

    public function actualizar($datos = array())
    {

        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "UPDATE produccion SET  DiaProduccion='$DiaProduccion', 
        HorarioInicioProduccion='$HorarioInicioProduccion',
        HorarioFinProduccion='$HorarioFinProduccion',
        Estado='$Estado',IdSede='$IdSede'
                WHERE IdProduccion = $IdProduccion
                ";
     

        $resultado = $this->ejecutar_query_simple();
        return $resultado;

    }

    public function nuevo($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "INSERT INTO produccion SET
        DiaProduccion='$DiaProduccion', 
        HorarioInicioProduccion='$HorarioInicioProduccion',
        HorarioFinProduccion='$HorarioFinProduccion',
        Estado='$Estado',IdSede='$IdSede'

                ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;

    }

    public function editar()
    {

    }

    public function borrar()
    {

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

        

        /**
         * Get the value of IdSede
         */ 
        public function getIdSede()
        {
                return $this->IdSede;
        }

        /**
         * Set the value of IdSede
         *
         * @return  self
         */ 
        public function setIdSede($IdSede)
        {
                $this->IdSede = $IdSede;

                return $this;
        }
    }

?>