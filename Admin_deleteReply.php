<?php 
include 'connect.php';

    $servername='localhost';
    $username='root';
    $password='';
    $database='smartparent';
    //create connection
    $connection = new mysqli ($servername,$username,$password,$database);

    
   if(isset($_GET['reply_id'])){
    $reply_id = $_GET['reply_id'];
    $sql = "DELETE FROM `replies` WHERE reply_id = $reply_id";

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