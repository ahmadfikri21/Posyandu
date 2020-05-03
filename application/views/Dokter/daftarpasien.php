<section class="con-daftarpasien-dk">
   
        <?php echo form_open('Dokter/searchDK') ?>
            <form class="form-inline form-search-dk" >
                <div class="form-group form-inline">
                    <input class="form-control box-search-dk" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </div>
                
            </form>
        <?php echo form_close() ?>
       
        
        <center>
        
        <section class="table-background-dk">
            <table class="table tabel-pasien-dk">
            <thead>
                <tr>
                <th scope="col">NO</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">NAMA PASIEN</th>
                <th scope="col">JAM PRAKTEK</th>
                <th scope="col">TGL LAHIR</th>
                <th scope="col">KATEGORI</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            foreach ($value as $key) {
                    
                echo "<tr><td>".$count."</td>";
                echo "<td>".$key['tanggal']."</td>";
                echo "<td>".$key['nama']."</td>";
                echo "<td>".$key['jam_praktek']."</td>";  
                echo "<td>".$key['tgl_lahir']."</td>";
                echo "<td>".$key['kategori']."</td>";
                echo "<td> <a class='btn btn-primary btn-table-aksi-dk' href=".site_url('Dokter/inputlaporan/'.$key['id_riwayat']).">Input Laporan</a> </td></tr>";
                 $count++;
            }
            ?>
                <!--isi table -->
            </tbody>
            </table>
        </section>
    </center>
                
    
    <section class="help-daftarpasien-dk">
        <a href="<?=site_url('Dokter/bantuan')?>" > Bantuan</a> 
    </section>   
</section>
