<header>
	
</header>
<body style="width: 100%;height: 100%">
	<div>
		<h2 class="jumbotron text-center" style="background-color: #00A8CC; color: white;margin-bottom: 0">Formulir Pendaftaran Praktek</h2>
	</div>
	<div class="container-fluid" style="background-color: white; min-width: 100%;min-height: 100%;margin: 0 auto">
		<form method="POST" style="margin-top: 20px">
			<div class="form-group">
				<label for="nama">Nama</label>
			    <input type="text" class="form-control" id="nama">
			</div>
			<div class="form-group">
				<label for="tanggal">Tanggal</label>
			    <input type="date" class="form-control" id="tanggal">
			</div>
			<div class="form-group">
				<label for="jamP">Jam Praktek</label>
			    <select class="form-control" id="jamP">
			    	<option value="">Jam praktek</option>
					<?php foreach($jamP as $row){ ?>
        			<option value="<?php echo $row->jam_praktek; ?>"><?php echo $row->jam_praktek; ?></option>';
    				<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="lahir">Tanggal Lahir</label>
			    <input type="date" class="form-control" id="lahir">
			</div>
			<div class="form-group">
				<label for="katP">Kategori Pasien</label>
			    <select class="form-control" id="katP">
				  <option selected>--Pilih Salah Satu--</option>
				  <option value="umum">Umum</option>
				  <option value="anak">Anak</option>
				  <option value="hamil">Ibu Hamil</option>
				</select>
			</div>
			<div class="container text-center " style="min-width: 100%">
				<button type="submit" class="btn btn-primary" style="background-color: #00A8CC; width: 500px;">Daftar Praktek</button>
			</div>
		</form>
	</div>
</body>