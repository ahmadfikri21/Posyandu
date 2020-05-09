<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Kelola Jadwal Dokter <?= $dokter[0]['nama']?></h1>
        <?php echo form_open('pengelola/searchDK') ?>
       <div class="form-group form-inline">
            <input type="text" name="cari" class="form-control" placeholder="cari">
            <input type="submit" value="Cari" class="btn btn-info">
        </div> 
        <?php form_close(); ?>
        <a href="<?php echo base_url('Pengelola/dokter') ?>" class="btn btn-info tambah-dk">Kembali</a> 
        <a href="<?php echo base_url('Pengelola/tambahDK_JP/'.$dokter[0]['id_dokter']) ?>" class="btn btn-info tambah-dk">Tambah Jadwal Dokter</a> 
        <table class="table table-striped">
            <thead>
                <tr class="head-tb-dk">
                    <th>No.</th>
                    <th>ID Jadwal</th>
                    <th>Jam Praktek</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach($jadwal as $key): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $key['id_jadwal'] ?></td>
                    <td><?= $key['jam_praktek'] ?></td>
                     <td>
                        <a class="btn btn-danger btn-small" href="<?php echo site_url('/Pengelola/deleteDK_JP/' . $key['id_jadwal']); ?>">Hapus</a>
                      
                        </td> 
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>