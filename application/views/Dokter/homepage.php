<div class = "backgroundhp">
<section class="container-fluid section-hm-dk">
       
            <center>
            <img src="<?= base_url('/assets/css/img/Logo_Dokter.png')?>" class="img-fluid" alt="Responsive image">
            <br>
            <p class="text-center">Dokter <?= $nama?></p>
            <br>
            <a class="edit-profile" href="<?=site_url('Dokter/editdokter')?>">edit profile</a>
            <br>    
             <a class="btn btn-secondary btn-lg btn-home-dk" href="<?php echo site_url('Dokter/daftarpasien');?>">
            Input Laporan Kesehatan <br>Pasien </a>
            <a class="btn btn-secondary btn-lg btn-home-dk" href="<?php echo site_url('Dokter/viewJadwalPraktek');?>"> 
            Jadwal Praktek  </a>
            <a class="btn btn-secondary btn-lg btn-home-dk" href="<?php echo site_url('Dokter/logout');?>"> 
            Logout </a>
            </center>
            <div class="bantuan-hm">
                <section class="help-daftarpasien-dk">
                    <a href="<?=site_url('Dokter/bantuan')?>" > Bantuan</a> 
                </section>   
            </div>

</section>

   
</div>
