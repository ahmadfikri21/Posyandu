<section class="con-input-dk">

<h1>Formulir Pemeriksaan</h1>

<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama</label>
    <input  class="form-control form-input-dk" id="exampleFormControlInput1" require>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal Lahir</label>
    <input type="date" class="form-control form-input-dk" id="exampleFormControlInput1" require>
  </div>

  <div class="form-group">
      <Label>Kategori Pasien</Label><br>
    <select class="custom-select form-inputlist-dk" required>
      <option value="">Open this select menu</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Hasil Pemeriksaan</label>
    <textarea class="form-control form-input-dk" id="exampleFormControlTextarea1" rows="3"require></textarea>
  </div>
</form>

<button type="button" class="btn btn-secondary btn-input-dk" > <a href="<?= site_url('Dokter/daftarpasien');?>">Simpan</button>

</section>