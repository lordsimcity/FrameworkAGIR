<?php
$upOne = dirname(__DIR__,1);
include_once $upOne . '/models/blogData.php';
class crteBlogController extends Controller{

    function __construct(){
        parent::__construct();
    }
    function defaultView(){
        $this->view->render('myBlog/create');
    }
    function createBlogPost(){
        $authorId       = $_SESSION['userID'];
        $postTitle      = $_POST['blogTitle'];
        $postContent    = $_POST['content'];
        $postCategory   = $_POST['categories'];
        $postAuthor     = $_POST['Author_name'];
        $postPublishDt  = date("d-m-Y", strtotime($_POST['publih_date']));
        $postKeyWords   = $_POST['keywords'];
        $postStatus     = $_POST['option'];
        
        $row_cnt = $this->model->validateEntry(['authorId'=>$authorId,'postTitle'=>$postTitle]);
            $blogPostCreated = $this->model->CreateBlog(['authorId'=>$authorId, 'postTitle'=>$postTitle, 'postContent'=>$postContent,
            'postCategory'=>$postCategory, 'postAuthor'=>$postAuthor, 'postPublishDate'=>$postPublishDt, 'key_words'=>$postKeyWords,
            'postStatus'=>$postStatus]);

        $this->view->message ="Welcome to your Blog ". $postAuthor."!";
        $blogPost = $this->model->getBlogdata(['authorId'=>$authorId]);

        $this->view->data = $blogPost;
        $this->view->render('myBlog/myPage');

    }
}

?>