<?php

class ErrorShown extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->message ="Error encountered in application or doesnot exist";
        $this->view->render('errors/index');
        echo "<p>Error loading resources</p>";
    }
}
?>