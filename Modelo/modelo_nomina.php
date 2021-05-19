<?php

    require_once "modeloAbstractoDB.php";

class modelo_nomina extends ModeloAbstractoDB
{
    private $IdNomina;
    private $FechaNomina;
    private $TotalNomina;

    public function __construct()
    {

    }

    public function getIdNomina()
    {
        return $this->IdNomina;
    }

    public function getFechaNomina()
    {
        return $this->FechaNomina;
    }

    public function getTotalNomina()
    {
        return $this->TotalNomina;
    }

    public function lista($FechaNomina = '')
    {
        $this->query = "
            SELECT IdNomina, FechaNomina, TotalNomina
            FROM nomina
            WHERE FechaNomina = '$FechaNomina'
            ORDER BY IdNomina
            ";

        $this->obtener_resultados_query();
        return $this->rows;
    }

    public function consultar($IdNomina = '')
    {
        if ($IdNomina != ''):
            $this->query = "
					SELECT IdNomina, FechaNomina, TotalNomina
					FROM nomina
					WHERE IdNomina = '$IdNomina'
					";
            $this->obtener_resultados_query();
        endif;

        return count($this->rows);
    }

    public function nuevo($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;

        $this->query = "
			INSERT INTO nomina
			(FechaNomina)
			VALUES
			('$FechaNomina')
			";

        $resultado = $this->ejecutar_query_simple();
        return $resultado;
        
    }

    public function fechas($fecha = '')
    {
        $this->query = "
            SELECT FechaNomina
            FROM nomina
            WHERE FechaNomina = '$fecha'
            ";        

        $this->obtener_resultados_query();

        if (count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad => $valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
    }

    public function actualizar_nomina($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        
        $this->query = "
			UPDATE nomina
			SET FechaNomina = '$FechaNomina',
            TotalNomina = '$TotalNomina'
			WHERE IdNomina = '$IdNomina'
			";

        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function borrar()
    {

    }

    public function editar()
    {

    }

}