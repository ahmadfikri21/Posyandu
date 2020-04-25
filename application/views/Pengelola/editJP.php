<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Form Update Jadwal Praktek</h1>
        
        <?php echo validation_errors() ?>
        <?php echo form_open('pengelola/updatelagiJP') ?>
        <div class="form-group">
        <label>Id Pasien</label>
                <input type="text" name="id_praktek" class="form-control"  value="<?=$id_jadwal?>"readonly>
            </div>
            <div class="form-group">
                <label>Jam Praktek</label>
                <input type="text" name="jam_praktek" class="form-control"  value="<?=$jam_praktek?>">
            </div>
            <input type="submit" value="Tambah" class="btn btn-info">
        <?php echo form_close() ?>
    </div>
</div>