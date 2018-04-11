<?php
session_start();
if ($_SESSION['admin_id'] == NULL) {
    header('Location: index.php');
}


require_once '../class/blog.php';
$blog = new Blog();

if (isset($_GET['logout'])) {
    require_once '../class/login.php';
    $login = new Login();
    $login->admin_logout();
}
$message = '';
if (isset($_POST['add'])) {
    $message = $blog->save_image($_POST);
}

$query_result = $blog->select_all_image();
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
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="sname">Select Image: </label>
                                <input type="file" id="sname" name="image" accept="image/* ">
                            </div>
                            <input type="submit" name="add" class="btn btn-primary" value="Save Image">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <?php while ($image_info = mysqli_fetch_assoc($query_result)){?>
                <div class="col-md-3">
                    <div class="well">
                        <img src="<?php echo $image_info['image']?>" alt="" class="img-responsive"/>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>



        <script src="../asset/js/jquery.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
    </body>
</html>

