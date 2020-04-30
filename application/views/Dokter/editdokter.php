<section>
<div class="panel-kelola-dokter">
        <h1>Form Edit Data Dokter</h1>
        <?php echo form_open('Dokter/updateDK') ?>
 

            <div class="form-group">
                <label>Id Dokter</label>
                <input type="text" name="id_dokter" class="form-control" value="<?php echo $dokter['id_dokter'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $dokter['nama'] ?>">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $dokter['username'] ?>">
            </div>
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="no_telp" class="form-control" value="<?php echo $dokter['no_telp'] ?>">
            </div>
            <input type="submit" value="Edit" class="btn btn-info">
        <?php echo form_close() ?>
    </div>


</section>