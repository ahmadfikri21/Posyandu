<section class="container-fluid section-color-dk">
  <div class="LoginBox">
    <div class="h1-login-dk">Selamat Datang Dokter</div>
    <?php echo form_open('Dokter/Login') ?>

      <div class="alert alert-login-dk" role="alert">
        <?php echo $this->session->flashdata('message'); ?>
      </div>
    
    <form >
          <div class="form-group ">
            <input type="text" class="form-control input-login-dk" id="exampleInputEmail1"  placeholder="Username" name="username">     
            <input type="password" class="form-control input-login-dk" id="exampleInputPassword1" placeholder="Password" name="password">
          </div>
          
          <button type="submit" class="btn btn-primary btn-login-dk">Login</button>
    </form> 
    </div>
</section>

