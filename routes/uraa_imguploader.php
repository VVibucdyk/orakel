<?php 

require_once('../_URAA/module/function.php');
if(!isSessionValid()) exit("Direct access not permitted.");

// Created BY : Difa Witsqa RD
// Created Date : 07/08/2022

$nama_user = getUserInfo('nama');
$username_user = getUserInfo('username');

$success = false;
$msg = "Kesalahan Tidak Di Ketahui !";

if(isset($_FILES['upload']['name']) && isset($_GET['uraa'])) {

	//Validasi Kode Tersedia Di Dalam Arry Seasion Posting
	if (UraaPostCodeValid($_GET['uraa'])) {

		$sesaion_code = $_GET['uraa'];

		$artikelku = $conn->prepare("SELECT * FROM table_artikel WHERE MD5(kode_artikel) =?");
		$artikelku->execute([$sesaion_code]);
		$data = $artikelku->fetch();
		$jumlahdata = $artikelku->rowCount();

		if($jumlahdata == 1) {
			$kode_artikel = md5($data['kode_artikel']);
			if ($kode_artikel == $sesaion_code) {
				$sesaion_code = $data['kode_artikel'];
			}
		}

		//URL Folder Lokasi Gambar Setelah Di Upload
		$url_konten = "_URAA/images/konten/{$username_user}/{$sesaion_code}";

		$folder_konten = "../_URAA/images/konten/";
		$folder_user = $folder_konten.$username_user;
		$folder_artikel =  $folder_user."/".$sesaion_code;

		// Buat Folder Khusus User Berdasarkan Username
		if (!file_exists($folder_user)) {
			mkdir($folder_user);
		}

		// Buat Folder Berdasarkan Kode Artikel Yg Dibuat
		if (!file_exists($folder_artikel)) {
			mkdir($folder_artikel);
		} 

		// file temp
		$file = $_FILES['upload']['tmp_name'];

		// ambil nama, size, extensi file
		$file_name = $_FILES['upload']['name'];
		$sizefile = filesize($file);
		$filenameonly = pathinfo($file_name, PATHINFO_FILENAME);
		$extension = pathinfo($file_name, PATHINFO_EXTENSION);

		//extensi file yang di izinkan
		$allowed_extension = array("jpg", "jpeg", "gif", "png");

		// cek apakah folder user & konten ada ?
		if (file_exists($folder_user) && file_exists($folder_artikel)) {
			// Cek Ukuran File Maks 2MB
			if ($sizefile <= 2097152) {
				// Cek Extensi File Sesuai dengan yg di izinkan
				if(in_array($extension, $allowed_extension)) {
					// jika nama file sama
					if (file_exists("{$folder_artikel}/{$file_name}")) {
						// jika md5 file sama gambar tidak akan di upload tapi mnggunakan file yang sama trsbt
						if(md5_file("{$folder_artikel}/{$file_name}") == md5_file($file)) {
							$url_konten = $url_konten. "/" .$file_name;
							$success = true;
						} else {
							// jika md5 file tidak sama & nama file sama akan menamabh nama akhir _1++ 
							// setiap pengecekan nama di cek juga md5 tiap filenya sampai nama tidak sama
							// tetapi jika ditemukan md5 sama maka akan mengakhiri looping & mnggunakan file yang sama trsbt
							$i = 1;
							while (file_exists("{$folder_artikel}/{$filenameonly}_{$i}.{$extension}")) {
								if(md5_file("{$folder_artikel}/{$filenameonly}_{$i}.{$extension}") == md5_file($file)) {
									$url_konten = "{$url_konten}/{$filenameonly}_{$i}.{$extension}";
									$success = true;
									break;
								} else {
									$i++;
								}
							}
							if (!$success) {
								$success = move_uploaded_file($file, "{$folder_artikel}/{$filenameonly}_{$i}.{$extension}");
								$url_konten = "{$url_konten}/{$filenameonly}_{$i}.{$extension}";
							}
						}
					} else {
						$url_konten = $url_konten. "/" .$file_name;
						$success = move_uploaded_file($file, $folder_artikel . "/" .$file_name);
					}
				} else {
					$msg = "Extensi '{$extension}' Tidak Di Dukung !";
				}
			} else {
				$msg = "Ukuran File Terlalu Besar, Maks 2MB";
			}
		} else {
			$msg = "Folder Artikel Gagal Dibuat !";
		}
	}
}

$send = new stdClass();

if ($success) {
	$send->uploaded=$success;
	$send->fileName=$file_name;
	$send->url=$url_konten;
} else {
	$send->uploaded=false;
	$send->error=new stdClass();
	$send->error->message=$msg; 
}

echo json_encode($send);

?>