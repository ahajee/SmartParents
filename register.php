<?php 

include 'functions.php';
  include 'connect.php';  
//  session_start(); //

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    header('Location: user.php'); // Redirect to the main page
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Perform registration and validate user data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Your registration logic goes here
    // ...

    // If registration is successful, set the user_id session variable
    $_SESSION['user_id'] = $user_Id;

    // Redirect to the main page
    header('Location: user.php');
    exit();
}
?>


<!DOCTYPE html>
<html>
<!-- <link href="assets/css/style.css" rel="stylesheet"> -->
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registration</title>
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

  <!-- Template Main CSS File -->
  <section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3"> 
    <div class="container h-110">
      <div class="row d-flex justify-content-center align-items-center h-100"> 
        <div class="col-12 col-md-9 col-lg-7 col-xl-6"> 
        <div class="card" style="border-radius: 15px;"> 
            <div class="card-body p-5 mb-3">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form method="POST" action="register.php">
              <?php include('error.php'); ?>
                <div class="input-group">
                <div class="form-outline mb-4">
                  <input type="text" name="username" value="<?php echo $username; ?>" id="form3Example1cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Username</label>
                </div>

                <div class="form-outline mb-4" class="input-group">
                  <input type="email" name="email" value="<?php echo $email; ?>" id="form3Example3cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Email</label>
                </div> <br><br>
                
                <div class="form-outline mb-4" class="input-group">
                  <input type="password" name="password_1" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div> 

                <div class="form-outline mb-4" class="input-group">
                  <input type="password" name="password_2" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Confirm Password</label>
                </div> 

                <div class="input-group" >
                  <button type="submit"  name="reg_user"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>
                <p class="text-center text-muted mt-0 mb-0">Have already an account? <a href="signin.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div> 
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">

<!-- <div class="container">
  <div class="row gy-4">
	<div class="col-lg-5 col-md-12 footer-info">
	  <a href="index.html"class="logo d-flex align-items-center">
		<!--<span>Impact</span>-->
	  </a>
	  
	 
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
	
	<!-- <div class="col-lg-2 col-md-12 footer-contact text-center text-md-start"">
	<h4>Contact Us</h4>
	  <p>
		Nur Syazwani<br>
		1929958<br>
		Pahang<br><br>
	   <!-- <strong>Phone:</strong> +1 5589 55488 55<br> -->
	<!--	<strong>Email:</strong> wani182437@gmail.com<br>
	  </p>
	</div> 

<!--	<div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
	  <h4>Contact Us</h4>
	  <p>
		Nur Aiena Hajeerah<br>
		1925620<br>
		Selangor<br><br>
	   <!-- <strong>Phone:</strong> +1 5589 55488 55<br> -->
	<!--	<strong>Email:</strong> aienahajeerah@gmail.com<br>
	  </p>

	</div>

  </div>
</div> -->

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
