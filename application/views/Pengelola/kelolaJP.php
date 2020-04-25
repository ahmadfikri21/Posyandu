<div class="container">
    <div class="panel-kelola-dokter">
    <h1>Tabel Kelola Jadwal Praktek</h1>
        <?php echo form_open('pengelola/searchDK') ?>
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
                    <th>Jam Praktek</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach($isiPraktek as $praktek): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $praktek['id_jadwal'] ?></td>
                    <td><?= $praktek['jam_praktek'] ?></td>
                </tr>
                <?php endforeach; ?>  
        </table>  
    </div>
</div>