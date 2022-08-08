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
        $isi_artikel = $data['isi_artikel'];
        $genre_id = $data['genre_id'];
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
                $msg = 'Terjadi Error Hubungi Developer !';
            }
    // Perintah Update Artikel
        } else if($command_edit != null) {
            $p_judul = isset($_POST['judul']) ? clean($_POST['judul']) : '';
            $p_genre = isset($_POST['genre']) ? clean($_POST['genre']) : '';
            $p_artikel = isset($_POST['artikel']) ? $_POST['artikel'] : '';

            if(empty($p_judul) || strlen($p_judul) < 5 || strlen($p_judul) > 125) {
                $element = "judul";
                $msg = "(Min 5 - Maks 125 Karakter)";     
            } else if(empty($p_genre)) {
                $element = "genre";
                $msg = "Genre Cerita Harus Di Isi !"; 
            } else if(empty($p_artikel) || strlen($p_artikel) < 5 || strlen($p_artikel) > 5000) {
                $element = "artikel";
                $msg = "(Min 5 - Maks 5000 Karakter)"; 
            } else if($p_genre == $genre_id && $p_judul == $judul_artikel && md5($p_artikel)==md5($isi_artikel)) {
                $element = "artikel";
                $msg = "Whoop Kamu Belum Merubah Apapun ?";  
            } else {
                $UpdateArtikel = $conn->prepare("UPDATE table_artikel SET judul_artikel=?, genre_id=?, isi_artikel=?, tgl_publish=? WHERE kode_artikel=?");
                $simpan = $UpdateArtikel->execute([$p_judul, $p_genre, $p_artikel, $today, $kode_artikel]);
                if ($simpan) {
                    $msg = $judul_artikel;
                    $valid = true;
                } else {
                    $msg = 'Err DB Hubungi Developer !';
                }
            }
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