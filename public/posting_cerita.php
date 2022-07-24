<!-- 
    Created By : Fajar Alam 
    date created : 24 / 07/ 2022
-->

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
                    <option value="1">Ceritaku</option>
                    <option value="2">Misteri</option>
                    <option value="3">Urban Legend</option>
                    <option value="4">Mitos</option>
                    <option value="5">Konspirasi</option>
                </select>
            </div>

            <div class="field">
                <label>Posting</label>
                <div style="min-height :50vh;" id="editor">
                    <p>This is some sample content.</p>
                </div>
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

<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );


    $('#submitCerita').click(function() {
        // Membuat variable post_data berisi object
        post_data = {
            judul : $('#judul').val(),
            genre : $('#genre').val(),
            editor : $('#editor').text()
        }

        console.log(post_data)
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