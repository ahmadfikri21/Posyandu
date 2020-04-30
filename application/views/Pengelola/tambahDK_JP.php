<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Form Tambah Jadwal Praktek</h1>
        
        <?php echo validation_errors() ?>
        <?php echo form_open('pengelola/tambahlagiDKJP') ?>
        <div class="form-group">
        <label>Id Dokter</label>
                <input type="text" name="id_praktek" class="form-control"  value="<?=$dokter['id_dokter']?>"readonly>
            </div>
            <div class="form-group">
                <label>Jam Praktek</label>
                <select name="jam_praktek" >
                    <?php
                    foreach ($Praktek as $jam_praktek ) {
                        echo '<option name="'.$jam_praktek['id_jadwal'].'">'.$jam_praktek['jam_praktek'].'</option>';
                    }
                      ?>
                </select>
            </div>
            <input type="submit" value="Tambah" class="btn btn-info">
        <?php echo form_close() ?>
    </div>
</div>