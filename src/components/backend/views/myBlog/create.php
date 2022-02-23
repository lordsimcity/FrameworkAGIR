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
            <form action="<?php  echo constant('URL');?>crteBlogController/createBlogPost" method="POST" class="createpost">
                <div class="row col-12">
                    <div >
                        <label for="blog title">Blog Title:</label><br>
                        <input type="text" name="blogTitle" id="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mt-2">
                        <label for="author name">Author Name:</label><br>
                        <input type="text" name="Author name" id="">
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
                        <input type="text" name="keywords" id="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mt-2">
                        <label for="publish date">Publish Date:</label><br>
                        <input type="text" name="publish date" id="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mt-2">
                        <input class="text-input" type="text" name="content"></input>
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
                        <input type="submit" value="Create">
                    </div>
                </div>
            </form>
        </div>
        <?php   $upOne = dirname(__DIR__,1);
        require $upOne . '/footer.php';?>
    </body>
    <script src="/src\components\frontend\passwordCheck.js"></script>  <!--paswword check js-->

</html>