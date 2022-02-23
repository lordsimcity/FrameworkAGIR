<?php
$upOne = dirname(__DIR__,1);
include_once $upOne . '/models/blogData.php';
class updteDel extends Model{
    //extending the parent model
    public function __construct(){
        parent::__construct();
    }
    //update the data entry
    public function updateBlog($data){
        $userId         = $data['authorId'];
        $authorName     = $data['postAuthor'];
        $postTitle      = $data['postTitle'];
        $postKeywords   = $data['key_words'];
        $postContent    = $data['postContent'];
        $postCategory   = $data['postCategory'];
        $postDate       = date("d-m-Y", strtotime($data['postPublishDate']));
        $postStatus     = $data['postStatus'];
        $postId         = $data['postID'];
        $items=[];
        try{
            $queryBlog = $this->db->connect()->query("UPDATE BlogPosts SET post_title= '$postTitle', key_words='$postKeywords', 
            post_author='$authorName', author_id='$userId', post_status='$postStatus', post_date=date('Y-m-d H:i:s'), 
            post_publish_date='$postDate', post_category='$postCategory' WHERE author_id='$userId' AND post_id='$postId'");
            //execution of data
           // echo"data executed";
        }catch(PDOException $e){
            print_r('Error connectio: ' . $e->getMessage());
        }
    }
    //delete the data entry
    public function deleteBlog($data){
        $userId         = $data['authorId'];
        $postId         = $data['postid'];
        $items=[];
        try{
            $query  = $this->db->connect()->query("DELETE Bc.*, Bp.* FROM BlogPosts as Bp INNER JOIN 
            BlogComments as Bc ON Bp.post_id=Bc.comment_post_id WHERE Bp.post_id='$postId' AND Bp.uthor_id ='$userId'");//delete blogs
    
    }catch(PDOException $e){
            print_r('Error connectio: ' . $e->getMessage());
        }
    }
    public function getBlogdata($data){
        $userId = $data['authorId'];
        $postId = $data['post_id'];
        $items=[];
        try{
            $queryBlog = $this->db->connect()->query("SELECT * FROM BlogPosts WHERE BlogPosts.author_id='$userId' AND BlogPosts.post_id='$postId'
            ORDER BY BlogPosts.post_publish_date");
            $blogs = $queryBlog->execute();
            while ($row = $queryBlog->fetch()) {
                $blogPost = new blogData();
                //print_r( $row);
                $blogPost->postTitle= $row['post_title'];
                $blogPost->post_content=$row['post_content'];
                $blogPost->post_publish_date=$row['post_publish_date'];
                $blogPost->post_category=$row['post_category'];
                $blogPost->post_status=$row['post_status'];
                $blogPost->postAuthor=$row['post_author'];
                $blogPost->keyWords = $row['Key_words'];
                $blogPost->post_id = $row['post_id'];
                $blogPost->post_athor_id=$row['author_id'];
                array_push($items,$blogPost);
            }
        return $items;
        }catch(PDOException $e){
            print_r('Error connectio: ' . $e->getMessage());
        }
    }
    public function getBlogdataAll($data){
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