<?php

require_once "modeloAbstractoDB.php";

class modelo_detProveedor extends ModeloAbstractoDB
{

    private $IdDetalleProveedor;
    private $IdProveedor;
    private $IdMateriaPrima;
    private $NombreProveedor;
    private $NombreMateriaPrima;

    public function __construct()
    {

    }

    public function getIdDetalleProveedor()
    {
        return $this->IdDetalleProveedor;
    }

    public function getIdProveedor()
    {
        return $this->IdProveedor;
    }

    public function getIdMateriaPrima()
    {
        return $this->IdMateriaPrima;
    }

    public function getNombreProveedor()
    {
        return $this->NombreProveedor;
    }

    public function getNombreMateriaPrima()
    {
        return $this->NombreMateriaPrima;
    }

    //Metodos

    public function proveedores()
    {
        $this->query = "
			SELECT IdProveedor, NombreProveedor, IdEstado
			FROM proveedor
			";
        $this->obtener_resultados_query();
        return $this->rows;
    }

    public function productos()
    {
        $this->query = "
			SELECT IdMateriaPrima, NombreMateriaPrima, Stock, IdMedida
			FROM materiaprima
			";
        $this->obtener_resultados_query();
        return $this->rows;
    }

    public function lista()
    {
        $this->query = "
			SELECT IdDetalleProveedor, p.IdProveedor, p.NombreProveedor, m.IdMateriaPrima, m.NombreMateriaPrima
			FROM detalle_proveedor AS d
            INNER JOIN proveedor AS p
            ON (d.IdProveedor = p.IdProveedor)
            INNER JOIN materiaprima AS m
            ON (d.IdMateriaPrima = m.IdMateriaPrima)
            ORDER BY IdDetalleProveedor
			";
        $this->obtener_resultados_query();
        return $this->rows;
    }

    public function consultar($IdDetalleProveedor = '', $IdProveedor = '')
    {
        // var_dump($IdProveedor);
        if ($IdDetalleProveedor != ''):
            $this->query = "
					SELECT IdDetalleProveedor, IdProveedor, IdMateriaPrima
					FROM detalle_proveedor
					WHERE IdDetalleProveedor = '$IdDetalleProveedor' AND IdProveedor = '$IdProveedor' ORDER BY IdDetalleProveedor
					";
            $this->obtener_resultados_query();
        endif;
        // var_dump($this->rows);
        if (count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad => $valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
        // var_dump($this->rows);
    }

    // Consulta table de detalle proveedor

    public function consultar_proveedor($IdProveedor = '')
    {
        // var_dump($IdProveedor);
        if ($IdProveedor != ''):
            $this->query = "
					SELECT d.IdDetalleProveedor, d.IdProveedor, p.NombreProveedor, m.NombreMateriaPrima
					FROM detalle_proveedor AS d
	                INNER JOIN proveedor AS p
					ON (d.IdProveedor = p.IdProveedor)
	                INNER JOIN materiaprima AS m
					ON (d.IdMateriaPrima = m.IdMateriaPrima)
					WHERE d.IdProveedor = '$IdProveedor' ORDER BY d.IdDetalleProveedor
					";
            $this->obtener_resultados_query();
            return $this->rows;
        endif;
        // var_dump($this->rows);
        // if(count($this->rows) == 1):

        //     foreach ($this->rows[0] as $propiedad=>$valor):
        //         $this->$propiedad = $valor;
        //     endforeach;
        // endif;
        // var_dump($this->rows);
    }

    public function nuevo($datos = array())
    {
        if (array_key_exists('IdDetalleProveedor', $datos)):
            foreach ($datos as $campo => $valor):
                $$campo = $valor;
            endforeach;
            $this->query = "
						INSERT INTO detalle_proveedor
						(IdDetalleProveedor, IdProveedor, IdMateriaPrima)
						VALUES
						('$IdDetalleProveedor', '$IdProveedor', '$IdMateriaPrima')
						";
            $resultado = $this->ejecutar_query_simple();
            return $resultado;
        endif;
    }

    public function editar($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
			UPDATE detalle_proveedor
			SET IdProveedor = '$IdProveedor',
			IdMateriaPrima = '$IdMateriaPrima'
			WHERE IdDetalleProveedor = '$IdDetalleProveedor'
			";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function borrar()
    {

    }

}
