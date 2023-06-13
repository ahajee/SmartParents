<?php 
include 'connect.php';

    $servername='localhost';
    $username='root';
    $password='';
    $database='smartparent';
    //create connection
    $connection = new mysqli ($servername,$username,$password,$database);

    
   if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $sql = "DELETE FROM `users`WHERE user_id = $user_id";

    if($connection->query($sql) === TRUE){
        header('Location: /Impact/Admin_usermng.php');
    }else{
        echo "something went wrong";
    }
    
}else{
    // redirect to show with error
    die('id not provided');
}

?>