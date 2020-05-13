<div class="container">
    <div class="panel-profil">
        <h1>Ubah Profil</h1>
        <?php echo $this->session->flashdata('pass-berhasil'); ?>
        <div class="btn-profil-container">
            <a class="btn btn-secondary btn-lg btn-profil-pas" href="<?php echo base_url() ?>Pasien/update_akun">Edit Profil</a>
            <a class="btn btn-secondary btn-lg btn-profil-pas" href="<?php echo base_url() ?>Pasien/updatePass">Ganti Password</a>
        </div>
    </div>
</div>