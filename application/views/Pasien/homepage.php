<section class="container">
    <div class="container-welcome">
        <h1><center>Hi User!</center></h1>
    </div>
    <section class="container-isi">
        <h2><center>Informasi Terbaru</center></h2>
        <?php foreach($informasi as $info): ?>
        <p><?php echo $info['isi'] ?></p>
        <?php endforeach; ?>
    </section>
</section>