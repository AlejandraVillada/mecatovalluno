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

    public function lista()
    {
        $this->query = "
        SELECT IdNomina, FechaNomina, TotalNomina
		FROM nomina
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

    public function editar()
    {

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
        var_dump($resultado);
        return $resultado;
    }

    public function borrar()
    {

    }

}