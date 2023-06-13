<?php 
include 'connect.php';

    $servername='localhost';
    $username='root';
    $password='';
    $database='smartparent';
    //create connection
    $connection = new mysqli ($servername,$username,$password,$database);

    
   if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    $sql = "DELETE FROM `forum` WHERE post_id = $post_id";

    if($connection->query($sql) === TRUE){
        header('Location: Admin_forumMng.php');
    }else{
        echo "something went wrong";
    }
    
}else{
    // redirect to show with error
    die('id not provided');
}
?>