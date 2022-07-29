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
  if(isset($_SESSION)){
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
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/iziToast.min.css" />
  <link rel="stylesheet" href="_URAA/css/costum.css" />
  <noscript>
    <link rel="stylesheet" href="assets/css/noscript.css" />
  </noscript>
</head>

<div class="topnav">
  <div class="topnav-right">
    <?php if ($islogin) { ?>
      <a href="public/keluar.php">Logout</a>
    <?php } else { ?>
      <a onclick="Open('public/register');">Daftar</a>
      <a onclick="Open('public/masuk');">Masuk</a>
    <?php } ?>
  </div>
</div>

<body class="is-preload">
  <!-- Wrapper -->
  <div id="wrapper">
    <!-- Header -->
    <header id="header">

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
              <a class="dropbtn" id="artikel">Artikel
                <i class="fa fa-caret-down"></i>
              </a>
              <div class="dropdown-content">
                <a
                class="magic-title"
                data-deskripsi="sesuatu yang belum diketahui dengan pasti dan menarik keingintahuan-erat kaitannya dengan kejadian horor dan supranatural. MISTERI apa yang ada disekitar mu?">
                Misteri
              </a>
              <a
              class="magic-title"
              data-deskripsi="Mitos=muthos (bahasa Yunani) cerita berlatar masa lampau mengenai alam semesta dan keberadaan makhluk di dalamnya dan dianggap benar-benar terjadi ">
              Mitos
            </a>
            <a
            class="magic-title"
            data-deskripsi="Kisah suci yang menceritakan bagaimana dunia dan manusia dapat terbentuk seperti sekarang, meskipun masih menjadi MISTERI ">
            Mitologi
          </a>
          <a
            class="magic-title"
            data-deskripsi="Suatu teori yang menjelaskan penyebab sebuah peristiwa rahasia untuk memperdaya orang banyak yang dilakukan sekelompok orang (organisasi) tinggi & berkuasa ">
            Konspirasi
          </a>
          <a
            class="magic-title"
            data-deskripsi="Legenda kontemporer yang sering kali dipercaya secara luas sebagai sebuah kebenaran ">
            Urban Legend
          </a>
        </div>
      </div>
    </li>
    <li>
      <div class="dropdown">
        <a class="dropbtn">Game<i class="fa fa-caret-down"></i></a>
        <div class="dropdown-content">
          <a onclick="Open('public/ritual');">Ritual</a>
          <a onclick="Open('public/tanyadozzkiller');">Tanya</a>
          <a onclick="Open('public/ramalankematian');">Kematian</a>
        </div>
      </div>
    </li>
    <?php if ($islogin) { ?>
      <li>
        <a
        class="magic-title"
        data-deskripsi="Edit Ceritamu Bla Bla Bla Bla Bla Bla Bla Bla Bla Slebew" 
        onclick="Open('public/sejarah');">
        Edit
      </a>
    </li>
    <li>
      <a 
      class="magic-title"
      data-deskripsi="Ceritakan Ceritamu Bla Bla Bla Bla Bla Bla Bla Bla Bla Slebew" onclick="Open('public/posting_cerita');">
      Posting
    </a>
  </li>
<?php } ?>
<li><a onclick="Open('public/team');">Credit</a></li>
</ul>
</nav>

</header>

<!-- Main -->
<div id="main">
  <article id="pages"></article>
</div>

<!-- Footer -->
<footer id="footer">
  <p class="seehay">HANYA FIKTIF BELAKA !</p>
</footer>
</div>

<!-- BG -->
<div id="bg"></div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/iziToast.min.js"></script>
<script src="_URAA/js/main-costum.js"></script>
<script src="_URAA/js/costum.js"></script>
<script src="assets/js/ckeditor.js"></script>

</body> 
</html>
