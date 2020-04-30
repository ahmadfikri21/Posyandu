<div class="container">
    <div class="panel-head-pass">
        <h1>Ganti Password</h1>
    </div>
    <div class="panel-form-pass">
    <?php echo form_open('pasien/updatePwd'); ?>
    <?php echo validation_errors() ?>
        <div class="form-group">
            <label>Password Lama</label>
            <input type="password" name="passLama" class="form-control">
        </div>
        <div class="form-group">
            <label>Password Baru</label>
            <input type="password" name="passBaru" class="form-control">
        </div>
        <div class="form-group">
            <label>Confirm Password Baru</label>
            <input type="password" name="passBaru2" class="form-control">
        </div>
        <input type="submit" value="Ubah" class="btn btn-info">
        <a href="<?php echo base_url() ?>Pasien/profil" class="btn btn-danger">Batal</a>
    <?php echo form_close(); ?>
    </div>
</div>