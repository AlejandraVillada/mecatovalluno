<?php
    function usuarioAutenticado(){
        if(!verificarUsuario()){ 
            header("location:login.php");
            exit();
            echo "entra";
        }
    }
    function verificarUsuario(){
        return isset($_SESSION["usuario"]);
        echo "verificardo usuario";
    }
    session_start();
    usuarioAutenticado();

?>