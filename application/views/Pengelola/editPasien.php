<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Form Edit Data Pasien</h1>
        <?php echo form_open('pengelola/updatePS') ?>
            <div class="form-group">
                <label>Id Pasien</label>
                <input type="text" name="id_pasien" class="form-control" value="<?php echo $pasien['id_pasien'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $pasien['nama'] ?>">
            </div>
            <div class="form-group">
                <label>tanggal</label>
                <input type="text" name="tanggal" class="form-control" value="<?php echo $pasien['tanggal'] ?>">
            </div>
            <div class="form-group">
                <label>jam praktek</label>
                <input type="text" name="jam_praktek" class="form-control" value="<?php echo $pasien['jam_praktek'] ?>">
            </div>
            <div class="form-group">
                <label>tanggal lahir</label>
                <input type="text" name="tgl_lahir" class="form-control" value="<?php echo $pasien['tgl_lahir'] ?>">
            </div>
            <div class="form-group">
                <label>kategori</label>
                <input type="text" name="kategori" class="form-control" value="<?php echo $pasien['kategori'] ?>">
            </div>
            <input type="submit" value="Edit" class="btn btn-info">
        <?php echo form_close() ?>
    </div>
</div>