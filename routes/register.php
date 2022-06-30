<?php 

    require_once('../connection.php');

    if(!empty($_POST['username'])){
        // menangkap data post 
        $data[] = $_POST['nama'];
        $data[] = $_POST['username'];
        $data[] = $_POST['pass'];
        $data[] = $_POST['tanggal'];
        $data[] = $_POST['genre'];
        // simpan data barang
        
        $sql = 'INSERT INTO table_user (nama, username, password, tgl_lahir, genre_id) VALUES (?,?,?,?,?)';

        
        $row = $conn->prepare($sql);
        $row->execute($data);
        
        // redirect
        echo 'Berhasil Register!';
    }else{
        echo '<script>alert("Lengkapi Data")';
    }

?>