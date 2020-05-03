<div class="body-lap-kesehatan">
    <div class="container">
        <div class="heading-lap-panel">
            <h1 id="headPrint">Hasil Pemeriksaan <?= $laporan['nm_pasien'] ?></h1>
            <div class="keterangan">
                <div class="kolom">
                    <small>Tanggal Diperiksa <strong><?= $laporan['tanggal'] ?></strong></small><br>
                    <small>Kategori <strong><?= $laporan['kategori'] ?></strong></small><br>
                    <small>Diperiksa Oleh <strong>Dr. <?= $laporan['nm_dokter'] ?></strong></small>
                </div>
                <div class="kolom">
                    <a href="javascript:void(0)" onClick="printFunc('area-print')"><img src="<?php echo base_url() ?>assets/css/img/icon-pdf.png" style="width:80px; height:70px;"></a>
                </div>
            </div>
        </div>
        <div class="hasil-lap-panel">
            <div class="scroll-list-riwayat">
                <p><?= $laporan['hasil_Pemeriksaan'] ?></p>
            </div>
            <a href="<?php echo base_url() ?>Pasien/riwayat" class="btn btn-info"><--Kembali</a>
        </div>
    </div>
</div>
<!-- untuk print -->
<div id="area-print" style="display:none;">
    <h1 id="headPrint">Hasil Pemeriksaan <?= $laporan['nm_pasien'] ?></h1>
    <small>Tanggal Diperiksa <strong><?= $laporan['tanggal'] ?></strong></small><br>
    <small>Kategori <strong><?= $laporan['kategori'] ?></strong></small><br>
    <small>Diperiksa Oleh <strong>Dr. <?= $laporan['nm_dokter'] ?></strong></small>
    <p id="area-print"><?= $laporan['hasil_Pemeriksaan'] ?></p>
</div>
<script>
    function printFunc(areaID){
        var printContent = document.getElementById(areaID);
        var WinPrint = window.open('', '', 'width=900,height=650');
        WinPrint.document.write(printContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();       
    }
</script>
