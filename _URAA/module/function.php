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

function listGenreIndex() {
	$db = new conuraa();
	$conlocal = $db->Open();

	$sql = "SELECT * FROM table_genre";
	$row = $conlocal->prepare($sql);
	$row->execute();
	$genre = $row->fetchAll();

	foreach ($genre as $key => $value) {
		echo '<a
		class="magic-title"
		data-deskripsi="'.$value['deskripsi_genre'].'">
		'.$value['nama_genre'].'
		</a>';
	}
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


?>