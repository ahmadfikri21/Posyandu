<section class="con-daftarpasien-dk">
   
    
        <form class="form-inline form-search-dk" >
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <button type="button" class="btn btn-primary btn-inputreview-dk">Input Review</button>
        </form>
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
            <?=
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
            <center>
            <ul class="pagination justify-content-center page-daftar-dk">
                <li class="page-item"><a class="page-link" href="<?=current_url();?>">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
            </center>
        <a href="<?=site_url('h')?>" >Bantuan</a> | 
        <a href="<?=site_url('Homepage/tentangkami')?>" >Tentang Kami</a>
    </section>   
</section>
