<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Mitra Kerja Sama</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url() ?>assets/front-user/img/logo_kabmalang.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/front-user/img/logo_kabmalang.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() ?>assets/front-user/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/front-user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/front-user/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/front-user/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/front-user/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url() ?>assets/front-user/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <!-- =======================================================
  * Template Name: eStartup - v4.3.0
  * Template URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div id="logo">
                <h1><a href="index.html">Mitra Kerja Sama</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="<?php echo base_url() ?>assets/front-user/img/logo.png" alt="" title="" /></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>

                    <?php $link = "#hero";
                    if ($this->input->get('year')) $link = base_url($link); ?>
                    <li><a class="nav-link scrollto active" href="<?php echo $link ?>">Home</a></li>


                    <?php $link = "#get-started";
                    if ($this->input->get('year')) $link = base_url($link); ?>
                    <li><a class="nav-link scrollto" href="<?php echo $link ?>">About</a></li>

                    <?php $link = "#proses";
                    if ($this->input->get('year')) $link = base_url($link); ?>
                    <li><a class="nav-link scrollto" href="<?php echo $link ?>">Proses Kerjasama</a></li>


                    <?php $link = "#screenshots";
                    if ($this->input->get('year')) $link = base_url($link); ?>
                    <li><a class="nav-link scrollto" href="<?php echo $link ?>">Perpanjangan Kerjasama</a></li>
                    <li class="dropdown"><a href="#"><span>Daftar Kerjasama</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <?php

                            $tahunSekarang = date('y');
                            $start = 18;
                            for ($thn = $start; $thn <= intval($tahunSekarang); $thn++) {

                                echo '<li><a href="' . base_url('kerjasama?year=20' . $thn) . '">Tahun 20' . $thn . '</a></li>';
                            }
                            ?>

                        </ul>
                    </li>

                    <?php $link = "#contact";
                    if ($this->input->get('year')) $link = base_url($link); ?>
                    <li><a class="nav-link scrollto" href="<?php echo $link ?>">Contact</a></li>

                    <!-- Login -->
                    <li><a class="nav-link scrollto" href="<?= base_url('auth') ?>">Login</a></li>


                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->