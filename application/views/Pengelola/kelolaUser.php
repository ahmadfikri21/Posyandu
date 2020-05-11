<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Kelola User</h1>
        <?php echo form_open('pengelola/searchUS') ?>
       <div class="form-group form-inline">
            <label>cari</label>
            <input type="text" name="cari" class="form-control" placeholder="cari">
            <input type="submit" value="Cari" class="btn btn-info">
        </div> 
        <?php form_close(); ?>
        <a href="<?= site_url('/Pengelola/tambahUser') ?>" class="btn btn-info tambah-dk">Tambah User</a> 
        <table class="table table-striped">
            <thead>
                <tr class="head-tb-dk">
                    <th>No.</th>
                    <th>ID User</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach($isiUser as $key): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $key['id_user'] ?></td>
                    <td><?= $key['nama'] ?></td>
                    <td><?= $key['username'] ?></td>
                    <td><?= $key['email'] ?></td>
                     <td>
                         
                         <a class="btn btn-info btn-small" href="<?php echo site_url('/Pengelola/editUser/' . $key['id_user']); ?>">Edit</a>
                        <a class="btn btn-danger btn-small" href="<?php echo site_url('/Pengelola/hapusUser/' . $key['id_user']); ?>" onclick="return konfirmasiDelete()">Hapus</a>
                        </td> 
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>