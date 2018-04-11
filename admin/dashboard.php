<?php
session_start();
if ($_SESSION['admin_id'] == NULL) {
    header('Location: index.php');
}

if (isset($_GET['logout'])) {
    require_once '../class/login.php';
    $login = new Login();
    $login->admin_logout();
}
$message = '';
if (isset($_POST['add'])) {
    require_once '../class/blog.php';
    $blog = new Blog();
    $message = $blog->save_blog_info($_POST);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dash Board</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../asset/css/bootstrap.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Student</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="dashboard.php">Add Blog</a></li>
                    <li><a href="manage_blog.php">Manage Blog</a></li>
                    <li><a href="add_image.php">Add Image</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">Welcome <strong><?php echo $_SESSION['admin_name']; ?></strong></a></li>
                    <li><a href="?logout=logout">Log Out</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-success text-center"><?php echo $message; ?></h2>
                    <div class="well">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="sname">Blog Title: </label>
                                <input type="text" class="form-control" id="sname" name="blog_title"  placeholder="Enter Student Name">
                            </div>
                            <div class="form-group">
                                <label for="phon">Author Name: </label>
                                <input type="text" class="form-control" id="phon" name="author_name"  placeholder="Enter Phone No">
                            </div>
                            <div class="form-group">
                                <label for="address">Blog Description: </label>
                                <textarea style="height: 200px;" type="text" class="form-control" id="address" name="blog_description" placeholder="Enter Student Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Publication Status:</label>
                                <select class="form-control" name="publication_status" id="sel1">
                                    <option>----Select Publication Status----</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div> 
                            <input type="submit" name="add" class="btn btn-primary" value="Save Blog Info">
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script src="../asset/js/jquery.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
    </body>
</html>

