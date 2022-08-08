<?php

require_once('../_URAA/module/function.php');
if (!isSessionValid()) exit("Direct access not permitted.");

// Created BY : Difa Witsqa RD
// Created Date : 07-08-2022

$nama_user = getUserInfo('nama');
$id_user = getUserInfo('id');
$username_user = getUserInfo('username');

$valid = false;
$element = "result-box";
$msg = "Kesalahan Tidak Di Ketahui"; 

// menangkap data post
$p_artikel_code = isset($_GET['articlecode']) ? filterhtml($_GET['articlecode']) : null;

if ($p_artikel_code != null) {
    $artikelku = $conn->prepare("SELECT * FROM table_artikel WHERE kode_artikel=?");
    $artikelku->execute([$p_artikel_code]);
    $data = $artikelku->fetch();
    $jumlahdata = $artikelku->rowCount();

    if($jumlahdata == 1) {
        $id = $data['id'];
        $kode_artikel = $data['kode_artikel'];
        $judul_artikel = $data['judul_artikel'];
        $user_id = $data['user_id'];
        $genre_id = $data['genre_id'];
        $isi_artikel = $data['isi_artikel']; 
        if ($user_id == $id_user) {
            $valid = true;
        }
    } 
}

?>

<h2 class="major-2">Edit Postingan</h2>

<?php if($valid) { ?>
    <form method="POST" id="edit-postingan">
        <input type="hidden" id="uraa_code" value="<?=$kode_artikel?>">

        <div class="fields">
            <div class="field half">
                <label>Judul</label>
                <input type="text" id="judul" placeholder="Masukan Judul Cerita">
            </div>
            <div class="field half">
                <label for="genre">Genre</label>
                <select name="genre" id="genre">
                    <option selected disabled>-- Pilih Judul Cerita --</option>
                    <?php listGenre(); ?>
                </select>
            </div>
            <div class="field">
                <div id="toolbar-container"></div>
                <div id="artikel"><?=$isi_artikel?></div>
            </div>
        </div>

        <ul class="actions">
            <li>
                <input type="submit" class="primary" value="Perbarui">
            </li>
            <li>
                <input type="reset" value="Reset" />
            </li>
        </ul>

    </form>

    <script>

        $('#edit-postingan').ready(function(){

            $('#judul').val("<?=$judul_artikel?>");
            $('#genre').val(<?=$genre_id?>);

            DecoupledEditor
            .create( document.querySelector( '#artikel' )  ,
            {
                ckfinder: {
                    uploadUrl: 'routes/uraa_imguploader?uraa=<?=md5($kode_artikel)?>'
                }
            })
            .then( editor => {
                document.querySelector( '#toolbar-container' ).appendChild( editor.ui.view.toolbar.element );
                window.editor = editor;
            })
            .catch( error => {
                console.error( 'There was a problem initializing the editor.', error );
            });


            $("#edit-postingan").on('reset', function() {
                if(editor) {
                    editor.setData("");
                }
            });

            $("#edit-postingan").on('submit', function() {
                event.preventDefault();
                $(".text-eror").remove();

                data = {
                    edit   : $('#uraa_code').val(),
                    judul  : $('#judul').val(),
                    genre  : $('#genre').val(),
                    artikel: editor.getData()
                }

                if (data.judul === "" || data.judul === null || data.judul.length < 5 || data.judul.length > 125) {
                    ShowErrText($('#judul'), 'Uups!', '(Min 5 - Maks 125 Karakter)');
                } else if (data.genre === "" || data.genre === null) {
                    ShowErrText($('#genre'), 'Uups!', '(Pilih Genre)');
                } else if (data.artikel === "" || data.artikel === null || data.artikel.length < 5 || data.artikel.length > 5000) {
                    ShowErrText($('#editor'), 'Uups!', '(Min 5 - Maks 5000 Karakter)');
                } else {
                    setDisable();
                    $.ajax({
                        url : 'routes/artikelku.php',
                        method : 'POST',
                        dataType: "json",
                        data : data,
                        success : (res) => {
                            var info = res.info; 
                            if (res.status == true) {
                                iziToast.success({
                                    title: info.msg,
                                    message: 'Berhasil Di Perbarui',
                                    position: "topCenter",
                                });
                                setEnable();
                                Open('public/artikel?val=<?=$id?>', true);
                            } else {
                                ShowErrText(`#${info.elementid}`, "Uups!", info.msg);
                                setEnable();
                            }
                        },
                        error : () => {
                            ShowErrText(".major", 'Uups!', "Terjadi Error Pada Server");
                        }
                    })
                }
            });


            window.alert = function(message) {
                iziToast.error({
                    title: "Uups!",
                    message: message,
                    position: "topCenter",
                });
            };
        });

    </script>
<?php } else { ?>


    <?php } ?>