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
            <p class="center error"><?php echo $this->message?></p>
        </div>
        <button onclick="window.history.back()">Go Back</button>
        <button id="Login button">Go to Login</button>
        <?php   $upOne = dirname(__DIR__,1);
        require $upOne . '/footer.php';?>        
    </body>
</html>