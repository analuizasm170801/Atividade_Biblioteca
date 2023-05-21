<?php

use service\UsuariosService;

include_once "../generic/Autoload.php";

$email=$_POST['email'];
$senha=$_POST['senha'];

$usuarioServ = new UsuariosService();
$usu=$usuarioServ->verificaLogin($email,$senha);
if($usu){
    header('Location: ../public/dashboard.php');
    die;
}

header('Location: ../public/login.php?erro=1');
?>