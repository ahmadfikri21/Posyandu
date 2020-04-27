<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Form Tambah Pasien</h1>
        
        <?php echo validation_errors() ?>
        <?php echo form_open('pengelola/tambahPS') ?>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" >
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" >
            </div>
            <div class="form-group">
                <label>jam praktek</label>
                <select name="jam_praktek" class="form-control">
                    <option value="">Pilih Jam Praktek</option>
                    <?php foreach($jam as $jp): ?>
                    <option value="<?= $jp['jam_praktek'] ?>"><?= $jp['jam_praktek'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Dokter</label>
                <select name="dokter" class="form-control">
                    <option value="">Pilih Dokter</option>
                    <?php foreach($dokter as $dk): ?>
                    <option value="<?= $dk['nama'] ?>"><?= $dk['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>tanggal lahir</label>
                <input type="date" name="tgl_lahir" class="form-control"  >
            </div>
            <div class="form-group">
                <label>kategori</label>
                <select name="kategori" class="form-control">
                    <option value="">Pilih Kategori</option>
                    <option value="anak">Anak</option>
                    <option value="ibu hami">Ibu Hamil</option>
                </select>
            </div>
            <div class="form-group">
                <label>Pendaftar</label>
                <select name="pendaftar" class="form-control">
                    <option value="">Pilih Pendaftar</option>
                    <?php foreach($pendaftar as $row): ?>
                    <option value="<?= $row['username'] ?>"><?= $row['username'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" value="Tambah" class="btn btn-info">
        <?php echo form_close() ?>
    </div>
</div>