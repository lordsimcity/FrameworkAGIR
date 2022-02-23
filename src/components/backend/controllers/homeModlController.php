<?php

class homeModlController extends Controller{

    function __construct(){
        parent::__construct();
    }

    public function defaultView(){
        $blogItems = $this->model->getBlogdata();
        $this->view->data = $blogItems;
        $this->view->render('home/index');

    }
     

    
}

?>