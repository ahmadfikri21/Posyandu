<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Form Tambah Dokter</h1>
        
        <?php echo validation_errors() ?>
        <?php echo form_open('pengelola/tambahDK') ?>
        <div class="form-group">
                <label>Id Dokter</label>
                <input type="text" name="id_dokter" class="form-control" value="<?= $id_dokter?>" readonly>  
            </div>
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
                <label>Nomor Telepon</label>
                <input type="text" name="no_telp" class="form-control">
            </div>
            <input type="submit" value="Tambah" class="btn btn-info">
        <?php echo form_close() ?>
    </div>
</div>