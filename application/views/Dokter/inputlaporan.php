<div class="input_laporan_back">
<section class="con-input-dk">

<h1>Formulir Pemeriksaan</h1>
<?php echo form_open('Dokter/input_hasil_laporan/'.$id_riwayat) ?>
<form action="" >
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <text  class="form-control form-input-dk" id="exampleFormControlInput1"  readonly> <?= $nama?></text>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal Lahir</label>
    <text type="date" class="form-control form-input-dk" id="exampleFormControlInput1" readonly> <?= $tgl_lahir?></text>
  </div>

  <div class="form-group">
      <Label>Kategori Pasien</Label><br>
      <text  class="form-control form-input-dk" id="exampleFormControlInput1" readonly><?= $kategori?></text>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Hasil Pemeriksaan</label>
    <textarea class="form-control form-input-dk" id="exampleFormControlTextarea1" name="hasilpemeriksaan" rows="5" required></textarea>
      
  </div>
  <button type="submit" class="btn btn-secondary btn-input-dk">Simpan</button>
 
</form>
</section>
</div>