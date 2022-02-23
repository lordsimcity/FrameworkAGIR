<?php
$upOne = dirname(__DIR__,1);
include_once $upOne . '/models/blogData.php';
class commentsController extends Controller{

    function __construct(){
        parent::__construct();

    }
    function createComment($param=null){

        if(isset($_POST['email id'])==0){
           $_SESSION['userID']=null;
        }
        if(isset($_SESSION['userID'])){
            $authorId = $_SESSION['userID'];
            $authorName = $this->model->getAuthorName(['authorId'=>$authorId])['userName'];
        }else{
            $authorId = 'Anonymous';
            $authorName = 'None';
        }
        $comment_post_id = $param['0'];
        $comment_content = $_POST['comment_post'];

        $createdComment = $this->model->comments(['authorId'=>$authorId, 'comment_post_id'=>$comment_post_id,
        'author_name'=>$authorName,'comment_content'=>$comment_content]);


        $this->view->message ="Welcome to your Blog ". $authorName."!";
        $blogPost = $this->model->getBlogdata(['authorId'=>$authorId]);

        $this->view->data = $blogPost;
        if(isset($_SESSION['userID'])){

            $this->view->render('myBlog/myPage');
        }else{
           
            header('Location: http://localhost/framework5/src/components/backend/controllers/homeModlController');
            $this->view->render('home/index');
        }

    }
    function deleteComment($param=null){

    }
}

?>