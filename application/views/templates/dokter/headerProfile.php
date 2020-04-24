<html>
<head>
    <meta charset = "UTF-8">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
</head>
<body class="homepageDokter">
    <div id="wrapper">
    <header>
        <hgroup>
            <h3> 
                <a class="navbar-brand" href="<?php echo site_url('Dokter/homepage');?>"><img class="nav-logo-dk"  src="<?= base_url('/assets/css/img/Logo_Dokter.png')?>" 
                alt="Logo" > </a>
                <a class="navbar-brand nav-txt-color-dk" href="<?php echo site_url('Dokter/homepage');?>">Dokter <?= $nama?></a>
                <a class="nav-profile"href="<?php echo site_url('homepage/tentangkami')?>">| TENTANG KAMI </a>
                <a class="nav-profile"href="<?php echo site_url('Dokter/homepage')?>">  HOME  |</a>
            </h3>
        </hgroup>
    </header>
    