<section class="container-fluid section-color">
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Review Pelayanan</h1>
                            </div>
                            <?php echo $this->session->flashdata('message'); ?>

                            <form class="user" method="post" action="<?php echo base_url('pasien/review'); ?>">
                                <div class="form-group">
                                    <h5>Kualitas Penanganan</h5>
                                    <input type="radio" class="radioB" name="kualitas" id="kualitas" value="Sangat Baik"> Sangat Baik</input></br>
                                    <input type="radio" class="radioB" name="kualitas" id="kualitas" value="Baik"> Baik</input></br>
                                    <input type="radio" class="radioB" name="kualitas" id="kualitas" value="Cukup"> Cukup</input></br>
                                    <input type="radio" class="radioB" name="kualitas" id="kualitas" value="Buruk"> Buruk</input></br>
                                    <input type="radio" class="radioB" name="kualitas" id="kualitas" value="Sangat Buruk"> Sangat Buruk</input></br>
                                    <?php echo form_error('kualitas', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <h5>Kritik</h5>
                                    <input type="text" class="form-control form-control-user" id="kritik" name="kritik" placeholder="Tuliskan kritik anda disini...">
                                    <?php echo form_error('kritik', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <h5>Saran</h5>
                                    <input type="text" class="form-control form-control-user" id="saran" name="saran" placeholder="Tuliskan saran anda disini...">
                                    <?php echo form_error('saran', '<small class="text-danger">', '</small>'); ?>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user float-left">
                                    Kirim Riview
                                </button>

                                <a class="btn btn-danger btn-user float-right" href="<?php echo base_url(); ?>pasien/riwayat">
                                    Batal
                                </a>
                            </form>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>