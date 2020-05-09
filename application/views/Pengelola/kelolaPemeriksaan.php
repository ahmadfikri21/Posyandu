<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Tabel Kelola Hasil Pemeriksaan</h1>
        <?php echo form_open('pengelola/searchPM') ?>
        <div class="form-group form-inline">
            <label>cari</label>
            <input type="text" name="cari" class="form-control" placeholder="cari">
            <input type="submit" value="Cari" class="btn btn-info">
        </div>
        <?php form_close(); ?>
        <table class="table table-striped">
            <thead>
                <tr class="head-tb-dk">
                    <th>No.</th>
                    <th>Tanggal Diperiksa</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Jam Diperiksa</th>
                    <th>Hasil Pemeriksaan</th>
                    <th>Status Pemeriksaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach($pemeriksa as $data): ?>
                <?php
                    if($data['status'] == 0){
                        $status = "Belum Diperiksa";
                    }else{
                        $status = "Telah Diperiksa";
                    }
                ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $data['tanggal'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['kategori'] ?></td>
                    <td><?= $data['jam_praktek'] ?></td>
                    <td><?= $data['hasil_pemeriksaan'] ?></td>
                    <td><?= $status ?></td>
                    <td><a class="btn btn-info btn-small" href="<?php echo site_url('/Pengelola/editPemeriksaan/' . $data['id_riwayat']); ?>">Edit</a>
                        <a class="btn btn-danger btn-small" href="<?php echo site_url('/Pengelola/hapusPemeriksaan/' . $data['id_riwayat']); ?>">Hapus</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="link-pagination">
                <?php echo $this->pagination->create_links(); ?> <!-- untuk menampilkan link pagination -->
        </div>
    </div>
</div>