<section>
<div class="panel-kelola-dokter">
        <h1>Form Edit Data Dokter</h1>
        <?php echo form_open('Dokter/updateDK') ?>
            <center>
            <div class="file-field">
                <div class="mb-4">
                    <img class="img-dk" alt="example placeholder avatar" src="">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="btn btn-mdb-color btn-rounded float-left">
                        <span>Add photo</span>
                        <input type="file">
                    </div>
                </div>
            </div>
            </center>

            <div class="form-group">
                <label>Id Dokter</label>
                <input type="text" name="id_dokter" class="form-control" value="<?php echo $dokter['id_dokter'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $dokter['nama'] ?>">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $dokter['username'] ?>">
            </div>
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="no_telp" class="form-control" value="<?php echo $dokter['no_telp'] ?>">
            </div>
            <input type="submit" value="Edit" class="btn btn-info">
        <?php echo form_close() ?>
    </div>


</section>