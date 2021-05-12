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

    public function consultar()
    {

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
