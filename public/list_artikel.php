<?php require_once('../_URAA/module/function.php');

// craeted_by : Fajar Alam
// created_at : 31-07-2022

// modified by : Difa Witsqa RD
// last_modified : 03-08-2022

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
    foreach ($list_artikel['list_artikel'] as $key => $value) : ?>

        <div class="article-card">
            <div class="img-box">
                <img src="_URAA/images/attribute/list-artikel-default.jpg" alt="" class="article-banner">
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
            <svg width="18" height="18">
                <use xlink:href="#left" />
            </svg>
        </div>

        <?php for ($a = 1; $a <= $jml_artikel; $a++) : ?>
            <div class="pagination-artikel pagination:number <?= $CURRENT_PAGE == $a ? "pagination:active" : "" ?>">
                <?= $a ?>
            </div>
        <?php endfor ?>

        <div id="next_artikel" class="pagination:number arrow">
            <svg width="18" height="18">
                <use xlink:href="#right" />
            </svg>
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

<svg class="hide">
    <symbol id="left" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
    </symbol>
    <symbol id="right" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </symbol>
</svg>

<script>
    $(document).ready(function() {
        $('.pagination-artikel').click(function() {
            var page = $(this).text();
            var genre = '<?= $_GET['konten'] ?>';
            Open('public/list_artikel?page=' + page + '&konten=' + genre);
        });

        $()

        $('#prev_artikel').click(function() {
            var page = parseInt("<?=$_GET['page']?>");
            let prev_page = page - 1;
            var genre = '<?= $_GET['konten'] ?>';

            if(prev_page > 0){
                Open('public/list_artikel?page=' + prev_page + '&konten=' + genre);
            }
        });

        $()

        $('#next_artikel').click(function() {
            var page = parseInt("<?=$_GET['page']?>");
            let next_page = page + 1;
            var genre = '<?= $_GET['konten'] ?>';
            
            if(next_page <= <?=$jml_artikel?>){
                Open('public/list_artikel?page=' + next_page + '&konten=' + genre);
            }
        });

        $()
    });
</script>