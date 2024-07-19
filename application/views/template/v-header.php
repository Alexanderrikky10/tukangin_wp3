<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Tukangin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/') ?>img/logo-1.png" rel="icon">
    <link href="<?= base_url('assets/') ?>img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= base_url('assets/') ?>css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: UpConstruction
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="<?= base_url('assets/') ?>img/logo-1.png" alt="">
                <h1 class="sitename">Tukangin</h1> <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li>
                        <a class="<?php if ($title == 'Home') {
                                        echo "active";
                                    }  ?>" href="<?= base_url('tukangin/home') ?>">Home</a>
                    </li>
                    <li>
                        <a class="<?php if ($title == 'About') {
                                        echo "active";
                                    }  ?>" href="<?= base_url('tukangin/about') ?>">About</a>
                    </li>

                    <li>
                        <a class="<?php if ($title == 'Services') {
                                        echo "active";
                                    }  ?>" href="<?= base_url('tukangin/services') ?>">Service</a>
                    </li>

                    <li>
                        <a class="<?php if ($title == 'Project') {
                                        echo "active";
                                    }  ?>" href="<?= base_url('tukangin/project') ?>">Projects</a>
                    </li>
                    <li>
                        <a class="<?php if ($title == 'Blog') {
                                        echo "active";
                                    }  ?>" href="<?= base_url('tukangin/blog') ?>">Blog</a>
                    </li>
                    <li>
                        <a class="<?php if ($title == 'Contact') {
                                        echo "active";
                                    }  ?>" href="<?= base_url('tukangin/contact') ?>">Contact</a>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>