<?php
namespace generic;
class Seguranca{
    public static function verificaConexao(){
        session_start();
        if(!isset($_SESSION['usuario'])){
            header("Location: login.php");
            die;
        }
    }
}

?>