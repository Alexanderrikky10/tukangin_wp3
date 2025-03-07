<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Tukangin | <?= $title ?></title>
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

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="<?= base_url('assets/') ?>img/logo-1.png" alt="">
                <h1 class="sitename">Tukangin</h1> <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li>
                        <a class="<?php if ($title == 'Home') {
                                        echo 'active';
                                    } ?>" href="<?= base_url('tukangin/home') ?>">Home</a>
                    </li>
                    <li>
                        <a class="<?php if ($title == 'About') {
                                        echo 'active';
                                    } ?>" href="<?= base_url('tukangin/about') ?>">About</a>
                    </li>
                    <li>
                        <a class="<?php if ($title == 'Services') {
                                        echo 'active';
                                    } ?>" href="<?= base_url('tukangin/services') ?>">Service</a>
                    </li>
                    <li>
                        <a class="<?php if ($title == 'Project') {
                                        echo 'active';
                                    } ?>" href="<?= base_url('tukangin/project') ?>">Projects</a>
                    </li>
                    <li>
                        <a class="<?php if ($title == 'Contact') {
                                        echo 'active';
                                    } ?>" href="<?= base_url('tukangin/contact') ?>">Contact</a>
                    </li>
                    <li class="dropdown ms-5">
                        <a>
                            <span>
                                <?php if ($this->session->userdata('email')): ?>
                                    <?= $user['name']; ?>
                                <?php else: ?>
                                    Join Now
                                <?php endif; ?>
                            </span>
                            <img
                                class="img-profile rounded-circle ms-2"
                                height="30"
                                width="30"
                                src="<?= $this->session->userdata('email')
                                            ? base_url('assets/img/profile/') . $user['image']
                                            : base_url('assets/img/profile/default.jpg') ?>" />
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul class="list-unstyled">
                            <?php if ($this->session->userdata('email')): ?>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-2" href="<?= base_url('user/profile') ?>">
                                        <i class="bi bi-person-circle me-2 text-primary fs-5"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-2" href="<?= base_url('auth/logout') ?>">
                                        <i class="bi bi-box-arrow-right me-2 text-danger fs-5"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-2" href="<?= base_url('auth') ?>">
                                        <i class="bi bi-box-arrow-in-right me-2 text-success fs-5"></i>
                                        <span>Login</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center py-2" href="<?= base_url('auth/register') ?>">
                                        <i class="bi bi-pencil-square me-2 text-warning fs-5"></i>
                                        <span>Register</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>

                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>