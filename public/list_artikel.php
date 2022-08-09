<?php require_once('../_URAA/module/function.php');

// craeted_by : Fajar Alam
// created_at : 31-07-2022

// Modified BY : Difa Witsqa RD
// Modified Date : 07-08-2022
// Modified Description : 
// Mebenahi Tampilan List Artikel & Mengambil Gambar Pertama Untuk Thumbnail (Jika Ada)

$MAKS_PER_PAGE = 5;
$CURRENT_PAGE = isset($_GET['page']) ? intval($_GET['page']) : 1;

$START_ITEM = ($CURRENT_PAGE - 1) * $MAKS_PER_PAGE;

$list_artikel = listArtikel($_GET['konten'], $START_ITEM, $MAKS_PER_PAGE);
$jml_artikel = ceil($list_artikel['jml_artikel'] / $MAKS_PER_PAGE) ;


?>

<h2 class="major"><?= $list_artikel['nama_genre']['nama_genre'] ?></h2>
<?php if (count($list_artikel['list_artikel']) > 0) : ?>
    <!-- columns should be the immediate child of a .row -->
    <?php $i = 0;
    foreach ($list_artikel['list_artikel'] as $key => $value) : 
        preg_match('/src="(.*?)"/', $value['isi_artikel'], $image);
        ?>

        <div class="article-card">
            <div class="img-box">
               <img src="<?=isset($image[1]) ? $image[1] : '_URAA/images/attribute/list-artikel-default.jpg'?>" alt="<?= $value['judul_artikel'] ?>" class="article-banner">
           </div>
           <div class="article-content">
            <a onclick="Open('public/artikel?val=<?= $value['id'] ?>', true);">
                <h3 class="article-title"><?= $value['judul_artikel'] ?></h3>
            </a>
            <p class="article-text"><?= substr(strip_tags($value['isi_artikel']), 0, 280); ?> . . .</p>
            <div class="acticle-content-footer">
                <div class="author">
                    <img src="<?= $value['link_foto'] == NULL ? '_URAA/images/attribute/profile-default.jpg' : $value['link_foto'] ?>" alt="<?= $value['nama'] ?>" class="author-profil">
                    <div class="author-info">
                        <h4 class="author-name"><?= $value['nama'] ?></h4>
                        <div class="publish-date"><?= formattglwaktu($value['tgl_publish']) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $i++;
endforeach ?>
<!-- BAGIAN CUSTOMPAGINATION -->
<!-- CREATED BY : FAJAR ALAM -->
<div style="justify-content: center;" class="pagination:container">
    <div id="prev_artikel" class="pagination:number arrow">
        <i class="fa fa-angle-left"></i>
    </div>

    <?php for ($a = 1; $a <= $jml_artikel; $a++) : ?>
        <div class="pagination-artikel pagination:number <?= $CURRENT_PAGE == $a ? "pagination:active" : "" ?>">
            <?= $a ?>
        </div>
    <?php endfor ?>

    <div id="next_artikel" class="pagination:number arrow">
        <i class="fa fa-angle-right"></i>
    </div>
</div>
<?php else : ?>
    <p></p>
    <div class="txt-center">
        <h3 class="horror-text">
            Artikel <?= $list_artikel['nama_genre']['nama_genre'] ?> Tidak Tersedia
        </h3>
        <h4>
            Ceritakan pengalaman mu, <a class="is-a-link" onclick="Open('public/artikel?val=<?= $value['id'] ?>');"> disni</a>
        </h4>
    </div>
<?php endif ?>
<p></p>

<script>
    $(document).ready(function() {
        $('.pagination-artikel').click(function() {
            var page = $(this).text();
            var genre = '<?= $_GET['konten'] ?>';
            Open('public/list_artikel?page=' + page + '&konten=' + genre);
        });

        $()

        $('#prev_artikel').click(function() {
            var page = parseInt("<?=$CURRENT_PAGE?>");
            let prev_page = page - 1;
            var genre = '<?= $_GET['konten'] ?>';

            if(prev_page > 0){
                Open('public/list_artikel?page=' + prev_page + '&konten=' + genre);
            }
        });

        $()

        $('#next_artikel').click(function() {
            var page = parseInt("<?=$CURRENT_PAGE?>");
            let next_page = page + 1;
            var genre = '<?= $_GET['konten'] ?>';
            
            if(next_page <= <?=$jml_artikel?>){
                Open('public/list_artikel?page=' + next_page + '&konten=' + genre);
            }
        });

        $()
    });
</script>