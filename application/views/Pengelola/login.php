<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
    <title>Posyandu</title>
</head>

<body>
    <div class="container-body-pengelola">
        <nav class="navbar navbar-inverse nav-color nav-pasien">
            <div class="container-fluid nav-con">
                <div class="navbar-header">
                    <a class="navbar-brand nav-txt-color" href="<?php echo base_url(); ?>">Posyandu Online</a>
                </div>
                <ul class="nav navbar-nav nav-txt-color navbar-right">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>homepage/tentangKami">Tentang Kami</a></li>
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
        <div class="container">
            <div class="login-panel">
            <div class="alert alert-login-dk" role="alert">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
                <h1>Login Pengelola</h1>
                <small>Welcome Back !</small>
                <?php echo form_open('pengelola/login') ?>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="username" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="password" name="password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-info" value="Login">
                </div>
            </div>
        </div>
        <footer><p>Copyright &copy; 2020 Posyandu Online</p></footer>
    </div>
</body>
</html>