<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SmartParents</title>
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
          <li><a href="quizmain.php">Quiz</a></li>

          
          <li><a href="forum.php">Forum</a></li>
 

          <li class="dropdown"><a href="user.php"><span>Account</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
            <?php if (isset($_SESSION["logged_in"])): ?>
              <li> <a href="user.php?logout='1'" style="color: red;">logout</a> </p><?php endif; ?>
              <li><a href="signin.php">Sign In</a></li>        
              <li><a href="register.php">Register</a></li>
              </ul>
          </li>

        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Welcome to SmartParents <span>Web Application</span></h2>
          <p>A cybersecurity awareness web application madely for parents. A platform to empower parents to protect themselves and their children from cyber threats.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="threatParentMain.php" class="btn-get-started">Get Started</a>
            <!--<a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>--!>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div> -->

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-easel"></i></div>
              <h4 class="title"><a href="#services" class="stretched-link">Articles</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-gem"></i></div>
              <h4 class="title"><a href="signin.php" class="stretched-link">Quiz</a></h4>
            </div>
          </div><!--End Icon Box -->


          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-command"></i></div>
              <h4 class="title"><a href="signin.php" class="stretched-link">Forum</a></h4>
            </div>
          </div><!--End Icon Box -->

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>What SmartParents can offer</h2>
          <p>SmartParents is intended for parents to understand the importance of cybersecurity as well as giving guidance on how to use and manage the Internet wisely.
            Not just that, this will be a platform for them to have discussion with other parents about cybersecurity.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-6">
            <h3>Undertand the importance of cyber safety and security among parents and children</h3>
            <img src="image/dadcom.jpg" class="img-fluid rounded-4 mb-4" alt="">
            <p></p>
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Three main objective of SmartParents are:
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i>To help parents understand the importance of cybersecurity.</li>
                <li><i class="bi bi-check-circle-fill"></i>To help parents to solve issues on social media, address problems of oversharing family content and gaming addiction.</li>
                <li><i class="bi bi-check-circle-fill"></i>To have discussion with parents about cybersecurity and cyber safety.</li>
              </ul>
              <p>
              </p>

              <div class="position-relative mt-4">
                <img src="image/forum.jpg" class="img-fluid rounded-4" alt="">
                <!--<a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>-->
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Clients Section ======= -->


    <!-- ======= Our Services Section ======= -->
    <section id="services" class="services sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Related Articles</h2>
          <p></p>
        </div>

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="bi bi-heart"></i>
              </div>
              <h3>Guide to a family-friendly Internet experience</h3>
              <p>Cybersecurity program brought by Digi and Cybersecurity Malaysia.</p>
              <a href="https://www.kpwkm.gov.my/kpwkm/uploads/files/Muat%20Turun/Guide%20for%20a%20family%20friendly%20Internet%20experience%20(1)(1).pdf" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-person-hearts"></i>
              </div>
              <h3>Buku Panduan Keibubapaan Siber</h3>
              <p>Guidebook of cyber parenting by Cybersecurity Malaysia.</p>
              <a href="https://www.cybersafe.my/en/download/Buku_Panduan_Keibubapaan_Siber_BM.pdf" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-shield-check"></i>
              </div>
              <h3>Cybersafety: Keeping Teenagers and Children Safe Online</h3>
              <p>Guidebook for teachers and parents.</p>
              <a href="https://www.wccpenang.org/wp-content/uploads/2021/09/FINAL-LOW-RES-Cybersafety-Handbook.pdf" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->


  </main><!-- End #main -->

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
