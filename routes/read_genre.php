<?php 

// Created by : fajar alam
// Created date : 20/07/2022

require_once('../_URAA/module/function.php');


$sql = 'SELECT * from table_genre';


$row = $conn->prepare($sql);
$row->execute();
$genre = $row->fetchAll();

?>