<?php 

require_once('../_URAA/module/function.php');

    if(!empty($_POST["uraa_code"])) {
        $uraa_code = $_POST['uraa_code'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $tgl_lahir = $_POST['tgllahir'];
        $genre = $_POST['genre'];
        $bio = $_POST['bio'];
        $data = array($nama,$tgllahir,$genre,$bio);
        $sql = "update table_user set(nama, tgl_lahir, genre_id, bio) value(?,?,?,?) where username = '$username'";

        $pdo_statement=$pdo_conn->prepare();
        $result = $pdo_statement->execute($data);

        if($result) {
            echo "Berhasil!";
        }
    }else{
        echo '<script>alert("Lengkapi Inputan")';
    }

?>