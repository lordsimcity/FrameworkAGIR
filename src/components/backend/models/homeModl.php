<?php
$upOne = dirname(__DIR__,1);
include_once $upOne . '/models/blogData.php';
class homeModl extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getBlogdata(){
        $items=[];
        try{
            $queryBlog = $this->db->connect()->query("SELECT BlogPosts.*, BlogComments.* FROM BlogPosts Left JOIN
            BlogComments ON BlogPosts.post_id = BlogComments.comment_post_id ");
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