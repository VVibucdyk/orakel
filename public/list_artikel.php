
<?php require_once('../_URAA/module/function.php');

// craeted_by : Fajar Alam
// created_at : 31-07-2022

// modified by : Difa Witsqa RD
// last_modified : 03-08-2022

$list_artikel = listArtikel($_GET['konten']);

?>

<h2 class="major"><?=$list_artikel['nama_genre']['nama_genre']?></h2>
<?php if(count($list_artikel['list_artikel']) > 0) : ?>
    <!-- columns should be the immediate child of a .row -->
    <?php $i=0; foreach ($list_artikel['list_artikel'] as $key => $value) :?>

    <div class="article-card">
        <div class="img-box">
            <img src="_URAA/images/attribute/list-artikel-default.jpg" alt="" class="article-banner">
        </div>
        <div class="article-content">
            <a onclick="Open('public/artikel?val=<?=$value['id']?>');">
                <h3 class="article-title"><?=$value['judul_artikel']?></h3>
            </a>
            <p class="article-text"><?=substr(strip_tags($value['isi_artikel']),0,280);?> . . .</p>
            <div class="acticle-content-footer">
                <div class="author">
                    <img src="<?= $value['link_foto']==NULL ? '_URAA/images/attribute/profile-default.jpg' : $value['link_foto'] ?>" alt="<?= $value['nama'] ?>" class="author-profil">
                    <div class="author-info">
                        <h4 class="author-name"><?= $value['nama'] ?></h4>
                        <div class="publish-date"><?= formattglwaktu($value['tgl_publish']) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $i++; endforeach ?>
<?php else : ?>
    <p></p>
    <div class="txt-center">
        <h3 class="horror-text">
            Artikel <?=$list_artikel['nama_genre']['nama_genre']?> Tidak Tersedia
        </h3>
        <h4>
            Ceritakan pengalaman mu, <a class="is-a-link" onclick="Open('public/artikel?val=<?=$value['id']?>');"> disni</a>
        </h4>
    </div>
<?php endif ?>
<p></p>

