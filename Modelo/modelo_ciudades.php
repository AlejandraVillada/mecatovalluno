<?php

include_once __DIR__ . "/modeloAbstractoDB.php";

class ciudad extends ModeloAbstractoDB
{
    private $idCiudad;
    private $idPais;
    private $Nombre_Ciudad;

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
     * Get the value of idCiudad
     */
    public function getIdCiudad()
    {
        return $this->idCiudad;
    }

    /**
     * Set the value of idCiudad
     *
     * @return  self
     */
    public function setIdCiudad($idCiudad)
    {
        $this->idCiudad = $idCiudad;

        return $this;
    }

    /**
     * Get the value of idPais
     */
    public function getIdPais()
    {
        return $this->idPais;
    }

    /**
     * Set the value of idPais
     *
     * @return  self
     */
    public function setIdPais($idPais)
    {
        $this->idPais = $idPais;

        return $this;
    }

    /**
     * Get the value of Nombre_Ciudad
     */
    public function getNombre_Ciudad()
    {
        return $this->Nombre_Ciudad;
    }

    /**
     * Set the value of Nombre_Ciudad
     *
     * @return  self
     */
    public function setNombre_Ciudad($Nombre_Ciudad)
    {
        $this->Nombre_Ciudad = $Nombre_Ciudad;

        return $this;
    }
}
