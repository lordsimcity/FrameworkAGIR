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
        require $upOne . '/header.php';
        $flag=0;
        ?>
        <div class="container border">
            <?php $upOne = dirname(__DIR__,2);
                include_once $upOne . '/models/blogData.php';
                foreach ($this->data as $value) {
                $blog = new blogData();
                $blog=$value;
            ?>
            <form action="<?php  echo constant('URL') . 'updteDelController/updateExecute/'. $blog->post_id;?>" method="POST" class="createpost">
                <div class="row col-12">
                    <div >
                        <label for="blog title">Blog Title:</label><br>
                        <input type="text" name="blogTitle" id="" value="<?php echo $blog->postTitle;?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mt-2">
                        <label for="author name">Author Name:</label><br>
                        <input type="text" name="Author name" id="" value="<?php echo $blog->postAuthor;?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mt-2">
                        Categories: <select name="categories">
                        <option value="travelling">Travelling</option>
                        <option value="hotels">Hotels</option>
                        <option value="flights">Flights</option>
                        <option value="cities" selected>Cities</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mt-2">
                        <label for="keywords">keywords:</label><br>
                        <input type="text" name="keywords" id="" value="<?php echo $blog->post_category;?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mt-2">
                        <label for="publish date">Publish Date:</label><br>
                        <input type="text" name="publish date" id="" value="<?php echo $blog->post_publish_date;?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mt-2">
                        <input name="content" id="" class="text-input" value="<?php echo $blog->post_content;?>">></input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mt-2">
                        <input type="radio" name="option" value="draft">Draft<br>
                        <input type="radio" name="option" value="publish">Publish<br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mt-2">
                        <input type="submit" value="Edit">
                    </div>
                </div>
            </form>
            <?php };?>
        </div>
        <?php   $upOne = dirname(__DIR__,1);
        require $upOne . '/footer.php';?>
    </body>
    <script src="/src\components\frontend\passwordCheck.js"></script>  <!--paswword check js-->

</html>