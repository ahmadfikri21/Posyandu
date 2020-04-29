<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Kelola Dokter</h1>
        <?php echo form_open('pengelola/searchDK') ?>
       <div class="form-group form-inline">
            <label>cari</label>
            <input type="text" name="cari" class="form-control" placeholder="cari">
            <input type="submit" value="Cari" class="btn btn-info">
        </div> 
        <?php form_close(); ?>
        <a href="<?= site_url('/Pengelola/tambahDokter') ?>" class="btn btn-info tambah-dk">Tambah Dokter</a> 
        <table class="table table-striped">
            <thead>
                <tr class="head-tb-dk">
                    <th>No.</th>
                    <th>ID Dokter</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>no Telp</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach($isiDokter as $key): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $key['id_dokter'] ?></td>
                    <td><?= $key['nama'] ?></td>
                    <td><?= $key['username'] ?></td>
                    <td><?= $key['no_telp'] ?></td>
                     <td>
                         
                         <a class="btn btn-info btn-small" href="<?php echo site_url('/Pengelola/editDokter/' . $key['id_dokter']); ?>">Edit</a>
                        <a class="btn btn-danger btn-small" href="<?php echo site_url('/Pengelola/hapusDokter/' . $key['id_dokter']); ?>">Hapus</a>
                        <a class="btn btn btn-info btn-small" href="<?php echo site_url( '/Pengelola/dokterJP/' .$key['id_dokter']); ?>">Jadwal Praktek</a>
                        </td> 
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>