<?php require('_URAA/module/function.php');

// Created By : Difa Witsqa RD 
// Date created : 29 / 09 / 2022

$islogin = false;

if (isSessionValid()) {

  $islogin = true;
  //echo $_SESSION["_URAA"];

  $IDKu       = getUserInfo('id');
  $NamaKu     = getUserInfo('nama');
  $UsernameKu = getUserInfo('username');
  $TglLahirKu = getUserInfo('tgl_lahir');
  $LevelKu    = getUserInfo('level_id');
  $LinkFotoKu = getUserInfo('link_foto');
} else {
  if (isset($_SESSION)) {
    session_destroy();
  }
}



?>

<!DOCTYPE html>

<!--

Template by html5up.net | @ajlkn
Edit By Difa WRD 10121919 & Stefani Olga 10121908

-->

<html>

<head>
  <title>ORAKEL - PORTAL BERBAGI CERITA HORROR</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="_URAA/css/card_profile_information.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/iziToast.min.css" />
  <link rel="stylesheet" href="assets/css/ckeditor5-styles.css" />
  <link rel="stylesheet" href="_URAA/css/costum.css" />
  <link rel="stylesheet" href="_URAA/css/custom_skeleton.css" />
  <link rel="stylesheet" href="_URAA/css/custom_pagination.css" />
  <noscript>
    <link rel="stylesheet" href="assets/css/noscript.css" />
  </noscript>
</head>

<div class="topnav">
  <div class="topnav-right">
    <?php if ($islogin) { ?>
      <a href="public/keluar">Logout</a>
    <?php } else { ?>
      <a onclick="Open('public/register', true);">Daftar</a>
      <a onclick="Open('public/masuk', true);">Masuk</a>
    <?php } ?>
  </div>
</div>

<body class="is-preload">
  <!-- Wrapper -->
  <div id="wrapper">
    <!-- Header -->
    <header id="header">
     <?php if ($islogin) { ?>
      <div class="user-info">
        <h4>Hai</h4>
        <h3><?= $NamaKu ?></h3>
      </div>
    <?php } ?>
    <div class="content">
      <div class="inner">
        <div id="magic-title">
          <h1>SELAMAT DATANG</h1>
          <h2>DI GERBANG OSIRIS</h2>
          <p><b>"MEREKA BILANG JANGAN TAKUT!!!"</b></p>
        </div>
      </div>
    </div>

    <nav>
      <ul>
        <li>
          <div class="dropdown">
            <a class="dropbtn">Artikel
              <i class="fa fa-caret-down"></i>
            </a>
            <div class="dropdown-content">
              <div class="wrapper">
                <?php listGenreIndex() ?>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="dropdown">
            <a class="dropbtn">Game<i class="fa fa-caret-down"></i></a>
            <div class="dropdown-content">
              <a onclick="Open('public/ritual', true);">Ritual</a>
              <a onclick="Open('public/tanyadozzkiller', true);">Tanya</a>
              <a onclick="Open('public/ramalankematian', true);">Kematian</a>
            </div>
          </div>
        </li>
        <?php if ($islogin) { ?>
          <li>
            <a class="magic-title" data-deskripsi="Posting cerita mu disini !!! Pengalaman - Kejadian nyata - Mitos - Misteri di sekitar mu. BAGIKAN DISINI JIKA ANDA BERANI !!!" onclick="Open('public/posting_cerita', true);">
              Posting
            </a>
          </li>
          <li>
            <a class="magic-title" data-deskripsi="Menu ini untuk menghapus atau memperbarui postingan kamu. Hati Hati Menggunakan Menu ini, postingan yang sudah dihapus tidak dapat dikembalikan !" onclick="Open('public/artikelku', true);">
              Kelola
            </a>
          </li>
        <?php } ?>
        <li>
          <a onclick="Open('public/tentang', true);">Tentang</a>
        </li>
      </ul>
    </nav>

  </header>

  <!-- Main -->
  <div id="main">
    <article id="pages"></article>
  </div>

  <!-- Footer -->
  <footer id="footer">
    <p class="seehay">©2022 By <a onclick="Open('public/team', true);">Uraa Team</a></p>
  </footer>
</footer>
</div>

<!-- BG -->
<div id="bg"></div>

<!-- Scripts -->
<script>
  // Modified BY : fajar alam
  // Modified Date : 2020-01-21
  // Modified Description :
  // VARIABLE UNTUK MENAMPUNG PREVIOUS WINDOW / MODAL UNTUK CUSTOM js dan MAIN-CUSTOM js
  var PREV_LINK = [];

  // CARA PAKAINYA :
  // JIKA AKSI OPEN ITU HARUS ADA PREVIOUS NYA, MAKA KETIKA MEMANGGIL Fungsi Open(string[link_nya], true) Passing boolean true pada parameter 2, maka akan menampilkan modal sebelumnya.
</script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/iziToast.min.js"></script>
<script src="_URAA/js/costum.js"></script>
<script src="_URAA/js/main-costum.js"></script>
<script src="assets/node_modules/@ckeditor/ckeditor5-build-decoupled-document/build/ckeditor.js"></script>
</body>

</html>