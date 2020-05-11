<div class="container">
    <div class="panel-kelola-dokter">
        <h1>Form Edit Data User</h1>
        <?php echo form_open('pengelola/updateUS') ?>
            <div class="form-group">
                <label>Id User</label>
                <input type="text" name="id_user" class="form-control" value="<?php echo $user['id_user'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $user['nama'] ?>">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $user['username'] ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $user['email'] ?>">
            </div>
            <input type="submit" value="Edit" class="btn btn-info">
        <?php echo form_close() ?>
    </div>
</div>