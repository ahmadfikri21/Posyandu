<div class="background-kelola">
<section class="container-fluid section-homepage">
        <section  class="container-fluid section-hm-d"> 
            <center>
            <img src="<?= base_url('/assets/css/img/foto.jpg')?>" class="foto" alt="Responsive image">
            <br>
            <p class="text-center">Selamat datang <?= $username?></p>
            <a class="edit-profile" href="<?=site_url('Pengelola/logout')?>">LOG OUT</a>
            <br>    
             <a class="btn btn-secondary btn-lg btn-home-dk" href="<?php echo site_url('Penglola/kelolapraktek');?>">
            Kelola jadwal Praktek <br>Dokter  </a>
            <a class="btn btn-secondary btn-lg btn-home-dk" href="<?php echo site_url('Pengelola/kelolapasien');?>"> 
            kelola pasien</a>
            </center>
        </section>
</section>
</div>