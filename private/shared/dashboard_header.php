<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dokaner Hisab</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= url_for('assets/dashboard_assets/plugins/fontawesome-free/css/all.min.css') ?>" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= url_for('assets/dashboard_assets/css/adminlte.min.css') ?>" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#" aria-expanded="false">
                        <img class="img-circle mr-2" width="35" src="<?= url_for('assets/dashboard_assets/images/avatar.png') ?>" alt="">
                        <span>Tohir Raihan</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <a href="#" class="dropdown-item">
                            <span class="text-muted">Change password</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <span class="text-muted">Logout</span>
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->
