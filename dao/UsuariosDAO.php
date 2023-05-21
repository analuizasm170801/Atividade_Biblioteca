<?php
namespace dao;
//include_once "../generic/Autoload.php";
use bean\Usuarios;
use generic\ConnectionFactory;

class UsuariosDAO extends ConnectionFactory{

    protected function verificaUsuario(String $email, String $senha){
        $this->conectar();
        $sql="select usuario,nome,email from usuarios where email=:email and senha=:senha";
        $param = array(
            ":email" =>$email,
            ":senha" =>$senha
        );
        $resultado  = $this->conn->executar($sql,$param);
        if(sizeof($resultado)>0){
            $usu = new Usuarios();
           
            $usu->nome=$resultado[0]['nome'];
            $usu->usuario=$resultado[0]['usuario'];
            $usu->email = $resultado[0]['email'];
            return $usu;
        }
       
        
        return null;
    }

    protected function buscarUsuario(String $email){
        $this->conectar();
        $sql="select usuario,nome,email from usuarios where email=:email ";
        $param = array(
            ":email" =>$email,
          
        );
        $resultado  = $this->conn->executar($sql,$param);
        if(sizeof($resultado)>0){
            $usu = new Usuarios();
           
            $usu->nome=$resultado[0]['nome'];
            $usu->usuario=$resultado[0]['usuario'];
            $usu->email = $resultado[0]['email'];
            return $usu;
        }
       
        
        return null;
    }
}
?>