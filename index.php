<?php
session_start();

require_once("evoting.php");
$getVoteCount = new evoting($connection);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>online Voting System</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">







  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid  position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename" style="color: green;">Online Voting System</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>



          <?php if (isset($_SESSION['userid'])) { ?>
            <li><a href="logout.php">Logout</a></li> <?php } else { ?>
            <li><a href="register.php">Register</a></li>
          <?php } ?>


        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">


    <section id="portfolio" class="portfolio section">

      <div class="container">

        <div class="isotope-layout" data-default-filter=".main" data-layout="masonry" data-sort="original-order">




          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200" style="position: relative; height: 1344px;">

            <div class="col-lg-8 offset-2 portfolio-item isotope-item main" style="position: absolute; left: 0px; top: 0px;">


              <legend style=" color:green; text-align: center;">Live Vote Count Result </legend> <span style="color: blue;"> Location : Dipayal-Silgahdi</span>
              <hr>
              <table class="table  table-striped table-light caption-top">
                <thead>
                  <caption>List of Candidate : <span style="color: green; float:right;"> Total Vote Count : <?php echo $getVoteCount->totalVoteCount()[0]['TotalVotes']; ?> </span></caption>
                  <tr>
                    <th scope="col">SN</th>
                    <th scope="col">CandidateName</th>
                    <th scope="col">Party</th>
                    <th scope="col">Vote</th>
                  </tr>
                </thead>
                <tbody>

                  <?php $i = 1;
                  foreach ($getVoteCount->VoteCountDetails() as $k => $v) { ?>
                    <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $v['CandidateName']; ?></td>
                      <td><?php echo $v['Party']; ?></td>
                      <td><?php echo $v['Vote']; ?></td>
                    </tr>

                  <?php } ?>


                </tbody>
              </table>
            </div>
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app" style="position: absolute; left: 0px; top: 0px;">
              <div class="portfolio-content h-100" style="text-align: center;">
                <img src="assets/img/portfolio/app-3.jpg" class="img-fluid" width="200" height="200" style="border-radius: 78px;">
                <div class="portfolio-custom" style="padding: 20px;">
                  <h4>John MArk</h4>
                  <p>USA , LA ,10010</p>

                </div>
              </div>
            </div><!-- End Portfolio Item -->
          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->





  </main>

  <footer id="footer" class="footer light-background">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Online voting</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
      <div class="credits">

        Designed by <a href="#">DMC BCA</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>