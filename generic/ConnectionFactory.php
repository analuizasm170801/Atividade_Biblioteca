<?php 
namespace generic;

class ConnectionFactory{
    public DBSingleton $conn;
    public function conectar(){
        $this->conn = DBSingleton::getInstance();
    }
}
?>