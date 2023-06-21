<?php 
namespace service;

use dao\EmployeesDAO;

class EmployeesService extends EmployeesDAO{

    public function verificaLogin(String $email, String $password){

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $employee=parent::verificaEmployee($email,$password);
            if($employee!=null){
                session_start();
                $_SESSION['name']=$employee;
                
                return true;
            }

        }
        return false;
        
        
    }
    public  function buscarEmployee(String $email){
        return parent::buscarEmployee($email);
    }
}

?>