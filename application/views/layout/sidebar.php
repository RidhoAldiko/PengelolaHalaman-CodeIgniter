<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>
    <?= $title; ?>
</title>
<!-- Favicon -->
<link href="<?= base_url();?>assets/img/brand/favicon.png" rel="icon" type="image/png">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<!-- Icons -->
<link href="<?= base_url();?>assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
<link href="<?= base_url();?>assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
<!-- CSS Files -->
<link href="<?= base_url();?>assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="">

<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand pt-0"  target="_blank" href="https://alfazzasoftware.id/">
        <img src="<?= base_url();?>assets/img/brand/logo.png" class="navbar-brand-img" alt="...">
    </a>
    <!-- User -->
    <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="<?= base_url();?>assets/img/theme/Ridho.jpg">
            </span>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">Hello!</h6>
            </div>
            <a href="https://instagram.com/ridhoaldiko.tar.xz"  target="_blank" class="dropdown-item">
            <i class="ni ni-single-02"></i>
            <span>My profile</span>
            </a>
        </div>
        </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
        <div class="row">
            <div class="col-6 collapse-brand">
            <a href="#">
                <img src="<?= base_url();?>assets/img/brand/logo.png">
            </a>
            </div>
            <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
            </button>
            </div>
        </div>
        </div>
        <!-- Navigation -->
        <ul class="navbar-nav">
        <li class="nav-item active">
        <a class=" nav-link " href="<?= base_url(); ?>"> <i class="ni ni-tv-2 text-primary"></i> Manajemen Halaman
            </a>
        </li>
        <?php foreach ($publish_pages as $pp) : ?>
        <li class="nav-item active">
        <a class="nav-link" href="<?= $pp['url']; ?>"> <i class="<?= $pp['icon']; ?> text-primary"></i><?= $pp['title']; ?>
            </a>
        </li>
        <?php endforeach ?>
        <li class="nav-item">
            <a class="nav-link " href="https://github.com/RidhoAldiko/PengelolaHalaman"  target="_blank">
            <i class="fas fa-file-alt text-primary"></i> Dokumentasi GitHub
            </a>
        </li>
        </ul>
    </div>
    </div>
</nav>
