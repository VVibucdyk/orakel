
<?php 
// craeted_by : Fajar Alam
// created_at : 31-07-2022
require_once('../_URAA/module/function.php');

$list_artikel = listArtikel($_GET['val']);
?>

<h2 class="major"><?=$list_artikel['nama_genre']['nama_genre']?></h2>
<?php if(count($list_artikel['list_artikel']) > 0) : ?>
<div style="margin-top: 3% ;">
    <!-- columns should be the immediate child of a .row -->
    <?php $i=0; foreach ($list_artikel['list_artikel'] as $key => $value) :?>
        <div class="row">
            <div style="margin-top:4em" class="four columns">
                <img width="100%" height="auto" src="_URAA/images/gambar-kuncen.jpg" alt="">
                <h6 style="text-align:center ;"><?=$value['username']?></h6>
            </div>
            <div class="eight columns">
                <a onclick="Open('public/artikel?val=<?=$value['id']?>');" class="magic-title" >
                    <h4 style="text-align:center;"><?=$value['judul_artikel']?></h4>
                </a>
                
                <hr style="margin: auto; margin-top:10px;" width="30%">

                <div id="container-read" style="margin-top: 3% ;">
                    <div id="editor-read<?=$i?>">
                        <p>
                            <?=substr(str_replace( '&', '&amp;', $value['isi_artikel']),0 , 200);?> ...
                        </p>
                    </div>
                    <span>
                        <?=strlen(str_replace( '&', '&amp;', $value['isi_artikel'])) > 100 ? '<a class="magic-title" onclick="Open(\'public/artikel?val='.$value['id'].'\');">Selengkapnya...</a>' : ''?>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="twelve columns">
                <hr>
            </div>
        </div>
    <?php $i++; endforeach ?>
<?php else : ?>
    <h3>Artikel tidak tersedia</h3>
<?php endif ?>
</div>

<script>
    var num = 0;
    $("#container-read").ready(function() {
        do {
            ClassicEditor
            .create( document.querySelector( '#editor-read'+num ), {
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
            num++;
        } while (num < <?=count($list_artikel['list_artikel'])?>);
        
    });
</script>