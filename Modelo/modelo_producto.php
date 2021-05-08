<?php
include_once __DIR__ . "/modeloAbstractoDB.php";

class modelo_producto extends ModeloAbstractoDB
{
    private $IdProducto;
    private $NombreProducto;
    private $CantidadProducto;

    public function __construct()
    {

    }

    public function lista()
    {
        $this->query = "SELECT p.* FROM producto p ORDER BY NombreProducto";
        $this->obtener_resultados_query();
        return $this->rows;
    }
    public function consultarprod($id = '')
    {
        if ($id != ''):
            $this->query = "SELECT p.* FROM producto p WHERE p.IdProducto='$id'";
            $this->obtener_resultados_query();
        endif;
        return $this->rows;
    }

    public function consultar($id = '')
    {
        if ($id != ''):
            $this->query = "SELECT dp.Cantidad,dp.DescripcionProducto,
	            dp.IdDetalleProducto,m.NombreMedida,mp.NombreMateriaPrima
	            FROM detalle_producto dp
	            INNER JOIN Medidas m ON(dp.IdMedida=m.idMedida)
	            INNER JOIN materiaprima mp ON(dp.IdMateriaPrima=mp.IdMateriaPrima)
	            INNER JOIN producto p ON(dp.IdProducto=p.IdProducto)
	            WHERE dp.IdProducto='$id'";
            $this->obtener_resultados_query();
            //var_dump ($this->rows);
        endif;

        return $this->rows;

    }

    public function actualizar($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "UPDATE producto SET NombreProducto='$NombreProducto', CantidadProducto='$CantidadProducto'
                WHERE IdProducto = '$IdProducto'
                ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;

    }

    public function nuevo($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "INSERT INTO producto SET NombreProducto='$NombreProducto', CantidadProducto='$CantidadProducto'

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
    public function getIdProducto()
    {
        return $this->IdProducto;
    }

    public function setIdProducto($IdProducto)
    {
        $this->IdProducto = $IdProducto;
    }

    public function getNombreProducto()
    {
        return $this->NombreProducto;
    }

    public function setNombreProducto($NombreProducto)
    {
        $this->NombreProducto = $NombreProducto;
    }

    /**
     * Get the value of CantidadProducto
     */
    public function getCantidadProducto()
    {
        return $this->CantidadProducto;
    }

    /**
     * Set the value of CantidadProducto
     *
     * @return  self
     */
    public function setCantidadProducto($CantidadProducto)
    {
        $this->CantidadProducto = $CantidadProducto;

        return $this;
    }
}
