<?php
  if( !isset( $public ) && !isset( $this->session->uid ) ) {
    redirect( "/" );
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Alumni STMIK KHARISMA Makassar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="alumni, stmik kharisma, makassar, perguruan tinggi, sekolah tinggi, mitra, perusahaan, lowongan kerja">
  <meta name="description" content="Layanan Alumni STMIK KHARISMA Makassar, menjembatani komunikasi antara Alumni, Almamater, dan Perusahaan Mitra selaku Stakeholder, tiga unsur yang harus selalu bersinergi guna perbaikan dan peningkatan kualitas lulusan STMIK KHARISMA dan Pendidikan Tinggi Indonesia pada umumnya.">

  <!-- Favicons -->
  <link href="/assets/img/favicon.ico" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="/assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="/assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/assets/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="/assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="/assets/css/bootstrap-datepicker.css" rel="stylesheet">
  <link href="/assets/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
  <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" >
  <!-- Main Stylesheet File -->
  <link href="/assets/css/style.css" rel="stylesheet">


  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
  <!-- <script src="/assets/lib/jquery/jquery.min.js"></script> -->
  <!-- <script src="/assets/lib/jquery/jquery-migrate.min.js"></script> -->

  <script src="/assets/js/jquery-3.3.1.min.js"></script>
  <script src="/assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="/assets/js/jquery.dataTables.js" type="text/javascript" charset="utf8"></script>
</head>

<body id="body">
  <!--==========================
    Top Bar
  ============================-->
  <!-- <section id="topbar" class="d-none d-lg-block"> -->
    <!-- <div class="container clearfix"> -->
      <!-- <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="fa fa-phone"></i> +1 5589 55488 55
      </div> -->
      <!-- <div class="social-links float-right">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
      </div>
    </div>
  </section> -->

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="/#body" class="scrollto"><span>Alumni</span> KHARISMA</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="/assets/img/logo.png" alt="" title="" /></a> -->
      </div>

      <?php
        $this->load->view('layout/nav');
       ?>

    </div>
  </header><!-- #header -->
