<?php require_once('../_URAA/module/function.php');

foreach ($_POST as $name => $val)
{
   echo htmlspecialchars($name . ': ' . $val) . "\n";
}
die();

if(!empty($_POST['username'])){
    // menangkap data post 
    $data[] = $_POST['nama'];
    $data[] = $_POST['username'];
    $data[] = $_POST['pass'];
    $data[] = $_POST['tgllahir'];
    $data[] = $_POST['genre'];

    // simpan data
    $register = $conn->prepare("INSERT INTO table_user (nama, username, password, tgl_lahir, genre_id) VALUES (?,?,?,?,?)");
    $simpan = $register->execute($data);

    // Out
    if ($simpan) {
        echo 'Berhasil Register!';
    } else {
        echo 'Gagal Register!';
    }
} else {
    echo 'Lengkapi Data';
}

?>