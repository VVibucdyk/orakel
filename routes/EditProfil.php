<?php 
// created by : Fajar alam
// created date : 20/07/2022

require_once('../_URAA/module/function.php');

    
    if(!empty($_POST["uraa_code"])) {
        $uraa_code = $_POST['uraa_code'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $tgl_lahir = $_POST['tgllahir'];
        $genre = $_POST['genre'];
        $bio = $_POST['bio'];
        $data = array($nama,$tgl_lahir,$genre,$bio);
        $sql = "update table_user SET nama=?, tgl_lahir=?, genre_id=?, bio=? where username = '$username'";

        $pdo_statement=$conn->prepare($sql);
        $result = $pdo_statement->execute($data);

        if($result) {
            echo "Berhasil!";
        }
    }else{
        echo '<script>alert("Lengkapi Inputan")';
    }

?>