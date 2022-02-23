<!Doctype html>
<html lang=en>
    <head>
    <title></title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    </head>
    <body>
        <?php 
        $upOne = dirname(__DIR__,1);
        require $upOne . '/headerUser.php';
        ?>
        
        <div id="main">
            <h5 class="center"><?php echo $this->message;?></h5>
        </div>
        <div class="container mt-4" id="createblog">
            <div class="row mb-4 container">
                <a href="<?php echo constant('URL');?>crteBlogController/defaultView">Create Blog</a>
            </div>
        </div>
        <!-- BLOG POSTS -->
        <?php $upOne = dirname(__DIR__,2);
            include_once $upOne . '/models/blogData.php';
            $store=[];
            $flag=1;
            foreach ($this->data as $row) {
                array_push($store,$row[0]);
                if(($flag-1)>=0){
                    if($store[$flag] !== $store[$flag-1]){
                        continue;
                    }
                }
            $blog = new blogData();
            $blog = $row;
        ?>
        <div class="container mt-4 border border-light text-center myBlog" id="myBlog">
            <div class="row d-flex justify-content-center mr-5" id = "<?php echo $blog->post_id?>">
                <div class="col-4 offset-4 blogTitle">
                    <h3 class="biggerfont post-title mr-6 text-center"><?php echo $blog->postTitle;?></h3>
                </div>
                <div class="col-2 offset-1">
                    <p class="small-font text-sm-right"> Status: <?php echo $blog->post_status;?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p class="small-font">Author: <?php echo $blog->postAuthor;?></p>
                </div>
                <div class="col-2 offset-2">
                    <p class="small-font">Date: <?php echo $blog->post_publish_date;?></p>    
                </div>
                <div class="col-2 offset-3">
                    <p class="small-font">Keywords: <?php echo $blog->keyWords;?></p>
                </div>
            </div>
            <div class="row">
                <div class="d-sm-flex">
                    <p class="small-font">Category: <?php echo $blog->post_category;?></p>
                    <a href="<?php echo constant('URL') .'updteDelController/updateBlogCategory/' . $blog->post_id;?>" class="small-font">(Edit/</a>
                    <a href="<?php  echo constant('URL') . 'updteDelController/deleteBlogCategory/' . $blog->post_id;?>" class="small-font">Delete)</a>
                </div>
            </div>
            <div class="row">
                <p><?php echo $blog->post_content;?></p>
            </div>
            <div class="row">
                <div class="col-2 mt-2 mb-2 d-sm-inline-flex">
                    <a href="<?php echo constant('URL') .'updteDelController/updateBlogPost/' . $blog->post_id;?>" class="small-font">Edit/</a>
                    <a href="<?php  echo constant('URL') . 'updteDelController/deleteBlogPost/' . $blog->post_id;?>" class="small-font">Delete Post</a>
                </div>
            </div>
            <?php for ($i=0;$i<count($blog->comment_content); $i++) {
            ?>
            <div class="row">
                <div class="col-8 mt-2 commentBlog">
                    <p><?php echo $blog->comment_content[$i];?></p>
                </div>
                <div class="col-1 d-sm-flex">
                    <form action="<?php echo constant('URL') .'commentsController/deleteComment/' . $blog->post_id;?>" 
                    method="POST" class="createComment">
                        <input type="submit" value="Delete">
                    </form>
                </div>
            </div>
            <?php };?>
            <!--comment post-->
            <form action="<?php echo constant('URL') .'commentsController/createComment/' . $blog->post_id;?>" 
            method="POST" class="createComment">
            <div class="row">
                <div class="col-8 mt-2">
                    <input type="text" class="text-input" name="comment_post"> <!--comment-->
                </div>
                <div class="col-1 d-sm-flex">
                    <input type="submit" value="Comment">
                </div>
                <div class="col-1 d-sm-flex">
                    <input type="submit" value="Delete">
                </div>
            </div>
            </form>
        </div>
        <?php }; ?>
       
        <?php   $upOne = dirname(__DIR__,1);
        require $upOne . '/footer.php';?>
    </body>
</html>