<?php
class Controller{
    function __construct(){

        $this->view = new View();
    }

    function loadModel($model){
        $url= "/models/" .substr($model,0, 8).'.php';
        $upOne = dirname(__DIR__,1);
       
        if(file_exists($upOne .$url)){

            require $upOne.$url;

            $modelName=substr($model,0, 8);
            $this->model = new $modelName();

        }
    }
}
?>