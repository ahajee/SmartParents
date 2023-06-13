<?php 
include('functions.php');
//session_start(); 

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: signin.php'); // Redirect to the login page
  exit();
}

// Handle the form submission (for replying to a post)
if (isset($_POST['reply_submit'])) {
  $message = mysqli_real_escape_string($db, $_POST['reply_message']);
  $user_id = $_SESSION['user_id'];
  $post_id = $_POST['post_id'];

  // Insert the reply into the database
  $query = "INSERT INTO replies (message, user_id, post_id) VALUES ('$message', '$user_id', '$post_id')";
  mysqli_query($db, $query);

  // Redirect to the forum post display page
  header('Location: forum.php');
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

      <li class="dropdown"><a href="user.php"><span>Account</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li> <a href="user.php?logout='1'" style="color: red;">logout</a> </p>
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
            <li>Forum Discussion</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->
</div>
</div>
<br>
<div class="container">
<div class="row">
    <div class="col-md-auto">
	<div class="input-group">
    <form method="get" action="forum.php">
  <input type="text" class="form-control rounded" placeholder="Search" 
  role ="search" aria-describedby="search-addon" name="keyword" />
  <button type="submit" class="btn btn-outline-primary">search</button>
</form>
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
if (isset($_GET['keyword'])) {
  $keyword = mysqli_real_escape_string($connection, $_GET['keyword']);
  $sql = "SELECT * FROM forum WHERE topic LIKE '%$keyword%'";
  $result = mysqli_query($connection, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<span style="font-weight: bold;">Topic:</span> ' . $row['topic'] . "<br>";
      echo '<span style="font-weight: bold;">Message:</span> ' . $row['message'] . "<br><br>";
      echo '<button class="btn btn-success"><a href="reply.php?post_id=' . $row['post_id'] . '">+ Reply</a></button>';
      echo'&nbsp;&nbsp;&nbsp;';
      if ($_SESSION['user_id'] == $row['user_id']) {
        "&nbsp";echo '<a class="btn btn-danger" href="/Impact/delete.php?post_id=' . $row['post_id'] . '">Delete</a>';
      }
      echo '<br><br>';
    
    }
  } else {
    echo "No results found.";
  }
}
?>
</div>

	<div class="col md-auto" >
	<button class="button3"><a href="forum_add.php"
	 type="submit"  name="button"><a href="forum_add.php"
	>Add Topic</a></button>
</div>

</div>
</div>
  
<div class="container">		
	<div class="row">		


	<tbody>
		<div class=container>
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
     // Fetch data from both tables using a JOIN query
  
       // Construct the SQL query to search for posts
       $sql = "SELECT forum.post_id, forum.topic, forum.message, users.username, forum.user_id 
        FROM forum 
        JOIN users ON forum.user_id = users.user_id";
$result = mysqli_query($connection, $sql);

if ($result) {
  // Loop through the result set
  while ($row = mysqli_fetch_assoc($result)) {
    $user_id = $row['user_id'];
    echo '<span style="font-weight: bold;">User:</span> ' . $row['username'] . "<br>";
    echo '<span style="font-weight: bold;">Topic:</span> ' . $row['topic'] . "<br>";
    echo '<span style="font-weight: bold;">Message:</span> ' . $row['message'] . "<br><br>";

    echo '<button class="btn btn-success">';
    echo '<a href="reply.php?post_id=' . $row['post_id'] . '">+ Reply</a>';
    echo '</button>';
    echo'&nbsp;&nbsp;&nbsp;';
    if ($_SESSION['user_id'] == $user_id) {
      echo "<a class='btn btn-danger' href='/Impact/delete.php?post_id=" . $row['post_id'] . "'>Delete</a>";

    }

  

    echo '<br><br>';
  }
} else {
  echo "Error fetching data: " . mysqli_error($connection);
}



?>
<script>
    function deletePost(postId) {
        if (confirm("Are you sure you want to delete this post?")) {
            window.location.href = "delete.php?post_id=" + postId;
        }
    }
</script>

</div>
	</div>		
</div>
	</div>


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