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
require_once '../class/blog.php';
$blog = new Blog();



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $message = $blog->delete_blog_info($id);
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

$query_result = $blog->select_all_blog_info();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Student Info</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../asset/css/bootstrap.css" type="text/css" rel="stylesheet">
        <script>
            function checkDelete(){
                var check=confirm("Are You sure to delete this !");
                if(check){
                    return true;
                }else{
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Blog Info</a>
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
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>SL no</th>
                                <th>Blog Title</th>
                                <th>Author Name</th>
                                <th>Blog Description</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            <?php $sl = 1;
                            while ($blog_info = mysqli_fetch_assoc($query_result)) {
                                ?>
                                <tr>
                                    <td><?php echo $sl++ ?></td>
                                    <td><?php echo $blog_info['blog_title']; ?></td>
                                    <td><?php echo $blog_info['author_name']; ?></td>
                                    <td><?php echo $blog_info['blog_description']; ?></td>
                                    <td><?php 
                                        if($blog_info['publication_status']==1){
                                            echo 'Published';
                                        } else {
                                            echo 'Unpublished';
                                        }
                                    ?></td>
                                    <td>
                                        <a href="edit_blog.php?id=<?php echo $blog_info['blog_id']; ?>" class="btn btn-success" title="Edit">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="?delete=<?php echo $blog_info['blog_id']; ?>" class="btn btn-danger" title="Delete" onclick="return checkDelete();">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <script src="../asset/js/jquery.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
    </body>
</html>


