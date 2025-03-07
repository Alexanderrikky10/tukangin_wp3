<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/') ?>img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/') ?>img/logo-1.png" />
    <title>Tukangin | <?= $title ?></title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url('assets/') ?>css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url('assets/') ?>css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/ffd9f53239.js" crossorigin="anonymous"></script>


    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('assets/') ?>/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>

    <?= $konten ?>
    <!--   Core JS Files   -->
    <script src="<?= base_url('assets/') ?>js/core/popper.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/core/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('assets/') ?>js/plugins/smooth-scrollbar.min.js"></script>
    <script script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var win = navigator.platform.indexOf("Win") > -1;
        if (win && document.querySelector("#sidenav-scrollbar")) {
            var options = {
                damping: "0.5",
            };
            Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.alert-message').alert().delay(1500).slideUp('slow');
        });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url('assets/') ?>js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>