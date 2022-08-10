<?php require_once('../_URAA/module/function.php');

if (!isSessionValid()) exit("Direct access not permitted.");


$MAKS_PER_PAGE = 5;
$CURRENT_PAGE = isset($_GET['page']) ? intval($_GET['page']) : 1;

$START_ITEM = ($CURRENT_PAGE - 1) * $MAKS_PER_PAGE;

$list_artikel = ArtikelKu($START_ITEM, $MAKS_PER_PAGE);

$ArtikelKu = $list_artikel['list_artikel'];
$jml_artikel = ceil($list_artikel['jml_artikel'] / $MAKS_PER_PAGE);

?>

<!-- 
Created By : Difa Witsqa RD 
Date created : 06 / 08 / 2022
-->

<h2 class="major">Kelola Postingan</h2>

<?php if (count($ArtikelKu) > 0) { ?>
    <div id="artikelku">
        <div id="result-box"></div>
        <?php foreach ($ArtikelKu as $index => $row) { ?>
            <div class="article-card article-id-<?= $row['kode_artikel'] ?>">
                <div class="img-box">
                    <img src="<?= GetThumbnailHTML($row['isi_artikel']); ?>" alt="" class="article-banner">
                </div>
                <div class="article-content">
                    <div class="text-topright">
                        <div class="genre-name"><?= $row['nama_genre'] ?></div>
                    </div>
                    <a onclick="Open('public/artikel?val=<?= $row['id'] ?>', true);">
                        <h3 class="article-title"><?= $row['judul_artikel'] ?></h3>
                    </a>
                    <p class="article-text"><?= substr(strip_tags($row['isi_artikel']), 0, strpos(strip_tags($row['isi_artikel']), ' ', 260)); ?> . . .</p>
                    <div class="acticle-content-footer">
                        <div class="author">
                            <img src="<?= $row['link_foto'] == NULL ? '_URAA/images/attribute/profile-default.jpg' : $row['link_foto'] ?>" alt="<?= $row['nama'] ?>" class="author-profil">
                            <div class="author-info">
                                <div class="author-username"><b>PostBy</b> @<?= $row['username'] ?></div>
                                <div class="publish-date"><?= formattglwaktu($row['tgl_publish']) ?></div>
                            </div>
                        </div>
                        <ul class="icons">
                            <?php if ($row['username'] == getUserInfo('username')) { ?>
                                <li><a class="icons edit" id="<?= $row['kode_artikel'] ?>"><i class="fas fa-edit"></i></a></li>
                            <?php } ?>
                            <li><a class="icons delete" id="<?= $row['kode_artikel'] ?>"><i class="fas fa-trash"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="pagination">
            <div class="pagination:container">
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
        </div>
    </div>
    <script>
        $('#artikelku').ready(function() {
            $('.pagination-artikel').click(function() {
                var page = $(this).text();

                Open('public/artikelku?page=' + page);
            });

            $()

            $('#prev_artikel').click(function() {
                var page = parseInt("<?= $CURRENT_PAGE ?>");
                let prev_page = page - 1;


                if (prev_page > 0) {
                    Open('public/artikelku?page=' + prev_page);
                }
            });

            $()

            $('#next_artikel').click(function() {
                var page = parseInt("<?= $CURRENT_PAGE ?>");
                let next_page = page + 1;


                if (next_page <= <?= $jml_artikel ?>) {
                    Open('public/artikelku?page=' + next_page);
                }
            });

            let delay, $elmArticle = null;

            function LocalsetEnable() {
                if (delay) {
                    clearTimeout(delay);
                }
                $elmArticle.removeClass('bg-danger');
                setEnable();
            }

            $(".edit").on('click', function() {
                let articlecode = $(this).attr('id');
                Open(`public/edit_artikel?articlecode=${articlecode}`, true);
            });

            $(".delete").on('click', function() {
                $(".text-eror").remove();

                let articlecode = $(this).attr('id');
                $elmArticle = $(`.article-id-${articlecode}`);

                if (articlecode === "" || articlecode === null) {
                    ShowErrText("#result-box", "Uups!", "ID Artikel Tidak Valid !");
                } else {
                    setDisable();
                    $elmArticle.addClass('bg-danger');
                    iziToast.show({
                        timeout: 5000,
                        icon: 'fa fa-exclamation-triangle',
                        close: false,
                        progressBarColor: '#7E715C',
                        pauseOnHover: false,
                        title: 'Konfirmasi Hapus Artikel',
                        message: '',
                        position: 'center',
                        buttons: [
                            ['<button>Ya, Hapus</button>',
                                function(instance, toast) {
                                    $.ajax({
                                        url: 'routes/artikelku.php',
                                        method: 'POST',
                                        dataType: "json",
                                        data: {
                                            delete: articlecode
                                        },
                                        success: (res) => {
                                            var info = res.info;
                                            if (res.status == true) {
                                                iziToast.success({
                                                    title: info.msg,
                                                    message: "Berhasil Dihapus !",
                                                    position: "topCenter",
                                                });

                                                $elmArticle.hide('500', function() {
                                                    $(this).remove();
                                                });
                                                LocalsetEnable();
                                            } else {
                                                ShowErrText(`#${info.elementid}`, "Uups!", info.msg);
                                                LocalsetEnable();
                                            }
                                        },
                                        error: () => {
                                            ShowErrText("#result-box", "Uups!", "Terjadi Error Pada Server");
                                        }
                                    })

                                    instance.hide({
                                        transitionOut: 'fadeOutUp'
                                    }, toast);
                                }
                            ],
                            ['<button>Batal</button>',
                                function(instance, toast) {
                                    instance.hide({
                                        transitionOut: 'fadeOutUp'
                                    }, toast);
                                    LocalsetEnable();
                                }
                            ]
                        ]
                    });
                    delay = setTimeout(function() {
                        LocalsetEnable();
                    }, 5200);
                }
            });

        });
    </script>

<?php } else { ?>
    <p></p>
    <div class="txt-center">
        <h3 class="horror-text">
            Kamu Belum Punya Postingan
        </h3>
        <h4>
            Ayo ceritakan pengalaman mu, <a class="is-a-link" onclick="Open('public/posting_cerita');"> disni</a>
        </h4>
    </div>
<?php } ?>
<p></p>