<?php

//session_start();

date_default_timezone_set("Asia/Jakarta");
require __DIR__ . "/condb.php";

$now_date = date("Y-m-d H:i:s", time());
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
?>    