<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Tabel Kelola Pasien</h1>
        <?php echo form_open('pengelola/searchPS') ?>
        <div class="form-group form-inline">
            <label>cari</label>
            <input type="text" name="cari" class="form-control" placeholder="cari">
            <input type="submit" value="Cari" class="btn btn-info">
        </div>
        <?php form_close(); ?>
        <a href="<?php echo base_url() ?>Pengelola/tambahPasien" class="btn btn-info tambah-dk">Tambah Pasien</a>
        <table class="table table-striped">
            <thead>
                <tr class="head-tb-dk">
                    <th>No.</th>
                    <th>ID Pasien</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jam Praktek</th>
                    <th>Tanggal Lahir</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach($isiPasien as $pasien): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $pasien['id_pasien'] ?></td>
                    <td><?= $pasien['nama'] ?></td>
                    <td><?= $pasien['tanggal'] ?></td>
                    <td><?= $pasien['jam_praktek'] ?></td>
                    <td><?= $pasien['tgl_lahir'] ?></td>
                    <td><?= $pasien['kategori'] ?></td>
                    <td><a class="btn btn-info btn-small" href="<?php echo site_url('/Pengelola/editPasien/' . $pasien['id_pasien']); ?>">Edit</a>
                        <a class="btn btn-danger btn-small" href="<?php echo site_url('/Pengelola/hapusPasien/' . $pasien['id_pasien']); ?>" onclick="return konfirmasiDeletePasien()">Hapus</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="link-pagination">
                <?php echo $this->pagination->create_links(); ?> <!-- untuk menampilkan link pagination -->
        </div>
    </div>
</div>