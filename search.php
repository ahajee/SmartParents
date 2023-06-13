<?php 
include 'connect.php';

$servername='localhost';
    $username='root';
    $password='';
    $database='smartparent';
    //create connection
    $connection = new mysqli ($servername,$username,$password,$database);
    //check connection
    if($connection ->connect_error){
    die("connection failed: ". $connection->connect_error);
    // search.php
    
    // Assuming you have already established a database connection
    
    // Retrieve the search keyword from the form submission
    $keyword = $_GET['keyword'];
    
    // Prepare the search query
    $query = "SELECT forum.topic, forum.message, users.username 
              FROM forum 
              JOIN users ON forum.user_id = users.user_id 
              WHERE forum.topic LIKE '%$keyword%' OR forum.message LIKE '%$keyword%'";
    
    // Execute the query
    $result = mysqli_query($connection, $query);
    
    // Check if the query executed successfully
    if ($result) {
        // Check if there are any matching results
        if (mysqli_num_rows($result) > 0) {
            // Loop through the results and display them
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<p><strong>Topic:</strong> ' . $row['topic'] . '</p>';
                echo '<p><strong>Message:</strong> ' . $row['message'] . '</p>';
                echo '<p><strong>Username:</strong> ' . $row['username'] . '</p>';
                echo '<hr>';
            }
        } else {
            echo 'No matching posts found.';
        }
    } else {
        echo 'Error executing search query: ' . mysqli_error($connection);
    }
    {
    header("Location: search_results.php?keyword=$keyword");
    exit();
    }
    // Close the database connection
    mysqli_close($connection);
  }
?>
    
