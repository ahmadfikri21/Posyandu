<div class="container">
    <div class="heading-lap-panel">
        <h1>Hasil Pemeriksaan <?= $laporan['nm_pasien'] ?></h1>
        <small>Tanggal Diperiksa <strong><?= $laporan['tanggal'] ?></strong></small><br>
        <small>Kategori <strong><?= $laporan['kategori'] ?></strong></small><br>
        <small>Diperiksa Oleh <strong>Dr. <?= $laporan['nm_dokter'] ?></strong></small>
        <input type="image" src="<?php echo base_url() ?>assets/css/img/icon-pdf.png">
    </div>
    <div class="hasil-lap-panel">
        <div class="scroll-list-riwayat">
            <p><?= $laporan['hasil_Pemeriksaan'] ?></p>
        </div>
        <a href="<?php echo base_url() ?>Pasien/riwayat" class="btn btn-info"><--Kembali</a>
    </div>
</div>