<div class="body-riwayat">
    <div class="container min-height-full">
        <div class="h1-panel">
            <h1><strong>Riwayat Pemeriksaan <?php echo $user ?></strong></h1>
        </div>
        <div class="btn-review-container">
            <a class="btn btn-success btn-lg" href="<?php echo base_url(); ?>Pasien/review">Input Review Pelayanan</a>
        </div>
        <div class="riwayat-panel">
            <?php echo form_open('Pasien/cari', array('class' => 'form-inline')); ?>
            <div class="form-group">
                <label>cari</label>
                <input type="text" name="cari" class="form-control" placeholder="cari">
                <input type="submit" value="Cari" class="btn btn-info">
            </div>
            </form>
            <?php  if($riwayat != NULL): ?>
                <?php foreach ($riwayat as $r) : ?>
                    <div class="list-riwayat">
                        <h3><?php echo $r['nama'] ?></h3>
                        <h5>Tanggal Diperiksa <strong><?php echo $r['tanggal'] ?></strong>
                            pada jam <strong><?php echo $r['jam_praktek'] ?></strong></h5>
                        <h5>Kategori <?php echo $r['kategori'] ?></h5>
                        <a class="btn btn-info btn-small" href="<?php echo site_url('/pasien/lapKesehatan/' . $r['id_riwayat']); ?>">Lihat Hasil</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h3><center>Belum ada Riwayat Pemeriksaan!</center></h3>
            <?php endif; ?>
            <div class="link-pagination">
                <?php echo $this->pagination->create_links(); ?> <!-- untuk menampilkan link pagination -->
            </div>
        </div>
    </div>
</div>

