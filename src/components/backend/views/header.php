<?php?>
<!-- Navigation Block -->
<!Doctype html>
<html lang=en>
 <head>
        <title>A blog</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-xVVam1KS4+Qt2OrFa+VdRUoXygyKIuNWUUUBZYv+n27STsJ7oDOHJgfF0bNKLMJF" crossorigin="anonymous">
        <!--my own style sheet-->
        <link rel="stylesheet" href="<?php echo constant('URL');?>../src/assets/css/default.css"/>
    </head>
	<body class="Top">
		<header id="header">
			<nav class="navbar navbar-expand-lg ">
  				<a class="navbar-brand title" href="<?php echo constant('URL');?>homeModlController">Framework</a>
 	 			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  				</button>

  				<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      					<li class="nav-item active">
        					<a class="nav-link" href="<?php echo constant('URL');?>homeModlController">Home <span class="sr-only">(current)</span></a>
      					</li>
      					<li class="nav-item">
        					<a class="nav-link" href="<?php echo constant('URL');?>newModelController">Register</a>
      					</li>
      					<li class="nav-item">
        					<a class="nav-link" href="<?php echo constant('URL');?>myBlogPtController">My Blog</a>
     	 				</li>
    				</ul>
    				<form class="form-inline my-2 my-lg-0">
      					<input class="form-control mr-sm-2" type="search" placeholder="Search by Keyword">
      					<button class="btn btn-outline-success my-2 my-sm-0" type="submit"> search</button>
    				</form>
  				</div>
			</nav>
		</header>
	</body>
</html>