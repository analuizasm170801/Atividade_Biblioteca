<?php
namespace dao;
//include_once "../generic/Autoload.php";
use bean\Employees;
use generic\ConnectionFactory;

class EmployeesDAO extends ConnectionFactory{

    protected function verificaEmployee(String $email, String $password){
        $this->conectar();
        $sql="select name,email from employees where email=:email and password=:password";
        $param = array(
            ":email" =>$email,
            ":password" =>$password
        );
        $resultado  = $this->conn->executar($sql,$param);
        if(sizeof($resultado)>0){
            $employee = new Employees();
           
            $employee->name=$resultado[0]['name'];
            $employee->email = $resultado[0]['email'];
            return $employee;
        }
       
        
        return null;
    }

    protected function buscarEmployee(String $email){
        $this->conectar();
        $sql="select name,email from employees where email=:email ";
        $param = array(
            ":email" =>$email,
          
        );
        $resultado  = $this->conn->executar($sql,$param);
        if(sizeof($resultado)>0){
            $employee = new Employee();
           
            $employee->name=$resultado[0]['name'];
            $employee->email = $resultado[0]['email'];
            return $employee;
        }
       
        
        return null;
    }
}
?>