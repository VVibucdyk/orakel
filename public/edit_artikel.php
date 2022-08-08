<?php

require_once('../_URAA/module/function.php');
if (!isSessionValid()) exit("Direct access not permitted.");

// Created BY : Difa Witsqa RD
// Created Date : 07-08-2022

$nama_user = getUserInfo('nama');
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

    if($data == 0) {
        $msg = "Kode Artikel Tidak Valid !";   
    } else {

        $kode_artikel = $data['kode_artikel'];
        $judul_artikel = $data['judul_artikel'];
        $user_id = $data['user_id'];
        $genre_id = $data['genre_id'];
        $isi_artikel = $data['isi_artikel'];

    }
}

?>
<h2 class="major">Edit Postingan</h2>
<p></p>
<form method="POST" id="edit-postingan">
    <input type="hidden" id="uraa_code" value="<?=$kode_artikel?>">
    <div class="fields">
        <div class="field half">
            <label>Judul</label>
            <input type="text" id="judul" placeholder="Judul Cerita...">
        </div>
        <div class="field half">
            <label for="genre">Genre</label>
            <select name="genre" id="genre">
                <option selected disabled>-- Pilih Judul Cerita --</option>
                <?php listGenre(); ?>
            </select>
        </div>

        <div class="field">
            <label>Posting</label>
            <div id="toolbar-container"></div>
            <div id="posting"><?=$isi_artikel?></div>
        </div>
    </div>

    <ul class="actions">
        <li>
            <input type="submit" class="primary" id="submitCerita" value="Update">
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
    .create( document.querySelector( '#posting' )  ,
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

    $('#submitCerita').click(function() {
        post_data = {
            code : $('#uraa_code').val(),
            judul: $('#judul').val(),
            genre: $('#genre').val(),
            editor: editor.getData()
        }

        // Validasi
        if (post_data.judul === "" || post_data.judul === null || post_data.judul.length < 5 || post_data.judul.length > 125) {
            ShowErrText($('#judul'), 'Gagal!', '(Min 5 - Maks 125 Karakter)')
        } else if (post_data.genre === "" || post_data.genre === null) {
            ShowErrText($('#genre'), 'Gagal!', '(Pilih Genre)')
        }else if (post_data.editor === "" || post_data.editor === null || post_data.editor.length < 5 || post_data.editor.length > 5000) {
            ShowErrText($('#editor'), 'Gagal!', '(Min 5 - Maks 5000 Karakter)')
        }  else {
            // Mengirimkan data ke server
            $.ajax({
                url: 'routes/artikelku.php',
                method: 'POST',
                data: post_data,
                success : (res) => {
                    res = JSON.parse(res);
                    if (res.status) {
                        iziToast.success({
                            title: "Posting Berhasil",
                            message: res.msg,
                            position: "topCenter",
                        });

                        Open(`public/artikel?val=${res.last_id}`, true)
                        $('#judul').val('');
                        $('#genre').val('');
                        editor.setData('');
                    } else {
                        ShowErrText($('#judul'), 'Gagal!', res.msg);
                    }
                },
                error: () => {
                    ShowErrText(`.major`, "Uups!", res.msg);
                }
            })
        }
    })

    window.alert = function(message) {
        iziToast.error({
            title: "Uups!",
            message: message,
            position: "topCenter",
        });
    };
});


</script>