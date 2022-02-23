<?php
$upOne = dirname(__DIR__,1);
include_once $upOne . '/models/blogData.php';
//echo $upOne;
class crteBlog extends Model{
    //extending the parent model
    public function __construct(){
        parent::__construct();
    }
    //validate if the data entry exists
    public function validateEntry($data){
        try{
            $userPostId     = $data['authorId'];
            $postTitle      = $data['postTitle'];
            $check=$this->db->connect()->prepare("SELECT * FROM BlogPosts WHERE author_id='$userPostId' AND post_title='$postTitle'");
            $checkRows  =$check->execute();
            $rows = $check->fetchAll();
            $nRows = count($rows); 
            //var_dump($nRows) ;
            return $nRows;
        }catch(PDOException $e){
            print_r('Error connection: ' . $e->getMessage());
        }
    }
    //create the data entry 
    public function createBlog($data){
        $userId         = $data['authorId'];
        $authorName     = $data['postAuthor'];
        $postTitle      = $data['postTitle'];
        $postKeywords   = $data['key_words'];
        $postContent    = $data['postContent'];
        $postCategory   = $data['postCategory'];
        $postDate       = date("d-m-Y", strtotime($data['postPublishDate']));
        $postStatus     = $data['postStatus'];
        $items=[];
        try{
            $queryBlog = $this->db->connect()->prepare('INSERT INTO BlogPosts(post_title, key_words, post_author, author_id,
            post_status, post_date, post_publish_date, post_category, post_content ) VALUES (:post_title, :key_words, :post_author, :author_id,
            :post_status, :post_date, :post_publish_date, :post_category, :post_content)');
            $queryBlog->execute(['post_title'=>$postTitle, 'key_words'=>$postKeywords, 'post_author'=>$authorName,
            'author_id'=>$userId, 'post_status'=>$postStatus, 'post_date'=>date('Y-m-d H:i:s'), 'post_publish_date'=>$postDate,
            'post_category'=>$postCategory, 'post_content'=>$postContent]);
            //execution of data
           // echo"data executed";
        }catch(PDOException $e){
            print_r('Error connectio: ' . $e->getMessage());
        }
    }
    public function getBlogdata($data){
        $userId = $data['authorId'];
        $items=[];
        try{
            $queryBlog = $this->db->connect()->query("SELECT BlogPosts.*, BlogComments.* FROM BlogPosts Left JOIN 
            BlogComments ON BlogPosts.post_id = BlogComments.comment_post_id WHERE BlogPosts.author_id='$userId'");
            $blogs = $queryBlog->execute();
            $store=[];
            $flag=0;
            while ($row = $queryBlog->fetch()) {
                $blogPost = new blogData();
                $blogPost->postTitle= $row['post_title'];
                $blogPost->post_content=$row['post_content'];
                $blogPost->post_publish_date=$row['post_publish_date'];
                $blogPost->post_category=$row['post_category'];
                $blogPost->post_status=$row['post_status'];
                $blogPost->postAuthor=$row['post_author'];
                $blogPost->keyWords = $row['Key_words'];
                $blogPost->post_id = $row['post_id'];
                $blogPost->post_author_id=$row['author_id'];
                $blogPost->addComments($row['comment_author'],$row['comment_content'],
                $row['comment_author_id'],$row['comment_id']);
                array_push($items,$blogPost);
            }
        return $items;
        }catch(PDOException $e){
            print_r('Error connectio: ' . $e->getMessage());
        }
    }

}
?>