<?php
session_start();

// initializing variables
$user_id ="";
$username = "";
$email    = "";
$user_type="";
$errors = array(); 


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'smartparent');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

 

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
      if ($user['username'] === $username) {
          array_push($errors, "Username already exists");
      }
  
      if ($user['email'] === $email) {
          array_push($errors, "Email already exists");
      }
  }
  
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
      $password = md5($password_1); // encrypt the password before saving in the database
  
      if (isset($_POST['user_type']) && $_POST['user_type'] === 'admin') {
          $query = "INSERT INTO users (username, email, user_type, password) 
                    VALUES('$username', '$email', 'admin', '$password')";
          $_SESSION['success'] = "Admin registered successfully";
          header('location: Impact/Admin_usermng.php');
      } else {
          $query = "INSERT INTO users (username, email, user_type, password) 
                    VALUES('$username', '$email', 'user', '$password')";
          $_SESSION['success'] = "User registered successfully";
          header('location: user.php');
      }
  
      mysqli_query($db, $query);
      $_SESSION['username'] = $username;
      exit();
  }
}  

if (isset($_POST['login_btn'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
      array_push($errors, "Username is required");
  }
  if (empty($password)) {
      array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
      $password = md5($password);
      $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      $results = mysqli_query($db, $query);

      if ($results) {
          if (mysqli_num_rows($results) == 1) {
              $row = mysqli_fetch_assoc($results);
              $_SESSION['user_id'] = $row['user_id'];
              $_SESSION['user_type'] = $row['user_type'];
              $_SESSION['username'] = $username;
              $_SESSION['success'] = "You are now logged in";

              if(($row['user_type'] == 'user') && ($row['username'] == $username)) {
                $_SESSION['user']=$row['username'];
                    header("location: user.php");
            }
            else if(($row['user_type'] == 'admin') && ($row['username'] == $username)) {
                $_SESSION['user']=$row['username'];
                    header("location:Admin_index.php");
            }
          } else {
              array_push($errors, "Wrong username/password combination");
          }
      } else {
          array_push($errors, "Error executing the query: " . mysqli_error($db));
      }
  }
}



function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
  

  
?>
