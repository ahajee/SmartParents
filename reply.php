<?php 
include 'connect.php';
include 'functions.php';
//session_start(); 

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
 // header('Location: signin.php'); // Redirect to the login page
  exit();
}
// Establish a database connection
$servername='localhost';
$username='root';
$password='';
$database='smartparent';
//create connection
$connection = new mysqli ($servername,$username,$password,$database);
//check connection
if($connection ->connect_error){
die("connection failed: ". $connection->connect_error);
}

if (isset($_GET['post_id'])) {
    $post_id = mysqli_real_escape_string($db, $_GET['post_id']);

    // Retrieve the message from the forum table
    $messageQuery = "SELECT 'message' FROM forum WHERE post_id = '$post_id'";
    $messageResult = mysqli_query($db, $messageQuery);

    if ($messageResult && mysqli_num_rows($messageResult) > 0) {
        $messageRow = mysqli_fetch_assoc($messageResult);
        $message = $messageRow['message'];

        // Retrieve the replies for the given post_id
        $repliesQuery = "SELECT reply_id, reply_message, user_id FROM replies WHERE post_id = '$post_id'";
        $repliesResult = mysqli_query($db, $repliesQuery);
    }
}
if (isset($_POST['reply'])) {
    $post_id = mysqli_real_escape_string($db, $_POST['post_id']);
    $reply_message = mysqli_real_escape_string($db, $_POST['reply_message']);
    $user_id = $_SESSION['user_id'];

    // Insert the reply into the replies table
    $query = "INSERT INTO replies (post_id, reply_message, user_id) VALUES ('$post_id', '$reply_message', '$user_id')";
    mysqli_query($db, $query);
    // Redirect to the current page to prevent resubmission
    header("Location: reply.php?post_id=$post_id");
    exit();
}

?>
<!DOCTYPE html>
<html>
<!-- <link href="assets/css/style.css" rel="stylesheet"> -->
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forum</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="image/SP-icon.png" rel="icon">
  <link href="image/SP-icon2.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">

  <!-- Template Main CSS File -->
   <!--<link href="assets/css/style.css" rel="stylesheet"> -->
 <link href="assets/css/main.css" rel="stylesheet"> 
</head>
<body>
<header id="header" class="header d-flex align-items-center">

<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <!-- Uncomment the line below if you also wish to use an image logo -->
    <!-- <img src="assets/img/logo.png" alt=""> -->
    <h1>SmartParents<span>.</span></h1>
  </a>
  <nav id="navbar" class="navbar">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li class="dropdown"><a href="index.php"><span>Parents</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
          <li><a href="threatParentMain.php">Threats</a></li>
          <li><a href="controlParentMain.php">Controls</a></li>
        </ul>
      </li>

      <li class="dropdown"><a href="#"><span>Children</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
          <li><a href="threatChildMain.php">Threats</a></li>
          <li><a href="controlChildMain.php">Controls</a></li>
        </ul>
      </li>

      <li><a href="islamization.php">Principles of Islamic Parenting</a></li>

      <li class="dropdown"><a href="quizmain.php"><span>Quiz</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>

      </li>

      <li><a href="forum.php">Forum</a></li>

      <li class="dropdown"><a href="user.php"><span>Account</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
        <li><p> <a href="user.php?logout='1'" style="color: red;">logout</a> </p></li>
          </ul>
      </li>

    </ul>
  </nav><!-- .navbar -->

  <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
  <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

</div>
</header>

<body>
      <!-- ======= Breadcrumbs ======= -->
      <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Forum Discussion</h2>
          <!--  <p>bawah main topic</p>  -->
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="forum.php">Forum</a></li>
            <li>Forum Replies</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->
    <body>
    <div class="container">
            
    <?php
    if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];

// Retrieve the post details
    $postQuery = "SELECT * FROM forum WHERE post_id = '$post_id'";  
    $postResult = mysqli_query($db, $postQuery);
    $postRow = mysqli_fetch_assoc($postResult);
   
    $topic = $postRow['topic'];
    $message = $postRow['message'];
    echo '<h3>Topic: ' . $topic . '</h3>';
    echo '<h4>' . $message . '</h4>';
    

// Retrieve the replies for the given post_id
$repliesQuery = "SELECT * FROM replies WHERE post_id = '$post_id'";
$repliesResult = mysqli_query($db, $repliesQuery);

if ($repliesResult && mysqli_num_rows($repliesResult) > 0) {
    while ($replyRow = mysqli_fetch_assoc($repliesResult)) {
        $replyId = $replyRow['reply_id'];
        $replyMessage = $replyRow['reply_message'];
        $userId = $replyRow['user_id'];

        // Retrieve the username for the given user_id
        $userQuery = "SELECT username FROM users WHERE user_id = '$userId'";
        $userResult = mysqli_query($db, $userQuery);
        $userRow = mysqli_fetch_assoc($userResult);
        $username = $userRow['username'];

        echo "<p><strong>Reply by $username:</strong></p>";
        echo "<p>$replyMessage</p>";

        // Check if the reply belongs to the current user and display delete button
        if ($_SESSION['user_id'] == $userId) {
            echo "<a class='button' href='/Impact/deleteReply.php?reply_id=$replyId'>Delete</a>";
        }
    }
    }
} else {
    echo "<p>No replies yet.</p>";
}

?>

<h4>Add Reply:</h4>
<form method="post" action="">
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
    <textarea class="form-control" id="textAreaExample" rows="4"name="reply_message" placeholder="Enter your reply"></textarea>
    <br>
    <input type="submit" name="reply" value="Reply" class="btn btn-success">
</form>
<script>
    function deleteReply(replyId) {
        if (confirm("Are you sure you want to delete this reply?")) {
            window.location.href = "delete.php?reply_id=" + replyId;
        }
    }
</script>
</div>
</div>

</html>
</body>
</div>
<footer id="footer" class="footer">

<div class="container">
  <div class="row gy-4">
	<div class="col-lg-5 col-md-12 footer-info">
	  <a href="index.html" class="logo d-flex align-items-center">
		<!--<span>Impact</span>-->
	  </a>
	  
	  <p>More information of Kulliyyah of Information Communication and Technology</p>
	  <div class="social-links d-flex mt-4">
		<a href="https://twitter.com/kictofficial?lang=en" class="twitter"><i class="bi bi-twitter"></i></a>
		<a href="https://www.facebook.com/kictofficial/" class="facebook"><i class="bi bi-facebook"></i></a>
		<a href="https://www.instagram.com/kictofficial/?hl=en" class="instagram"><i class="bi bi-instagram"></i></a>
		<!--<a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> -->
	  </div>
	</div>

	<div class="col-lg-2 col-6 footer-links">
		<!--
	  <h4>Useful Links</h4>
	  <ul>
		<li><a href="#">Home</a></li>
		<li><a href="#">About us</a></li>
		<li><a href="#">Services</a></li>
		<li><a href="#">Terms of service</a></li>
		<li><a href="#">Privacy policy</a></li>
	  </ul> -->
	</div>
	
	<div class="col-lg-2 col-md-12 footer-contact text-center text-md-start"">
	<h4>Contact Us</h4>
	  <p>
		Nur Syazwani<br>
		1929958<br>
		Pahang<br><br>
	   <!-- <strong>Phone:</strong> +1 5589 55488 55<br> -->
		<strong>Email:</strong> wani182437@gmail.com<br>
	  </p>
	</div> 

	<div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
	  <h4>Contact Us</h4>
	  <p>
		Nur Aiena Hajeerah<br>
		1925620<br>
		Selangor<br><br>
	   <!-- <strong>Phone:</strong> +1 5589 55488 55<br> -->
		<strong>Email:</strong> aienahajeerah@gmail.com<br>
	  </p>

	</div>

  </div>
</div>

<div class="container mt-4">
  <div class="copyright">
	&copy; Copyright <strong><span>International Islamic University Malaysia</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
	<!-- All the links in the footer should remain intact. -->
	<!-- You can delete the links only if you purchased the pro version. -->
	<!-- Licensing information: https://bootstrapmade.com/license/ -->
	<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/impact-bootstrap-business-website-template/ -->
   <!--Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
  </div>
</div>
</footer><!-- End Footer -->
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>