<?php
namespace generic;
define("DIR",$_SERVER['DOCUMENT_ROOT'].'/biblioteca');
class Autoload{
    public static function register(){
        spl_autoload_register(function($class){
            $file = DIR.'/'.str_replace('\\','/',$class).'.php';
            if(file_exists($file)){
                require_once $file;
            }
        });
    }
}
Autoload::register();
?>