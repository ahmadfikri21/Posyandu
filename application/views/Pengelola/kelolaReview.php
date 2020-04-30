<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Tabel Kelola Review Pelayanan</h1>
        <?php echo form_open('pengelola/searchReview') ?>
        <div class="form-group form-inline">
            <label>cari</label>
            <input type="text" name="cari" class="form-control" placeholder="cari">
            <input type="submit" value="Cari" class="btn btn-info">
        </div>
        <?php form_close(); ?>
        <a href="<?php echo base_url() ?>Pengelola/tambahReview" class="btn btn-info tambah-dk">Tambah Review</a>
        <table class="table table-striped">
            <thead>
                <tr class="head-tb-dk">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kualitas</th>
                    <th>Kritik</th>
                    <th>Saran</th>
                    <th>Tanggal Dibuat</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach($review as $data): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['kualitas'] ?></td>
                    <td><?= $data['kritik'] ?></td>
                    <td><?= $data['saran'] ?></td>
                    <td><?= $data['tgl_dibuat'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>