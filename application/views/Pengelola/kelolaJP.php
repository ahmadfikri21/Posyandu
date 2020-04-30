<div class="container">
    <div class="panel-kelola-dokter">
    <h1>Tabel Kelola Jadwal Praktek</h1>
        <?php echo form_open('pengelola/searchJP') ?>
        <div class="form-group form-inline">
            <label>cari</label>
            <input type="text" name="cari" class="form-control" placeholder="cari">
            <input type="submit" value="Cari" class="btn btn-info">
        </div>
        <?php form_close(); ?>
        <a href="<?php echo base_url() ?>Pengelola/tambahJP" class="btn btn-info tambah-dk">Tambah Jadwal Praktek</a>
       
    <table class="table table-striped">
            <thead>
                <tr class="head-tb-dk">
                    <th>No.</th>
                    <th>ID Praktek</th>
                    <th>ID Dokter</th>
                    <th>Jam Praktek</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach($isiPraktek as $praktek): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $praktek['id_jadwal'] ?></td>
                    <td><?php if($praktek['id_dokter']==''){echo 'Kosong';}else{echo $praktek['id_dokter'];} ?></td>
                    <td><?= $praktek['jam_praktek'] ?></td>
                    <td><a class="btn btn-info btn-small" href="<?php echo site_url('/Pengelola/updateJP/' . $praktek['id_jadwal']); ?>">Edit</a>
                        <a class="btn btn-danger btn-small" href="<?php echo site_url('/Pengelola/deleteJP/' . $praktek['id_jadwal']); ?>">Hapus</a></td>
                </tr>
                <?php endforeach; ?>  
        </table>  
    </div>
</div>