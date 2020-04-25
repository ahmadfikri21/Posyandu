<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Form Tambah Pasien</h1>
        
        <?php echo validation_errors() ?>
        <?php echo form_open('pengelola/tambahPS') ?>
        <div class="form-group">
        <label>Id Pasien</label>
                <input type="text" name="id_pasien" class="form-control"  readonly>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control"  >
            </div>
            <div class="form-group">
                <label>tanggal</label>
                <input type="text" name="tanggal" class="form-control" >
            </div>
            <div class="form-group">
                <label>jam praktek</label>
                <input type="text" name="jam_praktek" class="form-control"  >
            </div>
            <div class="form-group">
                <label>tanggal lahir</label>
                <input type="text" name="tgl_lahir" class="form-control"  >
            </div>
            <div class="form-group">
                <label>kategori</label>
                <input type="text" name="kategori" class="form-control"  >
            </div>
            <input type="submit" value="Tambah" class="btn btn-info">
        <?php echo form_close() ?>
    </div>
</div>