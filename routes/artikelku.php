<?php require_once('../_URAA/module/function.php');

// Created By : Difa Witsqa RD 
// Date created : 06 / 08 / 2022

if(!isSessionValid()) exit("Direct access not permitted.");

$nama_user = getUserInfo('nama');
$username_user = getUserInfo('username');

$valid = false;
$element = "result-box";
$msg = "Kesalahan Tidak Di Ketahui"; 

// menangkap data post & menyesuaikan sesuai perintah value
$command_delete = isset($_POST['delete']) ? filterhtml($_POST['delete']) : null;
$command_edit = isset($_POST['edit']) ? filterhtml($_POST['edit']) : null; 

$p_artikel_code = $command_delete != null ? $command_delete : ($command_edit != null ? $command_edit : null);

if ($p_artikel_code != null) {
    $artikelku = $conn->prepare("SELECT * FROM table_artikel WHERE kode_artikel=?");
    $artikelku->execute([$p_artikel_code]);
    $data = $artikelku->fetch();

    if($data == 0) {
        $msg = "Kode Artikel Tidak Valid !";   
    } else {

        $kode_artikel = $data['kode_artikel'];
        $judul_artikel = $data['judul_artikel'];
        $url_konten = "../_URAA/images/konten/{$username_user}/{$kode_artikel}";

    // Perintah Hapus Artikel
        if($command_delete != null) {
            $DeletImage = true;

            if (file_exists($url_konten)) {
                $DeletImage = deleteFile($url_konten);
            }

            if ($DeletImage) {
                $delete = $conn->query("DELETE FROM table_artikel WHERE kode_artikel ='$kode_artikel'");
                if ($delete) {
                    $valid = true;
                    $msg = $judul_artikel;
                }
            } else {
                $msg = 'Gagal, Hubungi Developer !';
            }
    // Perintah Update Artikel
        } else if($command_edit != null) {

            

    // Jika Tidak Ada Perintah Delet / Update
        } else {

        }
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