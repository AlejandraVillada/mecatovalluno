<?php
require_once "modeloAbstractoDB.php";

class modelo_pais extends ModeloAbstractoDB
{
    private $IdPais;
    private $NombrePais;
    private $IdEstado;

    public function __construct()
    {

    }

    public function getIdPais()
    {
        return $this->IdPais;
    }

    public function setIdPais($IdPais)
    {
        $this->IdPais = $IdPais;

        return $this;
    }

    public function getNombrePais()
    {
        return $this->NombrePais;
    }

    public function setNombrePais($NombrePais)
    {
        $this->NombrePais = $NombrePais;

        return $this;
    }

    public function getIdEstado()
    {
        return $this->IdEstado;
    }

    public function lista()
    {
        $this->query = "
		SELECT IdPais, NombrePais, e.Estado
            FROM pais AS p
            INNER JOIN estados AS e
            ON (p.IdEstado = e.IdEstado)
        ";
        $this->obtener_resultados_query();
        return $this->rows;
    }

    public function consultar($id = '')
    {
        if ($id != ''):
            $this->query = "
			    SELECT IdPais,NombrePais,IdEstado
			    FROM pais
	            WHERE IdPais = '$id'";
            $this->obtener_resultados_query();
        endif;
        if (count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad => $valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
    }

    public function nuevo($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        INSERT INTO pais
        (NombrePais,IdEstado)
        VALUES ('$NombrePais','$IdEstado')";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function editar($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        UPDATE pais
        SET NombrePais='$NombrePais',
        IdEstado='$IdEstado'
        WHERE IdPais = '$IdPais'";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function estado()
    {
        $this->query = "
			SELECT IdEstado, Estado
			FROM estados
			";
        $this->obtener_resultados_query();
        return $this->rows;
    }

    public function borrar()
    {

    }


  
}
