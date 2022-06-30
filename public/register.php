<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Jadilah Tumbal Dunia</title>
</head>
<body>
    <h1>Register Akun</h1>
    <hr>

    <form action="#" onsubmit="preventDefault()">
    
        <table>
            <tr>
                <td>Masukan Nama Kamu</td>
                <td>:</td>
                <td><input type="text" name="" id="nama" placeholder="Nama tummbal..."></td>
            </tr>

            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="" id="username" placeholder="Nama samaran..."></td>
            </tr>

            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="" placeholder="Masukan manta-mu..." id="pass"></td>
            </tr>

            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="" id="tanggal"></td>
            </tr>

            <tr>
                <td>Genre Kesukaan-mu</td>
                <td>:</td>
                <td>
                    <select name="" id="genre">
                        <!-- Bagian ieu engke foreach hasil dari table_genre database. ieumah sebagai contoh -->
                        <option value="1">Cerita Member</option>
                        <option value="2">Misteri</option>
                        <option value="3">Creepy Pasta</option>
                    </select>
                </td>
            </tr>
            
        </table>
        
        <input type="reset" value="Reset">
        <input type="button" onclick="submitRegister()" value="Register">
    </form>

    <script src="../assets/js/jquery.min.js"></script>

    <script>

        function submitRegister() {
            data = {
                nama : $('#nama').val(),
                username : $('#username').val(),
                pass : $('#pass').val(),
                tanggal : $('#tanggal').val(),
                genre : $('#genre').val()
            }
            
            $.ajax({
                url : '../routes/register.php',
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
        }
    </script>
</body>
</html>