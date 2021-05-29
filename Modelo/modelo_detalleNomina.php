<?php

    require_once "modeloAbstractoDB.php";

class detalle_nomina extends ModeloAbstractoDB
{
    private $IdDetalleNomina;
    private $IdNomina;
    private $IdEmpleado;
    private $Comisiones;
    private $SueldoBase;
    private $TotalSueldo;

    public function __construct()
    {

    }

    public function consultar($IdNomina = '')
    {
        if ($IdNomina != ''):
            $this->query = "
					SELECT d.IdDetalleNomina, d.IdNomina, d.IdEmpleado, e.NombreEmpleado, e.IdSede, s.NombreSede, d.Comisiones, e.SueldoBase,
                    d.TotalSueldo
					FROM detalle_nomina AS d
	                INNER JOIN empleados AS e
					ON (d.IdEmpleado = e.IdEmpleado)
                    INNER JOIN sede AS s
					ON (e.IdSede = s.IdSede)
					WHERE d.IdNomina = '$IdNomina' ORDER BY d.IdDetalleNomina
					";
            $this->obtener_resultados_query();
            return $this->rows;
        endif;
    }

    public function nuevo($datos = array())    {
        foreach ($datos as $key => $detalle) {
            // var_dump($detalle['IdDetalleNomina']);
            

                $IdDetalleNomina = $detalle['IdDetalleNomina'];
                $IdNomina = $detalle['IdNomina'];
                $IdEmpleado = $detalle['IdEmpleado'];
                $SueldoBase = $detalle['SueldoBase'];
                $Comisiones=$detalle['Comisiones'];
                $TotalSueldo = $detalle['TotalSueldo'];
                

                $this->query = "
                            INSERT INTO detalle_nomina
                            (IdDetalleNomina, IdNomina, IdEmpleado, Comisiones, SueldoBase, TotalSueldo)
                            VALUES
                            ('$IdDetalleNomina', '$IdNomina', '$IdEmpleado', '$Comisiones', '$SueldoBase', '$TotalSueldo')
                            ";
                $resultado = $this->ejecutar_query_simple();
                // return $resultado;
                
            
        }        
    }

    public function consultarComisiones($id='',$fechaInicioMes='',$fechaFinal=''){
       
            $this->query = "
				SELECT SUM(comision) AS Comisiones
				FROM factura
				WHERE IdEmpleado = '$id' AND FechaFactura BETWEEN '$fechaInicioMes' AND '$fechaFinal'
				";
            $this->obtener_resultados_query();
  
       return $this->rows;

    }

    public function editar()
    {

    }

    public function borrar()
    {

    }

    public function lista()
    {

    }

    public function listaEmpleados()
    {
        $this->query = "
			SELECT IdEmpleado, NombreEmpleado, SueldoBase, s.NombreSede
			FROM empleados AS e
            INNER JOIN sede AS s
			ON (e.IdSede = s.IdSede)
            ORDER BY IdEmpleado
			";

        $this->obtener_resultados_query();

        // if (count($this->rows) == 1):
        //     foreach ($this->rows[0] as $propiedad => $valor):
        //         $this->$propiedad = $valor;
        //     endforeach;
        // endif;

        return $this->rows;
    }

    public function consultarIdNomina($fecha)
    {
        if ($fecha != ''):
            $this->query = "
				SELECT IdNomina
				FROM nomina
				WHERE FechaNomina = '$fecha'
				";
            $this->obtener_resultados_query();
        endif;

        // var_dump($this->rows[0]);

        if (count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad => $valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
    }

    public function getIdDetalleNomina()
    {
        return $this->IdDetalleNomina;
    }

    public function getIdNomina()
    {
        return $this->IdNomina;
    }

    public function getIdEmpleado()
    {
        return $this->IdEmpleado;
    }

    public function getComisiones()
    {
        return $this->Comisiones;
    }

    public function getSueldoBase()
    {
        return $this->SueldoBase;
    }

    public function getTotalSueldo()
    {
        return $this->TotalSueldo;
    }

}