<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Form Tambah Jadwal Praktek</h1>
        
        <?php echo validation_errors() ?>
        <?php echo form_open('pengelola/tambahlagiJP') ?>
        <div class="form-group">
        <label>Id Pasien</label>
                <input type="text" name="id_praktek" class="form-control"  value="<?=$id?>"readonly>
            </div>
            <div class="form-group">
                <label>Jam Praktek</label>
                <input type="text" name="jam_praktek" class="form-control"  >
            </div>
            <input type="submit" value="Tambah" class="btn btn-info">
        <?php echo form_close() ?>
    </div>
</div>