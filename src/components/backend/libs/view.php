<?php
class View{
    function __construct(){
        
    }
    function render($name){
        $upOne = dirname(__DIR__,1);
        require $upOne . '/views/' . $name . '.php';
    }
}
?>