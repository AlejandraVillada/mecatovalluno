<?php
require_once "modeloAbstractoDB.php";

class modelo_tipo_usuario extends ModeloAbstractoDB
{
    private $IdTipoUsuario;
    private $TipoUsuario;

    public function __construct()
    {

    }

    public function getIdTipoUsuario()
    {
        return $this->IdTipoUsuario;
    }

    public function setIdTipoUsuario($IdTipoUsuario)
    {
        $this->IdTipoUsuario = $IdTipoUsuario;
    }

    public function getTipoUsuario()
    {
        return $this->TipoUsuario;
    }

    public function setTipoUsuario($TipoUsuario)
    {
        $this->TipoUsuario = $TipoUsuario;
    }

    public function lista()
    {

        $this->query = "
                SELECT IdTipoUsuario,TipoUsuario
                FROM tipo_usuario";
        $this->obtener_resultados_query();
        return $this->rows;

    }

    public function consultar($id='')
    {
        if ($id != ''):
            $this->query = "
                    SELECT IdTipoUsuario,TipoUsuario
                    FROM tipo_usuario
	                WHERE IdTipoUsuario = '$id'
	                ";
            $this->obtener_resultados_query();
        endif;
        if (count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad => $valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
    }

    public function nuevo()
    {

    }

    public function editar()
    {

    }

    public function borrar()
    {

    }

}
