<?php include('functions.php') ;
  include 'connect.php';  
  //  session_start(); //
  
  // Check if the user is already logged in
  if (isset($_SESSION['user_id'])) {
      header('Location: user.php'); // Redirect to the main page
      exit();
  }
  ?>


<!DOCTYPE html>
<html>
<!-- <link href="assets/css/style.css" rel="stylesheet"> -->
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sign In</title>
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
  <!DOCTYPE html>
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

      </li>

      <li><a href="forum.php">Forum</a></li>

      <li class="dropdown"><a href="forum.php"><span>Account</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
          <li><a href="signin.php">Sign In</a></li>
          <li><a href="register.php">Register</a></li>
          </ul>
      </li>

    </ul>
  </nav><!-- .navbar -->

  <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
  <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

</div>
</header>

<form method="post" action="login.php">
    </form> 
	<div class="card mb-3">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="image/postt.png" alt="smartParents"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>

      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">
		<h2> Sign In </h2>
          <form method="post" action="signin.php">
            <!-- Email input -->
            <div class="form-outline mb-4" class="input-group">
              <input type="text" name="username" id="form2Example1" class="form-control" />
              <label class="form-label" for="form2Example1">Username </label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4" class="input-group">
              <input type="password" name="password" id="form2Example2" class="form-control" />
              <label class="form-label" for="form2Example2">Password</label>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <!--<div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                  <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>-->
              </div>

              <div class="col">
                <!-- Simple link -->
                <a href="register.php">Not Registered?</a>
              </div>
            </div>

            <!-- Submit button -->
            <div class="input-group">
            <button type="submit" name="login_btn" class="btn btn-primary btn-block mb-4">Sign in</button>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>
</body>

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
