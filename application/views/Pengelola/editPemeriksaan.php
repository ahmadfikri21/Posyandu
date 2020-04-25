<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Form Edit Hasil Pemeriksaan</h1>
        <?php echo validation_errors() ?>
            <?php echo form_open('Pengelola/editPM') ?>
            <input type="text" name="id_riwayat" value="<?= $pemeriksa['id_riwayat'] ?>" hidden>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" value="<?= $pemeriksa['nama'] ?>" disabled>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" class="form-control" value="<?= $pemeriksa['kategori'] ?>" disabled>
            </div>
            <div class="form-group">
                <label>Jam Diperiksa</label>
                <input type="text" class="form-control" value="<?= $pemeriksa['jam_praktek'] ?>" disabled>
            </div>
            <div class="form-group">
                <label>Hasil Pemeriksaan</label>
                <input type="text" class="form-control" value="<?= $pemeriksa['hasil_pemeriksaan'] ?>" name="hasilP">
            </div>
            <input type="submit" class="btn btn-primary" value="Edit">
            <?php form_close() ?>
    </div>
</div>