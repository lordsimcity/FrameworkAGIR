<?php
$upOne = dirname(__DIR__,1);
include_once $upOne . '/models/blogData.php';
class myBlogPtController extends Controller{

    function __construct(){
        parent::__construct();


    }
    function defaultView(){
        $this->view->render('myBlog/index');
    }
    function loginTheUser(){
        if(isset($_POST['userId'])){
            $_SESSION['userID'] =$_POST['userId'];
            $_SESSION['password'] =$_POST['password'];
            $_SESSION['email id'] =$_POST['emailId'];
           
        }else{
            $_SESSION['userID']=null;
            $_SESSION['password']=null;
            $_SESSION['email id'] =null;
        }
        $emailId  = $_POST['emailId'];
        $password = $_POST['password'];
        $authorId   = $_POST['userId'];

        $row_cnt = $this->model->validateUser(['authorId'=>$authorId,'user_login'=>$emailId, 'password'=>$password]);
        if($row_cnt>0){

                $this->view->message ="Welcome back ". $authorId ."!";
                $blogItems = $this->model->getBlogdata(['authorId'=>$authorId]);

                $this->view->data = $blogItems;
                $this->view->render('myBlog/myPage');
        }else{
               $this->view->message="User Id or Email not correct, please Re-enter!";
               $this->view->render('errors/passwordError');
        }

    }
}

?>