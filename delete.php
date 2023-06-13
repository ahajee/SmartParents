<?php 
include 'functions.php';
include 'connect.php';

    $servername='localhost';
    $username='root';
    $password='';
    $database='smartparent';
    //create connection
    $connection = new mysqli ($servername,$username,$password,$database);
    $post_id = $_GET['post_id'];

if(isset($_GET['post_id'])){
    
    $post_id = $_GET['post_id'];
    $sql = "DELETE FROM `forum`WHERE post_id = $post_id";

    if($connection->query($sql) === TRUE){
        header("Location: forum.php");
    }else{  if ($_SESSION['user_id'] == $userId) {
        echo "<a class='button' href='/Impact/delete.php?post_id=$post_Id'>Delete</a>";
    }
        echo "something went wrong";
    }
    
}else{
    // redirect to show with error
    die('id not provided');
}
?>