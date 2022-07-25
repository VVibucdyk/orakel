<h2 class="major">Registrasi Akun</h2>

<span class="image main">
    <img src="_URAA/images/sejarah-uraa.jpg" alt="sejarah"/>
</span>

<form id="register" onsubmit="preventDefault()">
    <div class="fields">
    <div class="field half">
            <label>Nama</label>
            <input type="text" minlength="7" maxlength="25" id="nama" placeholder="Nama tummbal...">
        </div>
        <div class="field half">
            <label>Username</label>
            <input type="text" name="" id="username" placeholder="Nama samaran..." pattern="^.{3,31}[0-9a-zA-Z]+( [0-9a-zA-Z]+)*$"/>
        </div>
        <div class="field half">
            <label>Password</label>
            <input type="password" name="" placeholder="Masukan manta-mu..." id="pass">
        </div>
        <div class="field half">
            <label>Konfirmasi Password</label>
            <input type="password" name="" placeholder="Masukan manta-mu..." id="Konfirm-pass">
        </div>
        <div class="field half">
            <label>Tanggal Lahir</label>
            <input type="date" name="" id="tanggal">
        </div>
        <div class="field half">
            <label>Genre Kesukaan-mu</label>
            <select name="" id="genre">
                <!-- foreach hasil dari table_genre database. ieumah sebagai contoh -->
                <option value="1">Cerita Member</option>
                <option value="2">Misteri</option>
                <option value="3">Creepy Pasta</option>
            </select>
        </div>
    </div>
    <ul class="actions">
        <li>
            <input type="submit" class="primary daftar" value="Daftar">
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

    $("input[type='submit']").on('click', function() {
        data = {
            nama : $('#nama').val(),
            username : $('#username').val(),
            pass : $('#pass').val(),
            tanggal : $('#tanggal').val(),
            genre : $('#genre').val()
        }

        $.ajax({
            url : 'routes/register.php',
            method : 'POST',
            data : data,
            success : (res) => {
                alert(res);
                window.location = 'http://localhost/orakel/public/register.php';
            },
            error : () => {
                alert("GAGAL! Terjadi Error Pada Server");
            }

        })
    });

});
</script>