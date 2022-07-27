<?php require_once('../_URAA/module/function.php');

// Created By : Difa Witsqa RD 
// Date created : 26 / 09 / 2022

// Get Serialize
// foreach ($_POST as $name => $val){
//     echo $name . ': ' . $val . "\n";
// }

$valid = false;

// menangkap data post 
$p_nama = isset($_POST['nama']) ? filterhtml($_POST['nama']) : '';
$p_username = isset($_POST['username']) ? filterhtml($_POST['username']) : ''; 
$p_pass = isset($_POST['pass']) ? filterhtml($_POST['pass']) : '';  
$p_konfirmpass = isset($_POST['konfirmpass']) ? filterhtml($_POST['konfirmpass']) : '';  
$p_tgllahir = isset($_POST['tgllahir']) ? filterhtml($_POST['tgllahir']) : '';
$p_genre = isset($_POST['genre']) ? filterhtml($_POST['genre']) : '';

if(empty($p_nama) || strlen($p_nama) < 7 || strlen($p_nama) > 25) {
    $element = "nama";
    $msg = "(Min 7 - Maks 25 Karakter)";     
} else if(empty($p_username)) {
    $element = "username";
    $msg = "Username Harus Di Isi !";    
} else if(!isUsernameValid($p_username)) {
    $element = "username";
    $msg = "(Min 6 - Maks 32 Karakter)";    
} else if(!$uraa->UsernameIsAvailable($p_username)) {
    $element = "username";
    $msg = "Username Sudah Digunakan !";
} else if(empty($p_pass)) {
    $element = "pass";
    $msg = "Password Harus Di Isi !";
} else if(!isPasswordValid($p_pass) || !isPasswordValid($p_konfirmpass)) {
    $element = "konfirmpass";
    $msg = "(Min 8 Karakter, Huruf Kecil & Besar)";
} else if(empty($p_konfirmpass)) {
    $element = "konfirmpass";
    $msg = "Konfirmasi Password Harus Di Isi !";
} else if($p_konfirmpass <> $p_pass) {
    $element = "konfirmpass";
    $msg = "Konfirmasi Password Tidak Valid";
} else if(empty($p_tgllahir)) {
    $element = "tgllahir";
    $msg = "Tanggal Lahir Harus Di Isi !";
} else if(empty($p_genre)) {
    $element = "genre";
    $msg = "Genre Harus Di Isi !";
} else {
    $register = $conn->prepare("INSERT INTO table_user (nama, username, password, tgl_lahir, genre_id) VALUES (?,?,?,?,?)");
    $simpan = $register->execute([$p_nama, $p_username, md5($p_konfirmpass), $p_tgllahir, $p_genre]);
    if ($simpan) {
        $valid = true;
        $msg = "Selamat Datang ".$p_nama;
    }
}

if (isset($msg)) {
    $send = new stdClass();
    $send->status=$valid;
    $send->info=new stdClass();
    isset($element) ? $send->info->elementid=$element : ''; 
    $send->info->msg=$msg; 
    echo json_encode($send);
} else {
// Teu Kaharti
    http_response_code(400);
}
?>