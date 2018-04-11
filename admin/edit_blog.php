<?php
session_start();
if ($_SESSION['admin_id'] == NULL) {
    header('Location: index.php');
}
$blog_id = $_GET['id'];

require_once '../class/blog.php';
$blog = new Blog();
$query_result = $blog->select_blog_info_by_id($blog_id);
$blog_info = mysqli_fetch_assoc($query_result);

if (isset($_POST['update'])) {
    $blog->update_blog_info($_POST, $blog_id);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Student Info</title>
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
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="addstudent.php">Add Student</a></li>
                    <li><a href="view_student.php">View Student</a></li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--<h2 class="text-success"><?php echo $message; ?></h2>-->
                    <div class="well">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="sname">Blog Title: </label>
                                <input type="text" class="form-control" id="sname" name="blog_title"  value="<?php echo $blog_info['blog_title'];?>" >
                            </div>
                            <div class="form-group">
                                <label for="phon">Author Name: </label>
                                <input type="text" class="form-control" id="phon" name="author_name"  value="<?php echo $blog_info['author_name'];?>" >
                            </div>
                            <div class="form-group">
                                <label for="address">Blog Description: </label>
                                <textarea style="height: 200px;" type="text" class="form-control" id="address" name="blog_description"><?php echo $blog_info['blog_description'];?> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Publication Status:</label>
                                <select class="form-control" name="publication_status" id="sel1">
                                    <option><?php 
                                        if($blog_info['publication_status']==1){
                                            echo 'Current Status: Published';
                                        } else {
                                            echo 'Current Status: Unpublished';
                                        }
                                    ?></option>
                                    
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                            <input type="submit" name="update" class="btn btn-primary" value="Update Blog Info">
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script src="../asset/js/jquery.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
    </body>
</html>

