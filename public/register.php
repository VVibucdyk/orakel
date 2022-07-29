<?php 

require_once('../_URAA/module/function.php');
if(isSessionValid()) exit("Direct access not permitted.");

?>

<!-- 
    Created By : Difa Witsqa RD 
    Date created : 25 / 09 / 2022
-->

<h2 class="major">Registrasi Akun</h2>

<span class="image main">
    <img src="_URAA/images/gate-uraa.jpg" alt="gate"/>
</span>

<form method="POST" id="register">
    <div class="fields">
        <div class="field half">
            <label>Nama</label>
            <input type="text" id="nama" placeholder="Masukan nama kamu...">
        </div>
        <div class="field half">
            <label>Username</label>
            <input type="text" id="username" placeholder="Masukan username kamu..."/>
        </div>
        <div class="field half">
            <label>Password</label>
            <input type="password" class="password-valid" placeholder="Masukan password kamu..." id="pass">
        </div>
        <div class="field half">
            <label>Konfirmasi Password</label>
            <input type="password" class="password-valid" placeholder="Konfrimasi password kamu..." id="konfirmpass">
        </div>
        <div class="field half">
            <label>tgllahir Lahir</label>
            <input type="date" id="tgllahir">
        </div>
        <div class="field half">
            <label>Genre Kesukaan-mu</label>
            <select id="genre">
                <!-- foreach hasil dari table_genre database. ieumah sebagai contoh -->
                <option selected disabled>-- Pilih Judul Cerita --</option>
                <?php listGenre() ?>
            </select>
        </div>
    </div>
    <ul class="actions">
        <li>
            <input type="submit" class="primary" value="Daftar">
        </li>
        <li>
            <input type="reset" value="Reset" />
        </li>
    </ul>
</form>

<script>
    $('#register').ready(function(){  

        $('#nama').on('keyup', function(e) {
            e.target.value = full_name_pattern(e.target.value);
        });

        $('#username').on('keyup', function(e) {
            e.target.value = username_pattern(e.target.value);
        });

        $("input[type='reset']").on('click', function() {
            $(".text-eror").fadeOut();
        });

        $("input[type='submit']").on('click', function() {
            event.preventDefault();
            $(".text-eror").remove();

            data = {
                nama : $('#nama').val().trim(),
                username : $('#username').val().trim(),
                pass : $('#pass').val().trim(),
                konfirmpass : $('#konfirmpass').val().trim(),
                tgllahir : $('#tgllahir').val(),
                genre : $('#genre').val()
            }

            if(data.nama==="" || data.nama===null || data.nama.length < 7 || data.nama.length > 25) {
                ShowErrText("#nama", "Uups!", "(Min 7 - Maks 25 Karakter)");
            } else if(!isUsername(data.username)){
                ShowErrText("#username", "Uups!", "(Min 6 - Maks 32 Karakter)");
            } else if(!isPassword(data.pass)){
                ShowErrText("#pass", "Uups!", "(Min 8 Karakter, Huruf Kecil & Besar)");
            } else if(!isPassword(data.konfirmpass)){
                ShowErrText("#konfirmpass", "Uups!", "(Min 8 Karakter, Huruf Kecil & Besar)");
            } else if(data.konfirmpass !== data.pass){
                ShowErrText("#konfirmpass", "Uups!", "Konfirmasi Password Tidak Valid");
                $('#konfirmpass').val("");
            } else if(data.tgllahir=='' || data.tgllahir===null) { 
                ShowErrText("#tgllahir", "Uups!", "Tanggal Lahir Harus Di Isi !");
            } else if(data.genre=='' || data.genre===null) { 
                ShowErrText("#genre", "Uups!", "Genre Harus Di Isi !");
            }else{
                $.ajax({
                    url : 'routes/register.php',
                    method : 'POST',
                    dataType: "json",
                    data : data,
                    success : (res) => {
                        var info = res.info; 
                        if (res.status == true) {
                            iziToast.success({
                                title: "Registrasi Berhasil",
                                message: info.msg,
                                position: "topCenter",
                            });
                            Open('public/masuk');
                        } else {
                            ShowErrText(`#${info.elementid}`, "Uups!", info.msg);
                        }
                    },
                    error : () => {
                        ShowErrText(".major", "<b>GAGAL!</b> Terjadi Error Pada Server");
                    }
                })
            }
        });

    });
</script>