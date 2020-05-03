<section class="container">
    <div class="container-welcome">
        <h1><center>Hi <?php echo $user['username'] ?>!</center></h1>
    </div>
    <div class="status-pasien-homepage">
        <h3><strong>Pasien yang mendaftar praktek dan belum diperiksa :</strong></h3><br> 
        <ul>
            <?php if($praktek == NULL): ?>
                <p>Tidak ada pasien yang belum diperiksa. klik untuk lihat <a href="<?php echo base_url() ?>/Pasien/riwayat">riwayat kesehatan</a></p>
            <?php else: ?>
            <?php foreach($praktek as $prak): ?>
            <li><strong><?= $prak['nama'] ?></strong> Jam & Tanggal Pemeriksaan : <strong><?= $prak['jam_praktek'] ?> <?= $prak['tanggal'] ?></strong></li><br>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <section class="container-isi">
        <h2><center>Informasi Terbaru</center></h2>
        <?php foreach($informasi as $info): ?>
        <small> Tanggal Dibuat <Strong><?= $info['tgl_dibuat'] ?></Strong></small>
        <p><?php echo $info['isi'] ?></p>
        <?php endforeach; ?>
    </section>
</section>