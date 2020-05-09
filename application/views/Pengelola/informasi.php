<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Tabel Kelola Informasi</h1>
        <?php echo form_open('pengelola/searchDK') ?>
        <div class="form-group form-inline">
            <label>cari</label>
            <input type="text" name="cari" class="form-control" placeholder="cari">
            <input type="submit" value="Cari" class="btn btn-info">
        </div>
        <?php form_close(); ?>
        <a href="<?php echo base_url() ?>Pengelola/tambahINFO" class="btn btn-info tambah-dk">Tambah Informasi</a>
        <table class="table table-striped">
            <thead>
                <tr class="head-tb-dk">
                    <th>No.</th>
                    <th>ID Informasi</th>
                    <th>Isi Informasi</th>
                    <th>Tanggal dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach($informasi as $dokter): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $dokter['id_informasi'] ?></td>
                    <td><?= $dokter['isi'] ?></td>
                    <td><?= $dokter['tgl_dibuat'] ?></td>
    
                    <td><a class="btn btn-info btn-small" href="<?php echo site_url('/Pengelola/editINFO/' . $dokter['id_informasi']); ?>">Edit</a>
                        <a class="btn btn-danger btn-small" href="<?php echo site_url('/Pengelola/deleteINFO/' . $dokter['id_informasi']); ?>">Hapus</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="link-pagination">
                <?php echo $this->pagination->create_links(); ?> <!-- untuk menampilkan link pagination -->
        </div>
    </div>
</div>