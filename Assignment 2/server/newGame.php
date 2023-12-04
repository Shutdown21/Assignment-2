<?php

require_once('../database/db_credential.php');
require_once('../database/database.php');
$db = db_connect();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'] ;
    $developer = $_POST['developer'] ;
    $platform = $_POST['platform'] ;
    $genre = $_POST['genre'] ;


    $sql = "INSERT INTO games (name, developer, platform, genre) VALUES ('$name', '$developer', '$platform', '$genre')";
    $result = mysqli_query($db, $sql);

    $id = mysqli_insert_id($db);
    //redirect to show page
    header("Location: ../pages/gameLibrary.php?id=  $id");


} else {
    header("Location:  ../pages/newGameEntry.php");
}

?>