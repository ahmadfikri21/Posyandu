<div class="container">
    <div class="h1-panel">
        <h1><strong>Riwayat Pemeriksaan Pasien</strong></h1>
    </div>
    <div class="clear-in-review">
        <button class="btn btn-success btn-lg" href="#">Input Review Pelayanan</button>
    </div>
    <div class="riwayat-panel">
    <?php echo form_open(); ?>
        <div class="form-group">
            <label>cari</label>
            <input type="text" class="form-control" placeholder="cari">
        </div>
        </form>
        <?php foreach($riwayat as $r): ?>
        <div class="list-riwayat">
            <h3><?php echo $r['nama'] ?></h3>
            <h5>Tanggal Diperiksa <?php echo $r['tanggal'] ?> pada jam <?php echo $r['jam_praktek'] ?></h5>
            <h5>Kategori <?php echo $r['kategori'] ?></h5>
            <button class="btn btn-info btn-small">Lihat Hasil</button>
        </div>
        <?php endforeach; ?>
    </div>
</div>