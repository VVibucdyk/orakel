<?php 

require_once('../connection.php');

    // $slug_artikel = $_POST['slug'];
    $slug_artikel = "siluman-buruk-rupa";
            
    $sql = 'SELECT *, table_artikel.id as id from table_artikel 
    INNER JOIN table_user ON table_artikel.user_id  = table_user.id
    INNER JOIN table_genre ON table_artikel.genre_id  = table_genre.id
    where table_artikel.slug = "'.$slug_artikel.'"
    ';


    $row = $conn->prepare($sql);
    $row->execute();

    echo "<pre>";
    var_dump($row->fetchAll());
    echo "</pre>";
    die();

?>