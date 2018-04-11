<?php


class Blog {
    //put your code here
    protected $connection;

    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db_blog';
        $this->connection = mysqli_connect($host_name, $user_name, $password, $db_name);

        if (!$this->connection) {
            die('Connection Fail' . mysqli_error($this->connection));
        }
    }

    public function save_blog_info($data) {
        $sql = "INSERT INTO tbl_blog (blog_title, author_name, 	blog_description, publication_status) "
                . "VALUES('$data[blog_title]', '$data[author_name]', '$data[blog_description]', '$data[publication_status]')";

        if (mysqli_query($this->connection, $sql)) {
            $message = "Blog info Saved Successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }

    public function select_all_blog_info() {
        $sql = "SELECT * FROM tbl_blog ORDER BY blog_id DESC";

        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }

    public function select_blog_info_by_id($blog_id) {
        $sql = "SELECT * FROM tbl_blog WHERE blog_id = '$blog_id'";

        if (mysqli_query($this->connection, $sql)) {
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }

    public function update_blog_info($data, $id) {
        $sql = "UPDATE tbl_blog SET blog_title = '$data[blog_title]', author_name = '$data[author_name]', blog_description = '$data[blog_description]', publication_status = '$data[publication_status]' WHERE blog_id = '$id'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Blog Info Updated Successfully';
            header('Location: manage_blog.php');
        } else {
            die('Query problem'.mysqli_error($this->connection));
        }
    }
    
     public function delete_blog_info($id) {
        $sql = "DELETE FROM tbl_blog WHERE blog_id = '$id'";

        if (mysqli_query($this->connection, $sql)) {
            $message = 'Blog info deleted Successfully';
            return $message;
        } else {
            die('Query problem' . mysqli_error($this->connection));
        }
    }
    
    public function save_image($data){
        $image_name = $_FILES['image']['name'];
        $directory = '../asset/blog_image/';
        $image_url = $directory.$image_name;
        $image_type = pathinfo($image_name, PATHINFO_EXTENSION);
        $image_size = $_FILES['image']['size'];
        $check = getimagesize($_FILES['image']['tmp_name']);
        
        if ($check) {
            if(file_exists($image_url)){
                die('This File already exist. PLease try another one');
            } else {
                if($image_size > 5000000){
                    die('File size is too large');
                } else {
                    if($image_type!='jpg'&& $image_type!='png'){
                        die('File type is not valid. PLease use JPG or PNG');
                    } else {
                         $result = move_uploaded_file($_FILES['image']['tmp_name'], $image_url);
                         $sql = "INSERT INTO tbl_image (image) VALUES ('$image_url')";
                         mysqli_query($this->connection, $sql);
                    }
                }
            }
        } else {
            die('The file you upload is not a image. Please upload a valid image file !.');
        }
        
        if ($result){
            $message = "Image Uploded Successfully";
            return $message;
        } else {
            $message = "Image Uplod Failed";
            return $message;
        }
    }
    
    public function select_all_image(){
        $sql = "SELECT * FROM tbl_image ORDER BY image_id DESC";
        if(mysqli_query($this->connection, $sql)){
            $query_result = mysqli_query($this->connection, $sql);
            return $query_result;
        } else {
            die('Query Problem'. mysqli_errno($this->connection));
        }
    }
}
