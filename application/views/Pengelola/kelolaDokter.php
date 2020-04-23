<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Tabel Kelola Dokter</h1>
        <a href="" class="btn btn-info tambah-dk">Tambah Dokter</a>
        <table class="table table-striped">
            <thead>
                <tr class="head-tb-dk">
                    <th>No.</th>
                    <th>ID Dokter</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Nomor Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach($isiDokter as $dokter): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $dokter['id_dokter'] ?></td>
                    <td><?= $dokter['nama'] ?></td>
                    <td><?= $dokter['username'] ?></td>
                    <td><?= $dokter['no_telp'] ?></td>
                    <td><a class="btn btn-info btn-small" href="<?php echo site_url('/Pengelola/editDokter/' . $dokter['id_dokter']); ?>">Edit</a>
                        <a class="btn btn-danger btn-small" href="<?php echo site_url('/Pengelola/hapusDokter/' . $dokter['id_dokter']); ?>">Hapus</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>