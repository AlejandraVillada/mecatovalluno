<?php
require_once "modeloAbstractoDB.php";

class modelo_sede extends ModeloAbstractoDB
{
    private $IdSede;
    private $IdCiudad;
    private $NombreSede;
    private $IdEstado;

    public function __construct()
    {

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

    public function lista()
    {
        $this->query = "
		SELECT IdSede,NombreSede,c.NombreCiudad,e.Estado
		FROM sede AS s INNER JOIN ciudad AS c
        ON(s.IdCiudad = c.IdCiudad)
        INNER JOIN estados AS e
        ON(s.IdEstado= e.IdEstado)";
        $this->obtener_resultados_query();
        return $this->rows;

    }

    public function consultar($id = '')
    {
        if ($id != ''):
            $this->query = "
	                        SELECT IdSede,IdCiudad,NombreSede,IdEstado
	                        FROM sede
	                        WHERE IdSede = '$id'";
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
                    INSERT INTO sede
                    (IdCiudad, NombreSede,IdEstado)
                    VALUES ('$IdCiudad','$NombreSede','$IdEstado')";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function editar($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
                UPDATE sede
                SET IdCiudad='$IdCiudad',
                NombreSede='$NombreSede',
                IdEstado='$IdEstado'
                WHERE IdSede = '$IdSede'";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function borrar()
    {

    }


    /**
     * Get the value of IdEstado
     */ 
    public function getIdEstado()
    {
        return $this->IdEstado;
    }
}
