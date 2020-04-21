<div class="loginya"> 
<section class="container-fluid section-color-dk">
  <div class="LoginBox">
    <div class="h1-login-dk">Selamat Datang Dokter</div>
    <?php echo form_open('Dokter/Login') ?>
    <form >
          <div class="form-group ">
            <input type="text" class="form-control input-login-dk" id="exampleInputEmail1"  placeholder="Username" name="username">     
            <input type="password" class="form-control input-login-dk" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
          </div>
          <button type="submit" class="btn btn-primary btn-login-dk">Login</button>
    </form> 
    </div>
</section>
</div>
