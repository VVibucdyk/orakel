<?php require_once('../_URAA/module/function.php');

// Created By : Difa Witsqa RD 
// Date created : 29 / 09 / 2022

if(isSessionValid()) exit("Direct access not permitted.");

$valid = false;

// menangkap data post 
$p_username = isset($_POST['username']) ? filterhtml($_POST['username']) : ''; 
$p_password = isset($_POST['password']) ? filterhtml($_POST['password']) : '';  

$sign = $conn->prepare("SELECT * FROM table_user WHERE username=?");
$sign->execute([$p_username]);
$data = $sign->fetch();

$RANDSTR = md5(RandomString(32));

if(empty($p_username) || !isUsernameValid($p_username)) {
    $element = "username";
    $msg = "Username Tidak Terdaftar !";     
} else if(!isPasswordValid($p_password)) {
    $element = "password";
    $msg = "Password Tidak Valid !";        
} else if($data == 0) {
    $element = "username";
    $msg = "Username Tidak Terdaftar !";   
} else {

    $id = $data['id'];
    $username = $data['username'];
    $password = $data['password'];
    $level_id = $data['level_id'];

    $p_password = md5($p_password);

    if($p_password == $password) {
        $Masuk = $conn->prepare("UPDATE table_user SET last_login=? WHERE username=?");
        $simpan = $Masuk->execute([$today, $username]);
        $BuatSesi = $_SESSION["_URAA"] = md5($RANDSTR.$id)."|".$level_id."|".$username."|".$RANDSTR;

        if ($simpan && $BuatSesi) {
            $valid = true;
            $msg = "Login Berhasil";
        }
    } else {
        $element = "password";
        $msg = "Password Tidak Valid !"; 
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
    http_response_code(400);
    exit("Direct access not permitted.");
}
?>