<?php

require_once('database.php');
//include "headerEm.php" ;
$db = db_connect();

// Handle form values sent by new.php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'] ;
    $address = $_POST['address'] ;
    $salary = $_POST['salary'];

    //$sql = "INSERT INTO employees (name, address,salary) VALUES ('$name','$address','$salary')";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false


    $id = mysqli_insert_id($db);
    //redirect to show page
    header("Location: show.php?id=  $id");


} else {
    header("Location:  new.php");
}

?>