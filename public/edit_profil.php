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

<div class="edit-profil">
    <h2 class="major-2">Informasi Umum</h2>
    <div class="card-profile">
        <div class="img">
            <img src="<?= $LinkFotoKu == NULL ? '_URAA/images/attribute/profile-default.jpg' : $LinkFotoKu ?>" alt="<?= $NamaKu ?>">
        </div>
        <div class="infos">
            <div class="name">
                <h2><?= $NamaKu ?></h2>
                <h4>@<?= $UsernameKu ?></h4>
            </div>
            <p class="text">
                <?= $BioKu == NULL ? 'Belum Ada Bio' : $BioKu ?>
            </p>
            <ul class="stats">
                <li>
                    <h4>Cerita</h4>
                    <h5><?= getJumlahArtikel($IDKu) ?> POST</h5>
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
        <div class="fields">
            <div class="field half">
                <label>Nama</label>
                <input type="text" minlength="4" maxlength="25" id="nama" placeholder="Masukan Nama Baru" value="<?= $NamaKu ?>">
            </div>

            <div class="field half">
                <label for="">Username</label>
                <input type="text" minlength="7" maxlength="25" name="nama" class="nama" id="username" value="<?= $UsernameKu ?>" readonly>
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
        <ul class="actions">
            <li>
                <input type="submit" value="Submit" id="btnInformasiUmum" class="primary">
            </li>
        </ul>
        <!-- <hr> -->
    </form>

    <h2 class="major-2">Keamanan</h2>
    <form method="POST" id="keamanan-akun">
        <div class="fields">
            <div class="field">
                <label for="pass_lama">Password Lama</label>
                <input type="password" placeholder="Masukan password lama kamu..." name="pass_lama" class="" id="pass_lama">
            </div>

            <div class="field half">
                <label for="conf_pass">Passwod Baru</label>
                <input type="password" placeholder="Masukan password baru kamu..." class="password-valid" name="pass_baru" class="" id="pass_baru">
            </div>

            <div class="field half">
                <label for="conf_baru">Konfirmasi Password Baru </label>
                <input type="password" placeholder="Konfirmasi password baru kamu..." class="password-valid" name="konfirm_baru" class="" id="konfirm_baru">
            </div>
        </div>
        <ul class="actions">
            <li>
                <input type="submit" value="Ubah Kata Sandi" class="primary">
            </li>
            <li>
                <input type="reset" value="Reset" />
            </li>
        </ul>
    </form>

</div>
<script>
    // modified by : Fajar Alam
    // modified date : 2020-01-01
    $('#edit_profil').ready(function() {

        document.getElementById('genre').value = '<?= $GenreKu ?>';

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

    });

    // modified by : Difa Witsqa RD
    // modified date : 11-08-2022
    $('#keamanan-akun').ready(function() {

        $(this).on('submit', function() {
            event.preventDefault();
            $(".text-eror").remove();

            data = {
                pass_lama: $('#pass_lama').val(),
                pass_baru: $('#pass_baru').val(),
                konfirm_baru: $('#konfirm_baru').val()
            }

            if (data.pass_lama === "" || data.pass_lama === null) {
                ShowErrText("#pass_lama", "Uups!", "Masukan Password Lama Kamu");
            } else if (!isPassword(data.konfirm_baru)) {
                ShowErrText("#konfirm_baru", "Uups!", "(Min 8 Karakter, Huruf Kecil & Besar)");
            } else if (data.pass_baru !== data.konfirm_baru) {
                ShowErrText("#konfirm_baru", "Uups!", "Konfirmasi Password Tidak Valid");
                $('#konfirm_baru').val("");
            } else {
                setDisable();
                $.ajax({
                    url: 'routes/EditPassword.php',
                    method: 'POST',
                    dataType: "json",
                    data: data,
                    success: (res) => {
                        var info = res.info;
                        if (res.status == true) {
                            iziToast.success({
                                title: info.msg,
                                message: 'Berhasil Di Perbarui',
                                position: "topCenter",
                            });
                            $('#keamanan-akun').trigger("reset");
                            setEnable();
                        } else {
                            ShowErrText(`#${info.elementid}`, "Uups!", info.msg);
                            $(`#${info.elementid}`).val("");
                            $(`#${info.elementid}`).get(0).focus();
                            setEnable();
                        }
                    },
                    error: () => {
                        ShowErrText(".major", 'Uups!', "Terjadi Error Pada Server");
                    }
                })
            }
        });

    });
</script>