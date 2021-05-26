<?php
require_once "modeloAbstractoDB.php";

class modelo_ventas extends ModeloAbstractoDB
{
    private $IdProducto;
    private $NombreProducto;
    private $CantidadProductoTerminado;
    private $DiaProduccion;
    private $IdSede;
    private $IdCiudad;
    private $Vendido;
    private $disponible;

    public function __construct()
    {

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

    public function lista()
    {
        $this->query="SELECT * FROM vista_ventas";
        $this->obtener_resultados_query();
        return $this->rows;
    }
}