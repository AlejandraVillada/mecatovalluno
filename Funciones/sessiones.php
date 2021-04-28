<?php
    function usuarioAutenticado(){
        if(!verificarUsuario()){ 
            header("location:login.php");
            exit();
           
        }
    }
    function verificarUsuario(){
        return isset($_SESSION["Usuario"]);
    }
    session_start();
    usuarioAutenticado();

?>