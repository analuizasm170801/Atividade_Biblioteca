<?php 
namespace service;

use dao\UsuariosDAO;

class UsuariosService extends UsuariosDAO{

    public function verificaLogin(String $email, String $senha){

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $usuario=parent::verificaUsuario($email,$senha);
            if($usuario!=null){
                session_start();
                $_SESSION['usuario']=$usuario;
                return true;
            }

        }
        return false;
        
        
    }
    public  function buscarUsuario(String $email){
        return parent::buscarUsuario($email);
    }
}

?>