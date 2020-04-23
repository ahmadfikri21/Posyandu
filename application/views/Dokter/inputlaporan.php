<section class="con-input-dk">

<h1>Formulir Pemeriksaan</h1>

<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input  class="form-control form-input-dk" id="exampleFormControlInput1" readonly>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal Lahir</label>
    <input type="date" class="form-control form-input-dk" id="exampleFormControlInput1" readonly>
  </div>

  <div class="form-group">
      <Label>Kategori Pasien</Label><br>
      <input  class="form-control form-input-dk" id="exampleFormControlInput1" readonly>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Hasil Pemeriksaan</label>
    <textarea class="form-control form-input-dk" id="exampleFormControlTextarea1" rows="5"require></textarea>
  </div>
</form>

<a class="btn btn-secondary btn-input-dk" href="<?= site_url('Dokter/daftarpasien');?>">Simpan</a>

</section>