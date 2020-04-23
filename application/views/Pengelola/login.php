    <div class="container">
        <div class="login-panel">
            <h1>Login</h1>
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