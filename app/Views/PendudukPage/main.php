<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!--  <link href="--><?php //= base_url() ?><!--assets-penduduk/img/favicon.png" rel="icon">-->
    <!--  <link href="--><?php //= base_url() ?><!--assets-penduduk/img/apple-touch-icon.png" rel="apple-touch-icon">-->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/fontawesome-6.5.1/css/fontawesome.css"">
    <link href="<?= base_url() ?>assets-penduduk/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets-penduduk/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets-penduduk/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets-penduduk/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets-penduduk/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets-penduduk/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: SoftLand
    * Updated: Sep 18 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <h1><a href=""><?= $title ?></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets-penduduk/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <!-- <li><a class="active " href="index.html">Home</a></li>
                <li><a href="features.html">Features</a></li>
                <li><a href="pricing.html">Pricing</a></li> -->
                <li><a href="#">Nama Desa</a></li>
                <li><a href="#"><span>Tentang</span></a></li>
                <!--<ul>
                    <li><a href="#">Drop Down 1</a></li>
                    <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                      <ul>
                        <li><a href="#">Deep Drop Down 1</a></li>
                        <li><a href="#">Deep Drop Down 2</a></li>
                        <li><a href="#">Deep Drop Down 3</a></li>
                        <li><a href="#">Deep Drop Down 4</a></li>
                        <li><a href="#">Deep Drop Down 5</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Drop Down 2</a></li>
                    <li><a href="#">Drop Down 3</a></li>
                    <li><a href="#">Drop Down 4</a></li>
                  </ul>
                </li> -->
                <li><a href="<?= site_url('/') ?>">Login</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

    </div>
</header>
<!-- End Header -->

<main>

    <?= $this->renderSection('content') ?>

</main>
<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                    <h3>Tentang</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus pariatur, numquam aperiam
                    dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti minus animi.</p>
                <p class="social">
                    <a href="#"><span class="bi bi-twitter"></span></a>
                    <a href="#"><span class="bi bi-facebook"></span></a>
                    <a href="#"><span class="bi bi-instagram"></span></a>
                    <a href="#"><span class="bi bi-linkedin"></span></a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets-penduduk/js/main.js"></script>
<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets-penduduk/vendor/aos/aos.js"></script>
<script src="<?= base_url() ?>assets-penduduk/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets-penduduk/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets-penduduk/vendor/php-email-form/validate.js"></script>

</body>

</html>