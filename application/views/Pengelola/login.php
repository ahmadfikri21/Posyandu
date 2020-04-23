<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
    <title>Posyandu</title>
</head>

<body>
    <div class="container-body">
        <nav class="navbar navbar-inverse nav-color nav-pasien">
            <div class="container-fluid nav-con">
                <div class="navbar-header">
                    <a class="navbar-brand nav-txt-color" href="<?php echo base_url(); ?>">Posyandu Online</a>
                </div>
        </nav>
        <div class="container">
            <div class="login-panel">
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