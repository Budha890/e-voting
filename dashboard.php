<?php 

session_start();
require 'function.php';

if(!isLoggedIn()['role']=='admin'){
   header('location:index.php');
   
   die();
}

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
                   
            
                    <li><a href="Logout.php">Logout</a></li>
                
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">
            <div class="container form-container">
                <div class="col-sm-6">
                    <legend style="color: green; font-size: 12px !important;"><?php if (isset($_GET['alert'])) {
                                                                                    echo $_GET['alert'];
                                                                                } ?></legend>
                    <h2 class="text-center">Upload Candidate Details : </h2>
                    <form action="action.php?form=candidateForm" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="cname">Candidate Name:</label>
                            <input type="text" class="form-control" id="cname" name="cname" required>
                        </div>

                        <div class="form-group">
                            <label for="pname">Political Party Name:</label>
                            <select class="form-control" name="pname">
                                <option value="NC">NC</option>
                                <option value="CP">CP</option>
                                <option value="AP">AP</option>
                                <option value="DP">DP</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="text" class="form-control" id="contact" name="contact" required>
                        </div>

                        <div class="form-group">
                            <label for="cimg">Image:</label>
                            <input type="file" class="form-control" id="cimg" name="cimg" required>
                        </div>

                        <input type="submit" class="btn btn-primary btn-block" value="Create" name="btn_create_candidate" style="margin-top:12px;">
                    </form>

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