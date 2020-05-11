<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Form Tambah User</h1>
        
        <?php echo validation_errors() ?>
        <?php echo form_open('pengelola/tambahUS') ?>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" >
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password2" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <input type="submit" value="Tambah" class="btn btn-info">
         
             <a href="<?= site_url('/Pengelola/user') ?>" class="btn btn-danger">Batal</a> 
             <?php echo form_close() ?>
    </div>
</div>