<?php

    require_once "modeloAbstractoDB.php";

class modelo_nomina extends ModeloAbstractoDB
{
    private $IdNomina;
    private $FechaNomina;
    private $TotalNomina;

    public function __construct()
    {

    }

    public function getIdNomina()
    {
        return $this->IdNomina;
    }

    public function getFechaNomina()
    {
        return $this->FechaNomina;
    }

    public function getTotalNomina()
    {
        return $this->TotalNomina;
    }

    public function lista()
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

}