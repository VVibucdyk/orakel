<?php require_once('../_URAA/module/function.php');

// Created By : Difa Witsqa RD 
// Date created : 11 / 08 / 2022

if (!isSessionValid()) exit("Direct access not permitted.");

$valid = false;

// menangkap data post 
$p_pass_lama = isset($_POST['pass_lama']) ? filterhtml($_POST['pass_lama']) : '';
$p_pass_baru = isset($_POST['pass_baru']) ? filterhtml($_POST['pass_baru']) : '';
$p_konfirm_baru = isset($_POST['konfirm_baru']) ? filterhtml($_POST['konfirm_baru']) : '';

if (!isPasswordValid($p_pass_lama)) {
    $element = "pass_lama";
    $msg = "Password Lama Tidak Valid !";
} else if (!isPasswordValid($p_konfirm_baru)) {
    $element = "konfirm_baru";
    $msg = "(Min 8 Karakter, Huruf Kecil & Besar)";
} else if ($p_pass_baru <> $p_konfirm_baru) {
    $element = "konfirm_baru";
    $msg = "Konfirmasi Password Tidak Valid";
} else if (getUserInfo('password') <> md5($p_pass_lama)) {
    $element = "pass_lama";
    $msg = "Password Lama Tidak Valid";
} else if (getUserInfo('password') == md5($p_konfirm_baru)) {
    $element = "pass_baru";
    $msg = "Password Baru Masih Sama Dengan Yang Lama !";
} else {

    $p_konfirm_baru = md5($p_konfirm_baru);

    $Masuk = $conn->prepare("UPDATE table_user SET password=? WHERE id=?");
    $simpan = $Masuk->execute([$p_konfirm_baru, getUserInfo('id')]);

    if ($simpan) {
        $valid = true;
        $msg = "Password Berhasil Di Ubah";
    }
}

if (isset($msg)) {
    $send = new stdClass();
    $send->status = $valid;
    $send->info = new stdClass();
    isset($element) ? $send->info->elementid = $element : '';
    $send->info->msg = $msg;
    echo json_encode($send);
} else {
    http_response_code(400);
    exit("Direct access not permitted.");
}
