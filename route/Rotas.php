<?php

namespace route;

class Rotas
{
    public $arrRotas = [];
    public static $input;
    public function __construct()
   

    public function verificarRotas($caminho)
    {
        $arr = explode('/', $caminho);
        $arr[0] = $arr[0] . "/";
        $rota = (isset($this->arrRotas[$arr[0]])) ? $this->arrRotas[$arr[0]] : null;
        if ($rota != null) {
            if ($_SERVER['REQUEST_METHOD'] == $rota["metodo"]) {
                return $rota;
            }
        }
        return null;
    }
}
