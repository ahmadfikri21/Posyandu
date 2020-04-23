<section class="container-fluid section-hm-dk">
        <section  class="container-fluid section-hm-d"> 
            <center>
            <img src="<?= base_url('/assets/css/img/Logo_Dokter.png')?>" class="img-fluid" alt="Responsive image">
            <br>
            <p class="text-center"><?= $nama?></p>
            <p class="text-center">Center</p>
            <a class="eidt-profile" href="<?=site_url('Dokter/Edit')?>">edit profile</a>
            <br>    
             <a class="btn btn-secondary btn-lg btn-home-dk" href="<?php echo site_url('Dokter/daftarpasien');?>">
            Input Laporan Kesehatan <br>Pasien </a>
            <a class="btn btn-secondary btn-lg btn-home-dk" href="<?php echo site_url('Dokter/isijadwaltravel');?>"> 
            Isi Jadwal Praktek  </a>
            </center>
        </section>
</section>