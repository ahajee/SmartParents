<?php 
  //session_start(); 
  include 'connect.php';
  include 'functions.php';

  if (!isset($_SESSION['user_id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: signin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: signin.php");
  }
  if (isset($_POST['update'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    if (count($errors) == 0) {
        $password = md5($password_1);}
  
    // Update the user information in the database
    $query = "UPDATE users SET username='$username', email='$email',user_type='user', password='$password' WHERE user_id = $_SESSION[user_id]";
    $result = mysqli_query($connection, $query);
  
    if ($result) {
      // Redirect to a success page or display a success message
      header("Location: profile_setting.php?success=1");
      exit();
    } else {
      // Handle the error if the update query fails
      echo "Error updating user information: " . mysqli_error($connection);
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>User Profile</title>
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
        <h1>SmartParents<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="dropdown"><a href="#"><span>Parents</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
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
            <ul>
              <li><a href="#">Parents</a></li>
              <li><a href="#">Children</a></li>
            </ul>
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


	
</div>
<?php
$query = "SELECT * FROM users WHERE user_id = $_SESSION[user_id]";
$result = mysqli_query($connection, $query);
$userData = mysqli_fetch_assoc($result);

// Store the current user data in variables
$username = $userData['username'];
$email = $userData['email'];
?>
<section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">
        
        <div class="section-header">
		<?php  if (isset($_SESSION['username'])) : ?> 
        <h3><strong><?php echo $username; ?></strong></h3>
        <h4>current username <strong><?php echo $username; ?></h4></strong>
        <h4>current email <strong> <?php echo $email; ?></h4></strong>
		<?php endif ?>
            <br>
        <div class="container">
    <h3>Edit Profile</h3>
  	<hr>
	<div class="row">
      
      <!-- edit form column -->
      <div class="container">
        <div class="row">
        <div class="col">

        <h3>Personal info</h3>
        <form method="POST" action="profile_setting.php">
  <label for="username">Username:</label>
  <input type="text" name="username" value="<?php echo $username; ?>" required>

  <label for="email">Email:</label>
  <input type="email" name="email" value="<?php echo $email; ?>" required>

  <label for="password">Password:</label>
  <input type="password" name="password" required>

  <input type="submit" name="update" value="Update Profile">
</form>

        </form>
        </div>
        </div>
      </div>
        </div>
        </div>
  </div>
</div>
<hr>
        </div>

      </div>
    </section><!-- End Our Services Section -->

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
