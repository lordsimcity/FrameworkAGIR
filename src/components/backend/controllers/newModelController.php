<?php

class newModelController extends Controller{

    function __construct(){
        parent::__construct();


    }
    function defaultView(){
        $this->view->render('new/index');
    }
    function registerUser(){
        $emailId  = $_POST['emailId'];
        $name     = $_POST['name'];
        $surname  = $_POST['surname'];
        $password = $_POST['password'];
        $authorId   = $_POST['userId'];
        //validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        $flag       =0;
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $this->view->message ="Password should be at least 8 characters in length and
            should include at least one upper case letter, one number";
            $this->view->render('errors/passwordError');
        }else{
            //validate if the userid and email exists;
            $row_cnt = $this->model->validate(['authorId'=>$authorId,'user_login'=>$emailId]);
            if($row_cnt>0){
                $this->view->message ="User Id or Email already exist!";
                $this->view->render('errors/loginError');
            }else{
                $this->model->insert(['authorId'=>$authorId, 'userName' =>$name,
                'userSurname'=>$surname, 'user_pass'=>$password, 'user_login'=>$emailId ]);
                echo "User registered";
            }
        }


    }
}

?>