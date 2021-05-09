<?php
include_once "modeloAbstractoDB.php";

class modelo_usuario extends ModeloAbstractoDB
{
    private $IdUsuario;
    private $Usuario;
    private $IdTipoUsuario;
    private $Contrasena;

    public function __construct()
    {

    }
    public function lista()
    {
        $this->query = "
		SELECT IdUsuario,Usuario,t.TipoUsuario,Contrasena
		FROM usuarios AS u INNER JOIN tipo_usuario AS t
        ON(u.IdTipoUsuario = t.IdTipoUsuario)
        ORDER BY IdUsuario";
        $this->obtener_resultados_query();
        return $this->rows;
    }

    public function consultar($datos = array())
    {
        $usuario = $datos['usuario'];
        //    $password = $datos['password'];
        $this->query = "SELECT * FROM usuarios 	WHERE Usuario = '$usuario'	";

        $this->obtener_resultados_query();
        // var_dump($this->rows);
        if (count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad => $valor):
                $this->$propiedad = $valor;
                //  echo $propiedad;
            endforeach;
        endif;
    return $this->rows[0];
    }

    public function consultarUsu($id = '')
    {
        if ($id != ''):
            $this->query = "
			    SELECT IdUsuario,Usuario,IdTipoUsuario,Contrasena
			    FROM usuarios
	            WHERE IdUsuario = '$id'";
            $this->obtener_resultados_query();
        endif;
        if (count($this->rows) == 1):
            foreach ($this->rows[0] as $propiedad => $valor):
                $this->$propiedad = $valor;
            endforeach;
        endif;
    }

    public function nuevo($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        INSERT INTO usuarios
        (IdUsuario,Usuario,IdTipoUsuario,Contrasena)
        VALUES
        ('$IdUsuario', '$Usuario','$IdTipoUsuario','$Contrasena')
        ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function editar($datos = array())
    {
        foreach ($datos as $campo => $valor):
            $$campo = $valor;
        endforeach;
        $this->query = "
        UPDATE usuarios
        SET IdUsuario='$IdUsuario',
        Usuario='$Usuario',
        IdTipoUsuario='$IdTipoUsuario',
        Contrasena='$Contrasena'
        WHERE IdUsuario = '$IdUsuario'
        ";
        $resultado = $this->ejecutar_query_simple();
        return $resultado;
    }

    public function borrar()
    {

    }

    /**
     * Get the value of IdUsuario
     */
    public function getIdUsuario()
    {
        return $this->IdUsuario;
    }

    /**
     * Set the value of IdUsuario
     *
     * @return  self
     */
    public function setIdUsuario($IdUsuario)
    {
        $this->IdUsuario = $IdUsuario;

        return $this;
    }

    /**
     * Get the value of Usuario
     */
    public function getUsuario()
    {
        return $this->Usuario;
    }

    /**
     * Set the value of Usuario
     *
     * @return  self
     */
    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    /**
     * Get the value of IdTipoUsuario
     */
    public function getIdTipoUsuario()
    {
        return $this->IdTipoUsuario;
    }

    /**
     * Set the value of IdTipoUsuario
     *
     * @return  self
     */
    public function setIdTipoUsuario($IdTipoUsuario)
    {
        $this->IdTipoUsuario = $IdTipoUsuario;

        return $this;
    }

    /**
     * Get the value of Contrasena
     */
    public function getContrasena()
    {
        return $this->Contrasena;
    }

    /**
     * Set the value of Contrasena
     *
     * @return  self
     */
    public function setContrasena($Contrasena)
    {
        $this->Contrasena = $Contrasena;

        return $this;
    }
}
