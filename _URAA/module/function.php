<?php

session_start();

date_default_timezone_set("Asia/Jakarta");
require __DIR__ . "/condb.php";

$today = date("Y-m-d H:i:s", time());
$user_agent = $_SERVER['HTTP_USER_AGENT'];



function clean($string) {
	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

function filterhtml($data) {
	$filterhtml = trim(htmlspecialchars(strip_tags($data)));
	return $filterhtml;
}

function createUrlSlug($urlString){
	$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
	return $slug;
}

function isUsernameValid($username){
	if (preg_match('/^.{5,32}[0-9a-z._-]$/', $username)) {
		return true;
	} else {
		return false;
	}
}

function isPasswordValid($password){
	if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z@$!%*#?&\d]{8,}$/', $password)) {
		return true;
	} else {
		return false;
	}
}

function RandomString($panjang) {
	$karakter= '1345689ahjkiutreuydnxdxxddABCUOPDHGSDPLKJNVBX';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}

function isSessionValid() {

	if(isset($_SESSION['_URAA'])) {

		$SEASION_DATA = explode("|", $_SESSION['_URAA']);
		$_URAA_PID = $SEASION_DATA[0];
		$_URAA_LEVEL = $SEASION_DATA[1];
		$_URAA_USERNAME = $SEASION_DATA[2];
		$_URAA_RANDSTR = $SEASION_DATA[3];

		$db = new conuraa();
		$conlocal = $db->Open();

		$stmt = $conlocal->prepare("SELECT * FROM table_user WHERE username=?");
		$stmt->execute([$_URAA_USERNAME]);
		$data = $stmt->fetch();

		$USER_PID = md5($_URAA_RANDSTR.$data['id']);

		if($USER_PID == $_URAA_PID) {
			return true;
		} else {
			return false;
		}

	} else {
		return false;
	}
}

function getUserInfo($info) {
	if(isSessionValid()) {
		$SEASION_DATA = explode("|", $_SESSION['_URAA']);
		$_URAA_USERNAME = $SEASION_DATA[2];

		$db = new conuraa();
		$conlocal = $db->Open();

		$stmt = $conlocal->prepare("SELECT * FROM table_user WHERE username=?");
		$stmt->execute([$_URAA_USERNAME]);
		$user = $stmt->fetch();

		return $user[$info];
	}
	return "";
}

function UraaCreatePostCode() {
	if (isSessionValid()) {
		$code = uniqid();
		if (!isset($_SESSION)) {
			session_start(); 
		}
		if (!isset($_SESSION['uraa_posting_kode'])) {
			$_SESSION['uraa_posting_kode']=array(); 
		}
		array_push($_SESSION['uraa_posting_kode'],$code); 
		$uraa_post = $_SESSION['uraa_posting_kode'];
		return $code;
	} else {
		return false;
	}
}

function UraaPostCodeValid($code) {
	$valid = false;
	if (isSessionValid()) {
		if(isset($_SESSION['uraa_posting_kode'])) {
			if(in_array($code, $_SESSION['uraa_posting_kode'])) {
				$valid = true;
			} 
		} 
	} 
	return $valid;
}

function UraaRmvPostCode($code) {
	$success = false;
	if (isSessionValid()) {
		if(isset($_SESSION['uraa_posting_kode'])) {
			if (($key = array_search($code, $_SESSION['uraa_posting_kode'])) !== false) {
				unset($_SESSION['uraa_posting_kode'][$key]);
				$success = true;
			}
		}
	}
	return $success;
}

function formattglwaktu($tanggal){
	$bulan = array (
		1 =>   			
		'Januari',
		'Febuari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode(' ', $tanggal);
	$tanggal = explode('-', $pecahkan[0]);
	$waktu = explode(':', $pecahkan[1]);

	return $tanggal[2] . ' ' . $bulan[ (int)$tanggal[1] ] . ' ' . $tanggal[0] . ' ' . $waktu[0] . ':' . $waktu[1];
}

function listGenreIndex() {
	$db = new conuraa();
	$conlocal = $db->Open();

	$sql = "SELECT * FROM table_genre";
	$row = $conlocal->prepare($sql);
	$row->execute();
	$genre = $row->fetchAll();

	$start = 1;
	$max = 3;
	$Output = "";
	foreach ($genre as $key => $value) {

		$Output .= $start == 1 ? '<div class="dropdown-content">' : '';
		$Output .= '<a onclick="Open(\'public/list_artikel?page=1&konten='.$value['id'].'\', true)" class="magic-title" data-deskripsi="'.$value['deskripsi_genre'].'">'.$value['nama_genre'].'</a>';
		$Output .= $start == $max ? '</div>' : ''; 

		$start == $max ? $start = 1 : $start++;
	}
	echo $Output;
}

function listGenre() {
	$db = new conuraa();
	$conlocal = $db->Open();

	$sql = "SELECT * FROM table_genre";
	$row = $conlocal->prepare($sql);
	$row->execute();
	$genre = $row->fetchAll();

	foreach ($genre as $key => $value) {
		echo '<option value="'.$value['id'].'">'.$value['nama_genre'].'</option>';
	}
}

function listArtikel($genre, $CURRENT_PAGE=null, $MAX_PAGE=null) {
	
	$db = new conuraa();
	$conlocal = $db->Open();

	// JUMLAH SEAMUA ARTIKEL DEANGAN GENRE WHERE
	$sql = "SELECT table_genre.nama_genre, 
	table_user.nama, username,
	 table_user.link_foto, judul_artikel, 
	 isi_artikel, 
	 tgl_publish, 
	 table_artikel.id as id 
	 FROM table_artikel 
	 LEFT JOIN table_genre ON table_artikel.genre_id=table_genre.id 
	 LEFT JOIN table_user ON table_artikel.user_id=table_user.id 
	 WHERE table_artikel.genre_id=?";
	$row = $conlocal->prepare($sql);
	$row->execute([$genre]);
	$jml_artikel = $row->fetchAll();
	$data['jml_artikel'] = count($jml_artikel);
	
	$sql = "SELECT table_genre.nama_genre, 
	table_user.nama, username,
	 table_user.link_foto, judul_artikel, 
	 isi_artikel, 
	 tgl_publish, 
	 table_artikel.id as id 
	 FROM table_artikel 
	 LEFT JOIN table_genre ON table_artikel.genre_id=table_genre.id 
	 LEFT JOIN table_user ON table_artikel.user_id=table_user.id 
	 WHERE table_artikel.genre_id=?
	 LIMIT ".$MAX_PAGE." OFFSET ".$CURRENT_PAGE."";
	$row = $conlocal->prepare($sql);
	$row->execute([$genre]);
	$artikel = $row->fetchAll();
	$data['list_artikel'] = $artikel;

	$sql = "SELECT table_genre.nama_genre FROM table_genre WHERE id=?";
	$row = $conlocal->prepare($sql);
	$row->execute([$genre]);
	$nama_genre = $row->fetch();
	$data['nama_genre'] = $nama_genre;

	return $data;
}

function ArtikelKu() {
	if(isSessionValid()) {
		$db = new conuraa();
		$conlocal = $db->Open();

		$sql = "SELECT table_genre.nama_genre,table_user.nama, username, table_user.link_foto, kode_artikel, tgl_publish, judul_artikel, isi_artikel, table_artikel.id as id FROM table_user LEFT JOIN table_artikel ON table_user.id=table_artikel.user_id LEFT JOIN table_genre ON table_artikel.genre_id=table_genre.id WHERE". (getUserInfo('level_id')==2 ? "" : " table_user.username='".getUserInfo('username')."' AND ") . " tgl_publish IS NOT NULL ORDER BY tgl_publish DESC";
		$row = $conlocal->prepare($sql);
		$row->execute();
		$artikel = $row->fetchAll();
		$data = $artikel;

		return $data;
	}
}

function readArtikel($id_artikel) {
	$db = new conuraa();
	$conlocal = $db->Open();

	$sql = "SELECT table_genre.nama_genre,table_user.nama, username, table_user.link_foto, tgl_publish, judul_artikel, isi_artikel, table_artikel.id as id FROM table_artikel LEFT JOIN table_genre ON table_artikel.genre_id=table_genre.id LEFT JOIN table_user ON table_artikel.user_id=table_user.id WHERE table_artikel.id=?";
	$row = $conlocal->prepare($sql);
	$row->execute([$id_artikel]);
	$artikel = $row->fetch();
	$data = $artikel;

	return $data;
}

// function truncate($str, $maxLength, $append = '...') {
//     if (strlen($str) > $maxLength) {
//         $str = substr($str, 0, $maxLength);
//         $str = preg_replace('/\s+.*?$/', '', $str); // this line is important for you
//         $str = trim($str);
//         $str .= $append
//     }

//     return $str;
// }


?>