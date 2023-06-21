<?php

use service\EmployeesService;

include_once "../generic/Autoload.php";

$email=$_POST['email'];
$password=$_POST['password'];
$usuarioServ = new EmployeesService();
$employee=$usuarioServ->verificaLogin($email,$password);
if($employee){
    header('Location: ../public/index.php');
    die;
}

header('Location: ../public/login.php?erro=1');
?>