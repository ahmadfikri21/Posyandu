<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Form Tambah Informasi</h1>
        
        <?php echo validation_errors() ?>
        <?php echo form_open('pengelola/tambahlagiINFO') ?>
        <div class="form-group">
        <label>Id Informasi</label>
                <input type="text" name="id_informasi" class="form-control"  value="<?=$id?>"readonly>
            </div>
            <div class="form-group">
                <label>Isi Informasi</label>
                <input type="text" name="isi" class="form-control"  >
            </div>
            <div class="form-group">
                <label>Tanggal dibuat</label>
                <input type="text" name="tgl_dibuat" class="form-control"  >
            </div>
            <input type="submit" value="Tambah" class="btn btn-info">
        <?php echo form_close() ?>
    </div>
</div>