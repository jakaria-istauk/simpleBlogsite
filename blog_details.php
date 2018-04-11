<?php
$blog_id = $_GET['id'];
require_once './class/aplication.php';
$application = new Aplication();
$query_result = $application->getBlogInfoById($blog_id);

$blog_info = mysqli_fetch_assoc($query_result);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Page</title>

    <!-- Bootstrap core CSS -->
    <link href="asset/css/bootstrap.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PHP Test Blog</a>
        </div>
        
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1><?php echo $blog_info['blog_title'];?></h1>
        <p>Posted by <?php echo $blog_info['author_name']; ?></p>
        <p><a class="btn btn-primary btn-lg" href="index.php" role="button"><span class="glyphicon glyphicon-arrow-left"></span> Back to Home</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
          <div class="well"><?php echo $blog_info['blog_description']; ?></div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Jakaria.</p>
      </footer>
    </div> <!-- /container -->


   
    
    <script src="asset/js/jquery.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
  </body>
</html>
