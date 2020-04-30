<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
    <title>Posyandu</title>
</head>

<body>
    <div class="container-body">
        <nav class="navbar navbar-inverse nav-color">
            <div class="container-fluid nav-con">
                <div class="navbar-header">
                    <a class="navbar-brand nav-txt-color" href="<?php echo base_url(); ?>">Posyandu Online</a>
                </div>
                <ul class="nav navbar-nav nav-txt-color navbar-right">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>homepage/tentangKami">Tentang Kami</a></li>
                    <li><a href="<?php echo base_url() ?>Homepage/login">Sign In</a></li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Login
                    </a>
                    <div class="dropdown-menu dropdown-menu-style">
                        <a class="dropdown-item" href="<?php echo base_url() ?>Homepage/login">Pasien</a><br>
                        <a class="dropdown-item" href="<?php echo base_url() ?>Pengelola/">Pengelola</a><br>
                        <a class="dropdown-item" href="<?php echo base_url() ?>Dokter/">Dokter</a>
                    </div>
                    </li>
                </ul>
        </nav>