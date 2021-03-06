<!-- 
    Created By : Fajar Alam 
    date created : 24 / 07/ 2022
-->
<?php 
require_once('../_URAA/module/function.php');
?>
<div id="">
    <h2 class="major" style="text-align: center;">Posting Cerita Kamu</h2>
    <div style="margin-top: 3%;">
        <form action="#" onsubmit="return false;">
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
        .create( document.querySelector( '#editor' ) )
        .then( newEditor => {
            editor = newEditor;
        } )
        .catch( error => {
            console.error( error );
        } );

    $('#submitCerita').click(function() {
        // Membuat variable post_data berisi object
        post_data = {
            judul : $('#judul').val(),
            genre : $('#genre').val(),
            editor : editor.getData()
        }

        console.log(post_data)
        // Mengirimkan data ke server
        $.ajax({
            url : 'routes/PostingCerita.php',
            method : 'POST',
            data : post_data,
            success: (res) => {
                alert(res);
            },
            error : () => {
                alert("GAGAL! Terjadi error pada server!");
            }
        })
    })
</script>