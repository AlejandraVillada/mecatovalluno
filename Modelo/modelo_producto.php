<?php
require_once "modeloAbstractoDB.php";

class modelo_producto extends ModeloAbstractoDB
{
    private $IdProducto;
    private $NombreProducto;
    private $CantidadProducto;
    private $ValorUnitario;
    private $Foto;

    public function __construct()
    {

    }

    public function lista()
    {
        $this->query = "SELECT p.* FROM producto p ORDER BY NombreProducto";
        $this->obtener_resultados_query();
        $completo=array();
        foreach ($this->rows as $key => $value) {
            foreach ($value as $key1 => $value1) {
                // var_dump($key1."------".$value1);
                if ($key1 == "Foto") {
                    //  header("Content-type: image/png"); 
                   
                    $contenido[$key1] = " <img src='data:image/png; base64,".($value1)."' class='menu-img'>";
                    
                } else {
                    $contenido[$key1] = $value1;

                }
            }
            $completo[]=$contenido;
        }
        return $completo ;
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
			            dp.IdDetalleProducto,m.NombreMedida,mp.NombreMateriaPrima,mp.IdMateriaPrima
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
        $foto=base64_encode($Foto);
       
        $this->query = "UPDATE producto SET NombreProducto='$NombreProducto', CantidadProducto='$CantidadProducto',ValorUnitario='$ValorUnitario',Foto='$foto'
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
        $foto=base64_encode($Foto);
       
        $this->query = "INSERT INTO producto values('',
        '$NombreProducto','$CantidadProducto','$ValorUnitario','$Foto')";
        $this->query="INSERT INTO producto
        ( NombreProducto, CantidadProducto, ValorUnitario, Foto) 
        VALUES ('$NombreProducto',$CantidadProducto,$ValorUnitario,'$foto')";
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

    /**
     * Get the value of ValorUnitario
     */
    public function getValorUnitario()
    {
        return $this->ValorUnitario;
    }

    /**
     * Set the value of ValorUnitario
     *
     * @return  self
     */
    public function setValorUnitario($ValorUnitario)
    {
        $this->ValorUnitario = $ValorUnitario;

        return $this;
    }

    /**
     * Get the value of Foto
     */
    public function getFoto()
    {
        return $this->Foto;
    }

    /**
     * Set the value of Foto
     *
     * @return  self
     */
    public function setFoto($Foto)
    {
        $this->Foto = $Foto;

        return $this;
    }
}
