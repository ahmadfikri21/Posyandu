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
                <label>Tanggal dibuat</label>
                <input type="datetime" name="tgl_dibuat" class="form-control"  value="<?=date("Y-m-d h:i:sa") ?>"readonly>
            </div>
            <div class="form-group">
                <label>Isi Informasi</label>
                <textarea name="isi" id="" cols="3" rows="5"  class="form-control" require></textarea>
              
            </div>
            <input type="submit" value="Tambah" class="btn btn-info">
        <?php echo form_close() ?>
    </div>
</div>