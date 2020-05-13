<body>
	<div class="container">
		<div>
			<h2 class="jumbotron text-center" style="background-color: #00A8CC; color: white; margin-bottom: -5">
				Update Profile
			</h2>
			<div class="container-fluid" style="background-color: white; min-width: 100%; min-height: 76vh; margin: 0 auto;">
			<?php echo $this->session->flashdata('flash'); ?>
				<?php echo form_open('Pasien/update_akun') ?>
					<div class="form-group" style="margin-top: 20px">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama',$nama); ?>">
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" value="<?php echo set_value('username',$username); ?>">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email" value="<?php echo set_value('email',$email); ?>">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat',$alamat); ?>">
					</div>
					<div class="form-group">
						<label for="telp">Nomor Telepon</label>
						<input type="text" class="form-control" name="telp" value="<?php echo set_value('telp',$telp); ?>">
					</div>
					<div class="container text-center " style="min-width: 100%">
					<button type="submit" class="btn btn-primary" style="background-color: #00A8CC; width: 500px; margin-top: 20px">Update Profile</button>
					<a href="<?php echo base_url() ?>Pasien/profil" class="btn btn-danger" style="width: 500px; margin-top: 20px">Batal</a>
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</body>