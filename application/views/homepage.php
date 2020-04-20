<section class="container">
    <div class="container-welcome">
        <h1><center>Selamat Datang di Posyandu Online</center></h1>
        <h5><center>Posyandu Online adalah aplikasi berbasis website yang disediakan untuk 
            pengguna posyandu, untuk memudahkan pengguna dalam melakukan proses kegiatan yang ada di posyandu. </center></h5>
    </div>
    <section class="container-isi">
        <h2><center>Layanan yang kami tawarkan</center></h2>
        <!-- carousel -->
        <div id="pelayanan-kami" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#pelayanan-kami" data-slide-to="0" class="active"></li>
            <li data-target="#pelayanan-kami" data-slide-to="1"></li>
            <li data-target="#pelayanan-kami" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
            <img src="<?php echo base_url() ?>assets/css/img/layanan.jpg" alt="pendaftaran online">
            <div class="carousel-caption">
                <h3>Pendaftaran Praktek Secara Online</h3>
                <p>Dengan menggunakan Website ini, anda dapat mendaftar praktek posyandu secara online</p>
            </div>
            </div>

            <div class="item">
            <img src="<?php echo base_url() ?>assets/css/img/medical-report.jpg" alt="laporan kesehatan">
            <div class="carousel-caption">
                <h3>Laporan Kesehatan</h3>
                <p>Dengan menggunakan website ini, anda dapat melihat hasil dari pemeriksaan anda</p>
            </div>
            </div>

            <div class="item">
            <img src="<?php echo base_url() ?>assets/css/img/riwayat-slider.jpg" alt="New York">
            <div class="carousel-caption">
                <h3>Riwayat Pemeriksaan</h3>
                <p>Dengan menggunakan website ini, anda dapat melihat hasil dari pemeriksaan anda maupun buah hati anda</p>
            </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#pelayanan-kami" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#pelayanan-kami" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </section>
    <br>
    <div class="container-bawah-home" >
        <h2><center>Mulai Daftarkan Akun Anda Sekarang</center></h2><a class="btn btn-primary btn-block" href="<?php echo base_url(); ?>homepage/registrasi"><strong>Daftar Akun</strong></a>
    </div>
</section>