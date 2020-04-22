<section class="container">
    <div class="container-welcome">
        <h1><center>Hi <?php echo $user['username'] ?>!</center></h1>
    </div>
    <section class="container-isi">
        <h2><center>Informasi Terbaru</center></h2>
        <?php foreach($informasi as $info): ?>
        <small> Tanggal Dibuat <Strong><?= $info['tgl_dibuat'] ?></Strong></small>
        <p><?php echo $info['isi'] ?></p>
        <?php endforeach; ?>
    </section>
</section>