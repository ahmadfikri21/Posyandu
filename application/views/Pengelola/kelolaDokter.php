<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Kelola Informasi</h1>
        <?php echo form_open('pengelola/searchDK') ?>
        <!-- <div class="form-group form-inline">
            <label>cari</label>
            <input type="text" name="cari" class="form-control" placeholder="cari">
            <input type="submit" value="Cari" class="btn btn-info">
        </div> -->
        <?php form_close(); ?>
        <a href="<?php echo base_url() ?>Pengelola/tambahDokter" class="btn btn-info tambah-dk">Tambah Dokter</a>
        <table class="table table-striped">
            <thead>
                <tr class="head-tb-dk">
                    <th>No.</th>
                    <th>tanggal dibuat</th>
                    <th>Isi Informasi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach($informasi as $key): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $key['tgl_dibuat'] ?></td>
                    <td><?= $key['isi'] ?></td>
                    <!-- <td><a class="btn btn-info btn-small" href="<?php echo site_url('/Pengelola/editDokter/' . $dokter['id_dokter']); ?>">Edit</a>
                        <a class="btn btn-danger btn-small" href="<?php echo site_url('/Pengelola/hapusDokter/' . $dokter['id_dokter']); ?>">Hapus</a></td> -->
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>