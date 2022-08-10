<?php require_once("../_URAA/module/function.php");
$artikel = readArtikel($_GET['val']); ?>

<h2 id="judul_cerita" class="major"> <?= $artikel['judul_artikel'] ?> </h2>
<div class="publish-top">
    <p class="author" id="tgl_publish"><b>PostBy</b> <i>@<?= $artikel['username'] ?></i></p>
    <p class="datepublish" id="tgl_publish"><b>Publish</b> <i><?= formattglwaktu($artikel['tgl_publish']) ?></i></p>
</div>

<div class="ck-content">
    <?= $artikel['isi_artikel'] ?>
</div>

<div class="card-profile">
    <div class="img">
        <img src="<?= $artikel['link_foto'] == NULL ? '_URAA/images/attribute/profile-default.jpg' : $artikel['link_foto'] ?>" alt="<?= $artikel['nama'] ?>">
    </div>
    <div class="infos">
        <div class="name">
            <h2><?= $artikel['nama'] ?></h2>
            <h4 style="color: white;">@<?= $artikel['username'] ?></h4>
        </div>
        <p class="text">
            Seorang ghost buster kayak scooby doo.
        </p>
        <ul class="stats">
            <li>
                <h4>CERITA</h4>
                <h5><?= getJumlahArtikel($artikel['id_user']) ?> POST</h5>
            </li>
            <li>
                <h4>Genreku</h4>
                <h5>Misteri</h5>
            </li>
        </ul>
        <!-- <div class="links">
            <button class="follow">Follow</button>
            <button class="view">View profile</button>
        </div> -->
    </div>
</div>