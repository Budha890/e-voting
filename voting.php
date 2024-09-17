<?php 
session_start();
require 'function.php';
if(!isLoggedIn()['role']=='voter' ){
   header('location:login.php');
   die();
}
require_once("evoting.php");
$getCandidates = new evoting($connection);

$getAll = $getCandidates->getVoterDetails();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Online Voting System</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

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
    <style>
        /* Center the form container */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
          
        }

        /* Add some padding to the form */
        .form-container .col-sm-6 {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
    </style>

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid  position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename"><span style="color:purple;"> Online</span> <span style="color:red; font-weight:600;"> Voting<span> </h1>
            </a>
            <h1 class="card-title"><span style="color: purple; float: right;margin-right: 62px; font-size: medium;"> Hi ,<?php echo isLoggedIn()['fname']; ?></span>  </h1>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.html" class="active">Home</a></li>
                    <li><a href="about.html">About</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php">Logout</a></li>
                   
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">
        <div class="container form-container">
        <div class="row" style="  overflow-y: scroll;">
        <div class="col-sm-8 offset-2">
        <h2 class="text-center" style="color: green;">Vote For Right Person </h2>
      
        </div>
        <div class="row">
        <div class="card mb-3">

  <?php
foreach ($getAll as $key => $value){?>

<div class="row">
    <div class="col-md-3" style="margin-top: 25px;">
      <img src="<?php echo $value['img_url'];?>" class="img-fluid"  width='200' height='200' style="border-radius:52px">
    </div>
    <div class="col-md-5">
      <div class="card-body">
        <h5 class="card-title">Name : <?php  echo $value['name'];?></h5>
        <p class="card-text">Political Party : <?php  echo $value['party'];?></p>
        <p class="card-text">Address : <?php  echo $value['Address'];?></p>
        <p class="card-text"><small class="btn btn-success">Vote </small></p>
      </div>
    </div>
    <div class="col-md-2" style="margin-top: 25px;" >
   
      
      <?php  if($value['party'] == 'NC'){ ?> 
        <img src="assets/img/hand.png" class="img-fluid"  width='200' height='200' style="border-radius:52px">
        <?php }?>
        <?php  if($value['party'] == 'CP'){ ?> 
        <img src="assets/img/light.png" class="img-fluid"  width='200' height='200' style="border-radius:52px">
        <?php }?>
        <?php  if($value['party'] == 'AP'){ ?> 
        <img src="assets/img/elep.png" class="img-fluid"  width='200' height='200' style="border-radius:52px">
        <?php }?>
        <?php  if($value['party'] == 'DP'){ ?> 
        <img src="assets/img/elep.png" class="img-fluid"  width='200' height='200' style="border-radius:52px">
        <?php }?>
      
      
     
    </div>
  </div>
  <hr>

<?php }?>
  
</div>
        </div>
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