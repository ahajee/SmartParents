<?php 
include 'functions.php';
include 'connect.php';

    $servername='localhost';
    $username='root';
    $password='';
    $database='smartparent';
    //create connection
    $connection = new mysqli ($servername,$username,$password,$database);
    $reply_id = $_GET['reply_id'];
    
if(isset($_GET['reply_id'])){
    
    $reply_id = $_GET['reply_id'];
    $sql = "DELETE FROM `replies`WHERE reply_id = $reply_id";

    if($connection->query($sql) === TRUE){
        header("Location: reply.php");
    }else{  if ($_SESSION['user_id'] == $userId) {
        echo "<a class='button' href='/Impact/deleteReply.php?reply_id=$reply_id'>Delete</a>";
    }
        echo "something went wrong";
    }
    
}else{
    // redirect to show with error
    die('id not provided');
}
?>