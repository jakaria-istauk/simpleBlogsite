<?php
require_once './class/aplication.php';
$application = new Aplication();
$query_result = $application->allPublishedBlogInfo();

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
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
          <?php while ($blog_info = mysqli_fetch_assoc($query_result)){?>
        <div class="col-md-4">
            <h2><?php echo $blog_info['blog_title'];?><small>-<?php echo $blog_info['author_name']; ?></small></h2>
            <p><?php echo substr($blog_info['blog_description'], 0,300); ?></p>
            <p><a class="btn btn-default" href="blog_details.php?id=<?php echo $blog_info['blog_id'];?>&&title=<?php echo $blog_info['blog_title'];?>" role="button">View details &raquo;</a></p>
        </div>
          <?php } ?>
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
