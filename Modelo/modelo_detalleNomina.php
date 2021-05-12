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

    /**
     * Get the value of IdDetalleNomina
     */
    public function getIdDetalleNomina()
    {
        return $this->IdDetalleNomina;
    }

    /**
     * Set the value of IdDetalleNomina
     *
     * @return  self
     */
    public function setIdDetalleNomina($IdDetalleNomina)
    {
        $this->IdDetalleNomina = $IdDetalleNomina;

        return $this;
    }

    /**
     * Get the value of IdNomina
     */
    public function getIdNomina()
    {
        return $this->IdNomina;
    }

    /**
     * Set the value of IdNomina
     *
     * @return  self
     */
    public function setIdNomina($IdNomina)
    {
        $this->IdNomina = $IdNomina;

        return $this;
    }

    /**
     * Get the value of IdEmpleado
     */
    public function getIdEmpleado()
    {
        return $this->IdEmpleado;
    }

    /**
     * Set the value of IdEmpleado
     *
     * @return  self
     */
    public function setIdEmpleado($IdEmpleado)
    {
        $this->IdEmpleado = $IdEmpleado;

        return $this;
    }

    /**
     * Get the value of Comisiones
     */
    public function getComisiones()
    {
        return $this->Comisiones;
    }

    /**
     * Set the value of Comisiones
     *
     * @return  self
     */
    public function setComisiones($Comisiones)
    {
        $this->Comisiones = $Comisiones;

        return $this;
    }

    /**
     * Get the value of SueldoBase
     */
    public function getSueldoBase()
    {
        return $this->SueldoBase;
    }

    /**
     * Set the value of SueldoBase
     *
     * @return  self
     */
    public function setSueldoBase($SueldoBase)
    {
        $this->SueldoBase = $SueldoBase;

        return $this;
    }

    /**
     * Get the value of TotalSueldo
     */
    public function getTotalSueldo()
    {
        return $this->TotalSueldo;
    }

    /**
     * Set the value of TotalSueldo
     *
     * @return  self
     */
    public function setTotalSueldo($TotalSueldo)
    {
        $this->TotalSueldo = $TotalSueldo;

        return $this;
    }
}
