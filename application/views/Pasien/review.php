    <div class="container min-height-full">
        <div class="panel-review">
                            <h1>Review Pelayanan</h1>
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
        </div>
    </div> 