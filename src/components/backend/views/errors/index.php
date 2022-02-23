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
        ?>
        <div id="main">    
            <h1 class="center error"><?php echo $this->message?><h1>
        </div>
        <?php   $upOne = dirname(__DIR__,1);
        require $upOne . '/footer.php';?>        
    </body>
</html>