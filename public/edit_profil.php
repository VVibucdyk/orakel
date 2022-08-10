<?php require_once('../_URAA/module/function.php');
if (!isSessionValid()) exit("Direct access not permitted.");


$IDKu       = getUserInfo('id');
$NamaKu     = getUserInfo('nama');
$UsernameKu = getUserInfo('username');
$TglLahirKu = getUserInfo('tgl_lahir');
$LevelKu    = getUserInfo('level_id');
$LinkFotoKu = getUserInfo('link_foto');
$GenreKu    = getUserInfo('genre_id');
$BioKu      = getUserInfo('bio');


?>


<div class="card-profile">
    <div class="img">
        <img src="<?= $LinkFotoKu == NULL ? '_URAA/images/attribute/profile-default.jpg' : $LinkFotoKu ?>" alt="<?= $NamaKu ?>">
    </div>
    <div class="infos">
        <div class="name">
            <h2><?= $NamaKu ?></h2>
            <h4 style="color: white;">@<?= $UsernameKu ?></h4>
        </div>
        <p class="text">
            <?= $BioKu ?>
        </p>
        <ul class="stats">
            <li>
                <h4>Posting</h4>
                <h5><?= getJumlahArtikel($IDKu) ?></h5>
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
<form method="POST" onsubmit="return false" id="edit_profil">
    <input type="hidden" id="uraa_code" value="<?= $IDKu ?>">
    <h3>Informasi Umum</h3>

    <div class="fields">
        <div class="field half">
            <label>Nama</label>
            <input type="text" minlength="4" maxlength="25" id="nama" placeholder="Masukan Nama Baru" value="<?= $NamaKu ?>">
        </div>

        <div class="field half">
            <label for="">Username</label>
            <input type="text" disabled minlength="7" maxlength="25" name="nama" class="nama" id="username" value="<?= $UsernameKu ?>">
        </div>

        <div class="field half">
            <label>Tanggal Lahir</label>
            <input type="date" minlength="7" maxlength="25" id="tgllahir" value="<?= $TglLahirKu ?>">
        </div>

        <div class="field half">
            <label for="edit_genre">Genre</label>
            <select id="genre">
                <option selected disabled>-- Pilih Genre --</option>
                <?php listGenre() ?>
            </select>
        </div>

        <div class="field">
            <label for="edit_bio">Edit Bio</label>
            <textarea name="edit_bio" id="edit_bio" rows="4" placeholder="Kamu belum menceitakan siapa kamu sebenarnya..."><?= $BioKu ?></textarea>
        </div>
    </div>
    <div class="actions">
        <li>
            <input type="submit" value="Submit" id="btnInformasiUmum" class="primary">
        </li>
    </div>
    <!-- <hr> -->
    <!-- <h3>Keamanan</h3>
    <div class="fields">
        <div class="field">
            <label for="pass_lama">Password Lama</label>
            <input type="password" minlength="7" maxlength="25" name="pass_lama" class="" id="pass_lama">
        </div>

        <div class="field half">
            <label for="conf_pass">Passwod Baru</label>
            <input type="password" minlength="7" maxlength="25" name="conf_pass" class="" id="conf_pass">
        </div>

        <div class="field half">
            <label for="conf_baru">Konfirmasi Password Baru </label>
            <input type="password" minlength="7" maxlength="25" name="conf_baru" class="" id="conf_baru">
        </div>
    </div>
    <div class="actions">
        <li>
            <input type="submit" value="Submit" id="jawabbtnpassword" class="primary">
        </li>
    </div> -->
</form>
<script>
    $('#edit_profil').ready(function() {

        document.getElementById('genre').value = '<?=$GenreKu?>';

        // ketika btn informasi umum di klik
        $('#btnInformasiUmum').click(function() {
            data = {
                'uraa_code': $('#uraa_code').val(),
                'nama': $('#nama').val(),
                'username': $('#username').val(),
                'tgllahir': $('#tgllahir').val(),
                'genre': $('#genre').val(),
                'bio': $('#edit_bio').val(),
            };
            $.ajax({
                type: 'POST',
                url: 'routes/EditProfil.php',
                data: data,
                success: function(res) {
                    iziToast.success({
                        title: res,
                        message: 'Berhasil Di Perbarui',
                        position: "topCenter",
                    });
                    Open('public/edit_profil?val=<?= $IDKu ?>');
                }
            });
        });

        $('#jawabbtnpassword').click(function() {
            data = {
                'pass_lama': $('#pass_lama').val(),
                'conf_pass': $('#conf_pass').val(),
                'conf_baru': $('#conf_baru').val()
            }
            $.ajax({
                type: 'POST',
                url: 'routes/EditPassword.php',
                data: data,
                success: function(data) {
                    alert(data);
                }
            });
        });

        // $.ajax({
        //     url: 'routes/EditProfil.php',
        //     method: 'POST',
        //     dataType: "json",
        //     data: data,
        //     success: (res) => {
        //         var info = res.info;
        //         if (res.status == true) {
                    // iziToast.success({
                    //     title: info.msg,
                    //     message: 'Berhasil Di Perbarui',
                    //     position: "topCenter",
                    // });
                    // setEnable();
                    // Open('public/edit_profil?val=<?= $IDKu ?>', true);
        //         } else {
        //             ShowErrText(`#${info.elementid}`, "Uups!", info.msg);
        //             setEnable();
        //         }
        //     },
        //     error: () => {
        //         ShowErrText(".major", 'Uups!', "Terjadi Error Pada Server");
        //     }
        // })
    })
</script>