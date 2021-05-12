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