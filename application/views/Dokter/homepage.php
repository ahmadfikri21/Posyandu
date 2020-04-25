<div class = "backgroundhp">
<section class="container-fluid section-hm-dk">
        <section  class="container-fluid section-hm-d"> 
            <center>
            <img src="<?= base_url('/assets/css/img/Logo_Dokter.png')?>" class="img-fluid" alt="Responsive image">
            <br>
            <p class="text-center">Dokter <?= $nama?></p>
            <p class="text-center"><?= $username?></p>
            <a class="edit-profile" href="<?=site_url('Dokter/editdokter')?>">edit profile</a>
            <br>    
             <a class="btn btn-secondary btn-lg btn-home-dk" href="<?php echo site_url('Dokter/daftarpasien');?>">
            Input Laporan Kesehatan <br>Pasien </a>
<<<<<<< HEAD
            <a class="btn btn-secondary btn-lg btn-home-dk" href="<?php echo site_url('Dokter/viewJadwalPraktek');?>"> 
            Jadwal Praktek  </a>
=======
            <a class="btn btn-secondary btn-lg btn-home-dk" href="<?php echo site_url('Dokter/logout');?>"> 
            Logout </a>
>>>>>>> d31ec53572d4b0dc1373b98258dd44225aaa2e31
            </center>
        </section>
</section>
</div>