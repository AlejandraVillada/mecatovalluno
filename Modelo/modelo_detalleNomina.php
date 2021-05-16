<?php

    require_once "modeloAbstractoDB.php";

class detalle_nomina extends ModeloAbstractoDB
{
    private $IdDetalleNomina;
    private $IdNomina;
    private $IdEmpleado;
    private $Comisiones;
    private $SueldoBase;
    private $TotalSueldo;

    public function __construct()
    {

    }

    public function consultar()
    {

    }

    public function nuevo($datos = array())
    {
        if (array_key_exists('IdDetalleNomina', $datos)):
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            
            $this->query = "
						INSERT INTO detalle_nomina
						(IdDetalleNomina, IdNomina, IdEmpleado, Comisiones, SueldoBase, TotalSueldo)
						VALUES
						('$IdDetalleNomina', '$IdNomina', '$IdEmpleado', 'NULL', '$SueldoBase', '$TotalSueldo')
						";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        endif;
    }

    public function editar()
    {

    }

    public function borrar()
    {

    }

    public function lista()
    {

    }

    public function listaEmpleados()
    {
        $this->query = "
			SELECT IdEmpleado, NombreEmpleado, SueldoBase, s.NombreSede
			FROM empleados AS e
            INNER JOIN sede AS s
			ON (e.IdSede = s.IdSede)
            ORDER BY IdEmpleado
			";

        $this->obtener_resultados_query();

        // if (count($this->rows) == 1):
        //     foreach ($this->rows[0] as $propiedad => $valor):
        //         $this->$propiedad = $valor;
        //     endforeach;
        // endif;

        return $this->rows;
    }

    public function consultarIdNomina($fecha)
    {
        if ($fecha != ''):
            $this->query = "
				SELECT IdNomina
				FROM nomina
				WHERE FechaNomina = '$fecha'
				";
            $this->obtener_resultados_query();
        endif;

        // var_dump($this->rows[0]);

        if (count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad => $valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
    }

    public function getIdDetalleNomina()
    {
        return $this->IdDetalleNomina;
    }

    public function getIdNomina()
    {
        return $this->IdNomina;
    }

    public function getIdEmpleado()
    {
        return $this->IdEmpleado;
    }

    public function getComisiones()
    {
        return $this->Comisiones;
    }

    public function getSueldoBase()
    {
        return $this->SueldoBase;
    }

    public function getTotalSueldo()
    {
        return $this->TotalSueldo;
    }

}