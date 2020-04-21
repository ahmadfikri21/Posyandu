<div class="container body-riwayat">
    <div class="h1-panel">
        <h1><strong>Riwayat Pemeriksaan Pasien</strong></h1>
    </div>
    <div class="btn-review-container">
        <button class="btn btn-success btn-lg" href="#">Input Review Pelayanan</button>
    </div>
    <div class="riwayat-panel">
    <?php echo form_open('Pasien/cari', array('class' => 'form-inline')); ?>
        <div class="form-group">
            <label>cari</label>
            <input type="text" name="cari" class="form-control" placeholder="cari">
            <input type="submit" value="Cari" class="btn btn-info">
        </div>
        </form>
        <div class="scroll-list-riwayat">
        <?php foreach($riwayat as $r): ?>
            <div class="list-riwayat">
                <h3><?php echo $r['nama'] ?></h3>
                <h5>Tanggal Diperiksa <strong><?php echo $r['tanggal'] ?></strong> 
                pada jam <strong><?php echo $r['jam_praktek'] ?></strong></h5>
                <h5>Kategori <?php echo $r['kategori'] ?></h5>
                <a class="btn btn-info btn-small" href="<?php echo site_url('/pasien/lapKesehatan/'.$r['id_riwayat']); ?>">Lihat Hasil</a>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>