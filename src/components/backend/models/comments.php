<?php
$upOne = dirname(__DIR__,1);
include_once $upOne . '/models/blogData.php';
//echo $upOne;
class comments extends Model{
    //extending the parent model
    public function __construct(){
        parent::__construct();
    }
    public function getAuthorName($data){
        $userId         = $data['authorId'];
        try{
            $queryBlog  = $this->db->connect()->query("SELECT userName FROM adminblog WHERE author_ID='$userId'");
            while($row = $queryBlog->fetch()){
                $item  = $row;
            }
        return $item;
        }catch(PDOException $e){
            print_r('Error connectio: ' . $e->getMessage());
        }
    }
    //create the data entry 
    public function comments($data){
        $userId         = $data['authorId'];
        $commentPost    = $data['comment_content'];
        $commentAuthName  = $data['author_name'];
        $commentPostId  = $data['comment_post_id'];

        try{
            $queryBlog = $this->db->connect()->prepare('INSERT INTO BlogComments(comment_author_id, comment_content , 
            comment_post_id, comment_author) VALUES (:comment_author_id, :comment_content, :comment_post_id, :comment_author)');
            $queryBlog->execute(['comment_author_id'=>$userId, 'comment_content'=>$commentPost, 'comment_post_id'=>$commentPostId,
            'comment_author'=>$commentAuthName]);

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