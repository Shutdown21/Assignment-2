<?php

require_once('db_credential.php');
require_once('database.php');
$db = db_connect();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'] ;
    $password = $_POST['password'] ;

    $sql = "INSERT INTO account (username, password) VALUES ('$username','$password')";
    $result = mysqli_query($db, $sql);

    $id = mysqli_insert_id($db);
    //redirect to show page
    header("Location: account.php?id=  $id");


} else {
    header("Location:  signup.php");
}

?>