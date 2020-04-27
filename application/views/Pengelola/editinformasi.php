<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Form Update Informasi</h1>
        
        <?php echo validation_errors() ?>
        <?php echo form_open('pengelola/editlagiINFO') ?>
        <div class="form-group">
        <label>Id Informasi</label>
                <input type="text" name="id_informasi" class="form-control"  value="<?=$id_informasi?>"readonly>
            </div>
            <div class="form-group">
                <label>Isi Informasi</label>
                <input type="text" name="isi" class="form-control"  value="<?= $isi?>">
            </div>
            <div class="form-group">
                <label>Tanggal dibuat</label>
                <input type="text" name="tgl_dibuat" class="form-control"  value="<?= $tgl_dibuat?>" >
            </div>
            <input type="submit" value="Tambah" class="btn btn-info">
        <?php echo form_close() ?>
    </div>
</div>