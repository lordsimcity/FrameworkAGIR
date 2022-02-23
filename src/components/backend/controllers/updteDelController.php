<?php
$upOne = dirname(__DIR__,1);
include_once $upOne . '/models/blogData.php';
class updteDelController extends Controller{

    function __construct(){
        parent::__construct();
    }
    function defaultView(){
        $this->view->render('myBlog/myPage');
    }
    function updateBlogPost($param=null){
        $authorId       = $_SESSION['userID'];
        $postId         = $param['0'];

        $blogItems = $this->model->getBlogdata(['authorId'=>$authorId, 'post_id'=>$postId]);
        $this->view->data = $blogItems;

        $this->view->render('myBlog/Edit');
    }
    function updateExecute($param=null){
     
        $postId         = $param['0'];
        $authorId       = $_SESSION['userID'];
        $postTitle      = $_POST['blogTitle'];
        $postContent    = $_POST['content'];
        $postCategory   = $_POST['categories'];
        $postAuthor     = $_POST['Author_name'];
        $postPublishDt  = date("d-m-Y", strtotime($_POST['publish_date']));
        $postKeyWords   = $_POST['keywords'];
        $postStatus     = $_POST['option'];


        $updatedBlog    = $this->model-> updateBlog(['authorId'=>$authorId, 'postTitle'=>$postTitle, 'postContent'=>$postContent,
        'postCategory'=>$postCategory, 'postAuthor'=>$postAuthor, 'postPublishDate'=>$postPublishDt, 'key_words'=>$postKeyWords,
        'postStatus'=>$postStatus, 'postID'=>$postId]); //update the blog

        $NewBlog   =  $this->model->getBlogdataAll(['authorId'=>$authorId]);  //get all the data after updating
        $this->view->data = $NewBlog;
        $this->view->message ="Welcome to your Blog ". $postAuthor."!";
        $this->view->render('myBlog/myPage');
    }
    function deleteBlogPost($param=null){
        $authorId       = $_SESSION['userID'];
        $postId         = $param['0'];

        $deleteBlog     =  $this->model->deleteBlog(['authorId'=>$authorId, 'postid'=>$postId]);//delete blog
        $NewBlog        =  $this->model->getBlogdataAll(['authorId'=>$authorId]);   //show the updated list
        $this->view->data = $deleteBlog;
        $this->view->render('myBlog/myPage');


    }
    function deleteComments($param=null){

    }
}

?>