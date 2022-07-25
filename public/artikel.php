<?php 

require_once('../routes/Artikel.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>

    <link rel="stylesheet" href="../_URAA/css/card_profile_information.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="../_URAA/css/costum.css" />
    
    <noscript>
      <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>
</head>
<body>

    <article class="active" id="">
        <h2 id="judul_cerita" class="major"> <?=$genre['judul_artikel']?> </h2>
        <h6 id="tgl_publish" class="major" style="margin-left : 50%; width:40%; border-bottom:0;">Tanggal Publish :<?php echo $genre['tgl_publish'] ?></h6>

        <div style="border:2px solid white; height:700px;">
            <h1 id="isi_artikel" class="major" style="border-bottom : 0px;">== ISI CERITA ==</h1>
        </div>

        <div class="card" style="width: 800px ;">
            <div class="img">
            <img src="https://images.unsplash.com/photo-1610216705422-caa3fcb6d158?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDB8fGZhY2V8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
            </div>
            <div class="infos">
            <div class="name">
                <h2>John Doe</h2>
                <h4>@johndoe</h4>
            </div>
            <p class="text">
                Seorang ghost buster kayak scooby doo.
            </p>
            <ul class="stats">
                <li>
                <h3>15K</h3>
                <h4>Views</h4>
                </li>
                <li>
                <h3>Cerita</h3>
                <h4>69</h4>
                </li>
                <li>
                <h3>Genre</h3>
                <h4>Misteri</h4>
                </li>
            </ul>
            <!-- <div class="links">
                <button class="follow">Follow</button>
                <button class="view">View profile</button>
            </div> -->
            </div>
        </div>

    </article>
    
    
    <!-- Scripts -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/browser.min.js"></script>
    <script src="../assets/js/breakpoints.min.js"></script>
    <script src="../assets/js/util.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../_URAA/js/costum.js"></script>
    <script src="../_URAA/js/tanyadozkiller.js"></script>
    <script src="../_URAA/js/ramalankematian.js"></script>

    <!-- <script>

    </script> -->
</body>
</html>