<?php 
include 'connect.php';
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>User</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Impact
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <!-- 
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>End Top Bar -->
 

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>SmartParents|Admin<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
        <li><a href="Admin_index.php">Home</a></li>
          <li><a href="usermng.php">Users</a></li>
          <li><a href="forumMng.php">Forum</a></li>
          <li><p> <a href="forumMng.php?logout='1'" style="color: red;">logout</a> </p></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
<body>

<div class="header">
</div>
<div class="container">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

      <div class="container">
      <div class="container">
    <h3>Manage Forum Post</h3>
    </div>
<div class="container">
<table>
<tbody>
    <?php
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
    $sql = "SELECT forum.post_id, forum.topic, forum.message, users.username 
    FROM forum 
    JOIN users ON forum.user_id = users.user_id";
$result = mysqli_query($connection, $sql);
if ($result) {
// Loop through the forum posts
echo"<br>";

while ($row = mysqli_fetch_assoc($result)) {
  echo '<span style="font-weight: bold;">Post ID:</span> ' . $row['post_id'] . "<br>";
    echo '<span style="font-weight: bold;">User:</span> ' . $row['username'] . "<br>";
    echo '<span style="font-weight: bold;">Topic:</span> ' . $row['topic'] . "<br>";
    echo '<span style="font-weight: bold;">Message:</span> ' . $row['message'] . "<br><br>";
    echo "<a class= 'btn btn-danger' href='/Impact/admin_delete.php?post_id=$row[post_id]'>Delete</a>";
    echo "<br><br>";
    // Display replies for the current forum post
    $post_id = $row['post_id'];
    //$reply_id = $row['reply_id'];

    $reply_query = "SELECT replies.reply_id, replies.reply_message, users.username 
                    FROM replies 
                    JOIN users ON replies.user_id = users.user_id 
                    WHERE replies.post_id = $post_id";
    $reply_result = mysqli_query($connection, $reply_query);
    
    if ($reply_result) {
        //$replyId = $_POST['reply_id'];
        // Loop through the replies
        while ($reply_row = mysqli_fetch_assoc($reply_result)) {
            
            echo '<span style="font-weight: bold;">Reply by:</span> ' . $reply_row['username'] . "<br>";
            echo '<span style="font-weight: bold;">Reply:</span> ' . $reply_row['reply_message'] ;
           //echo "<a class='' href='/Impact/admin_deleteReply.php?reply_id=$row[reply_id]'>Delete</a>";
           echo "<a class= 'btn btn-link' href='/Impact/admin_deleteReply.php?post_id=$row[post_id]'>Delete</a>";
            echo "<br><br>";
    
        }
        
    } else {
        echo "Error fetching replies: " . mysqli_error($connection);
    }
    
    echo "<br><br>";
}
} else {
echo "Error fetching forum posts: " . mysqli_error($connection);
}

?>
</div>
</tbody>
</table>
</div>
</div>


	  </div>	
 <!-- ======= Footer ======= -->
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
