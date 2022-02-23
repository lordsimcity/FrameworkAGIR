<?php
class blogData{
    //public $postId;
    public $postTitle;
    public $keyWords;
    public $postAuthor;
    public $post_content;
    public $post_publish_date;
    public $post_category;
    public $post_status;
    public $post_id;
    public $post_author_id;  
    //storing the comments
    public function addComments($author, $content, $authorid, $commentid){
        $this->comment_author[]=$author;
        $this->comment_content[]=$content;
        $this->comment_author_id[]=$authorid;
        $this->comment_id[]=$commentid;  
    }
    
}

?>