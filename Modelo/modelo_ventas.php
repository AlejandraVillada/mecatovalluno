<?php
require_once "modeloAbstractoDB.php";
require_once "modelo_empleados.php";

class modelo_ventas extends ModeloAbstractoDB
{
    private $IdProducto;
    private $NombreProducto;
    private $CantidadProductoTerminado;
    private $DiaProduccion;
    private $IdSede;
    private $IdEmpleado;
    private $IdCiudad;
    private $IdCliente;
    private $Vendido;
    private $subtotal;
    private $total;
    private $comision;
    private $disponible;

    public function __construct()
    {

    }

    public function consultarprod($IdProducto, $IdSede)
    {
        $this->query = "SELECT vv.*,prod.ValorUnitario FROM vista_ventas vv
        INNER JOIN  producto prod  ON(vv.IdProducto=prod.IdProducto)
        where vv.IdProducto=$IdProducto AND vv.IdSede=$IdSede";
        $this->obtener_resultados_query();
        return $this->rows;
    }

    public function nuevo($datos = array(), $productos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        // $empleados= new modelo_empleados();
        // $empleados->consultar($IdEmpleado);
        // $sueldobase=$empleados->getSueldoBase();
        $comision = $total * 0.05;
        // var_dump($comision);
        $datos1 = $this->secuencia();
        $now = new DateTime;
        // $now2 = Date('Y-m-d',$now);
        $fechafact =  date('Y-m-d');;
        $IdFactura = $datos1[0]['secuencia'];
// var_dump($IdFactura);
        if ($IdFactura == 0) {
            $IdFactura = 1;
        }else{
            $IdFactura=$IdFactura+1;
        }
        $this->query = "INSERT INTO factura
        VALUES($IdFactura,now(),$subtotal,$total,$IdEmpleado,$comision,$IdCliente,$IdSede)";
        $this->ejecutar_query_simple();

        $cant = count($productos);

        for ($i = 0; $i < $cant; $i++) {
            
            $producto= $productos[$i]['IdProducto'];
            $cantidad=$productos[$i]['CantidadVendida'];
            $iddet=$i+1;
            $this->query = "INSERT INTO detalle_factura 
            VALUES($iddet,$IdFactura,$producto,$cantidad)";
             $this->ejecutar_query_simple();

        }


    }
    public function consultar()
    {

    }
    public function editar()
    {

    }

    public function borrar()
    {

    }
    public function secuencia()
    {
        $this->query = "SELECT max(IdFactura) as secuencia FROM factura";
        $this->obtener_resultados_query();
        return $this->rows;
    }
    public function listarhistoria()
    {
        $this->query = "SELECT * FROM vista_historial_ventas";
        $this->obtener_resultados_query();
        return $this->rows;
    }
    public function lista()
    {
        $this->query = "SELECT * FROM vista_ventas";
        $this->obtener_resultados_query();
        return $this->rows;
    }
    public function listaprod($IdSede)
    {
        $this->query = "SELECT * FROM vista_ventas where IdSede=$IdSede";
        $this->obtener_resultados_query();
        return $this->rows;
    }

    public function listaprodVista()
    {
        $this->query = "
        SELECT v.IdProducto,v.NombreProducto,v.CantidadProductoTerminado,v.DiaProduccion,v.IdSede,v.NombreSede,v.IdCiudad,v.vendido,v.disponible,p.Foto,p.ValorUnitario FROM vista_ventas AS v
        INNER JOIN producto AS p
        ON(v.IdProducto = p.IdProducto)
        ";
        $this->obtener_resultados_query();
        // var_dump($this->rows);
        return $this->rows;
    }
}
