<?php

require_once "modeloAbstractoDB.php";

class modelo_ciudad extends ModeloAbstractoDB
{
    private $IdCiudad;
    private $IdPais;
    private $NombreCiudad;

    public function __construct()
    {

    }
    public function consultar($id = '')
    {
        if ($id != ''):
            $this->query = "
			    SELECT IdCiudad,IdPais,NombreCiudad
			    FROM ciudad
	            WHERE IdCiudad = '$id'";
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
        INSERT INTO ciudad
        (IdPais, NombreCiudad)
        VALUES ('$IdPais','$NombreCiudad')";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }
    public function editar($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        UPDATE ciudad
        SET IdPais='$IdPais',
        NombreCiudad='$NombreCiudad'
        WHERE IdCiudad = '$IdCiudad'";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function borrar()
    {

    }

    public function lista()
    {
        $this->query = "
		SELECT IdCiudad,NombreCiudad,p.NombrePais
		FROM ciudad AS c INNER JOIN pais AS p
        ON(c.IdPais = p.IdPais)";
        $this->obtener_resultados_query();
        return $this->rows;

    }

    /**
     * Get the value of idCiudad
     */
    public function getIdCiudad()
    {
        return $this->IdCiudad;
    }

    /**
     * Set the value of idCiudad
     *
     * @return  self
     */
    public function setIdCiudad($IdCiudad)
    {
        $this->IdCiudad = $IdCiudad;

        return $this;
    }

    /**
     * Get the value of idPais
     */
    public function getIdPais()
    {
        return $this->IdPais;
    }

    /**
     * Set the value of idPais
     *
     * @return  self
     */
    public function setIdPais($IdPais)
    {
        $this->IdPais = $IdPais;

        return $this;
    }

    /**
     * Get the value of Nombre_Ciudad
     */
    public function getNombreCiudad()
    {
        return $this->NombreCiudad;
    }

    /**
     * Set the value of Nombre_Ciudad
     *
     * @return  self
     */
    public function setNombre_Ciudad($NombreCiudad)
    {
        $this->NombreCiudad = $NombreCiudad;

        return $this;
    }
}
