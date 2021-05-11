<?php

require_once "modeloAbstractoDB.php";

class clientes extends ModeloAbstractoDB{

    private  $IdCliente;
    private  $NombreCliente;
    private  $Email;
    private  $Direccion;
    private  $Telefono;
    private  $IdEstado;
    private  $IdCiudad;

    function __construct(){

    }
    public function consultar($id='')
    {
        if($id != ''):
            $this->query = "
		    SELECT IdCliente,NombreCliente,Email,Direccion,Telefono,IdEstado,IdCiudad
		    FROM clientes
            WHERE IdCliente = '$id'";
            $this->obtener_resultados_query();
        endif;
        if(count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad=>$valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;

    }

    public function nuevo($datos=array())
    {
        foreach ($datos as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        INSERT INTO clientes
        (IdCliente,NombreCliente,Email,Direccion,Telefono,IdEstado,IdCiudad)
        VALUES
        ('$IdCliente', '$NombreCliente','$Email','$Direccion','$Telefono','$IdEstado','$IdCiudad')
        ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }
    public function editar($datos=array())
    {
        foreach ($datos as $campo=>$valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        UPDATE clientes
        SET NombreCliente='$NombreCliente',
        Email='$Email',
        Direccion='$Direccion',
        Telefono='$Telefono',
        IdEstado='$IdEstado',
        IdCiudad='$IdCiudad'
        WHERE IdCliente = '$IdCliente'
        ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function borrar()
    {

    }

    public function lista()
    {
        $this->query = "
		SELECT IdCliente,NombreCliente,Email,Direccion,Telefono,e.Estado,c.NombreCiudad
		FROM clientes AS cl INNER JOIN estados AS e
        ON(cl.IdEstado = e.IdEstado)
        INNER JOIN ciudad AS c
        ON(cl.IdCiudad = c.IdCiudad)
        ORDER BY IdCliente";
		$this->obtener_resultados_query();
		return $this->rows;

    }

    public function lista_estados(){
        $this->query = "
		SELECT IdEstado,Estado
		FROM estados";
		$this->obtener_resultados_query();
		return $this->rows;
    }

    public function lista_ciudad(){
        $this->query = "
		SELECT IdPais,IdCiudad,NombreCiudad
		FROM ciudad";
		$this->obtener_resultados_query();
		return $this->rows;
    }

    /**
     * Get the value of IdCliente
     */ 
    public function getIdCliente()
    {
        return $this->IdCliente;
    }

    /**
     * Set the value of IdCliente
     *
     * @return  self
     */ 
    public function setIdCliente($IdCliente)
    {
        $this->IdCliente = $IdCliente;

        return $this;
    }

    /**
     * Get the value of NombreCliente
     */ 
    public function getNombreCliente()
    {
        return $this->NombreCliente;
    }

    /**
     * Set the value of NombreCliente
     *
     * @return  self
     */ 
    public function setNombreCliente($NombreCliente)
    {
        $this->NombreCliente = $NombreCliente;

        return $this;
    }

    /**
     * Get the value of Email
     */ 
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */ 
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of Direccion
     */ 
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * Set the value of Direccion
     *
     * @return  self
     */ 
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;

        return $this;
    }

    /**
     * Get the value of Telefono
     */ 
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * Set the value of Telefono
     *
     * @return  self
     */ 
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    /**
     * Get the value of IdEstado
     */ 
    public function getIdEstado()
    {
        return $this->IdEstado;
    }

    /**
     * Set the value of IdEstado
     *
     * @return  self
     */ 
    public function setIdEstado($IdEstado)
    {
        $this->IdEstado = $IdEstado;

        return $this;
    }

    /**
     * Get the value of IdCiudad
     */ 
    public function getIdCiudad()
    {
        return $this->IdCiudad;
    }

    /**
     * Set the value of IdCiudad
     *
     * @return  self
     */ 
    public function setIdCiudad($IdCiudad)
    {
        $this->IdCiudad = $IdCiudad;

        return $this;
    }
}

?>