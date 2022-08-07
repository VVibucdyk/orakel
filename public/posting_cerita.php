<!-- 
    Created By : Fajar Alam 
    date created : 24 / 07/ 2022
-->
<?php

require_once('../_URAA/module/function.php');
if (!isSessionValid()) exit("Direct access not permitted.");

?>
<div id="">
    <h2 class="major" style="text-align: center;">Posting Cerita Kamu</h2>
    <div style="margin-top: 3%;">
        <form id="posting-cerita" action="#" onsubmit="return false;">
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

                <div class="field" id="posting_cerita">
                    <label>Posting</label>
                    <textarea style="min-height :50vh;" id="editor">
                    </textarea>
                </div>
            </div>

            <ul class="actions">
                <li>
                    <input type="submit" class="primary" id="submitCerita" value="Posting">
                </li>
                <li>
                    <input type="reset" value="Reset" />
                </li>
            </ul>
        </form>
    </div>
</div>
<script>
    var editor;

    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(newEditor => {
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });

    $('#submitCerita').click(function() {
        // Membuat variable post_data berisi object
        post_data = {
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
                url: 'routes/PostingCerita.php',
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
</script>