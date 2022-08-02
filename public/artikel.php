<?php 

require_once("../_URAA/module/function.php");

$artikel = readArtikel($_GET['val']);


?>

<h2 id="judul_cerita" class="major"> <?=$artikel['judul_artikel']?> </h2>
<h6 id="tgl_publish" class="major" style="margin-left : 50%; width:40%; border-bottom:0;">Tanggal Publish : <?=$artikel['tgl_publish']?></h6>

<div style="border:2px solid white; height:auto;" id="container-read">
    <h1 id="isi_artikel" class="major" style="border-bottom : 0px;"><?=$artikel['isi_artikel']?></h1>
</div>

<div class="card" style="width:auto;">
    <div class="img">
        <img src="https://images.unsplash.com/photo-1610216705422-caa3fcb6d158?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDB8fGZhY2V8ZW58MHwyfDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60">
    </div>
    <div class="infos">
        <div class="name">
            <h2><?=$artikel['nama']?></h2>
            <h4 style="color: white;">*<?=$artikel['username']?></h4>
        </div>
        <p class="text">
            Seorang ghost buster kayak scooby doo.
        </p>
        <ul class="stats">
            <li>
                <h4>15K</h4>
                <h5>Views</h5>
            </li>
            <li>
                <h4>Cerita</h4>
                <h5>69</h5>
            </li>
            <li>
                <h4>Genre</h4>
                <h5>Misteri</h5>
            </li>
        </ul>
        <!-- <div class="links">
                <button class="follow">Follow</button>
                <button class="view">View profile</button>
            </div> -->
    </div>
</div>

<script>
    $("#container-read").ready(function() {
        ClassicEditor
        .create( document.querySelector( '#isi_artikel' ), {
            // ...
        } )
        .then( editor => {
            const toolbarElement = editor.ui.view.toolbar.element;
            editor.enableReadOnlyMode( 'my-feature-id' );
            toolbarElement.style.display = 'none';
        } )
        .catch( error => {
            console.log( error );
        } );
        
    });
</script>