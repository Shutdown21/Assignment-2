<?php

require_once('../database/db_credential.php');
require_once('../database/database.php');
$db = db_connect();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'] ;
    $password = $_POST['password'] ;

    $sql = "INSERT INTO account (username, password) VALUES ('$username','$password')";
    $result = mysqli_query($db, $sql);

    if ($result) {
        $id = mysqli_insert_id($db);

        // Log in the user immediately after signup
        session_start();
        $_SESSION['user_id'] = $id;

        // Redirect to the account page
        header("Location: ../pages/account.php");
        exit();
    } else {
        // Handle database insertion error
        echo "Error: " . mysqli_error($db);
    }
} else {
    // Redirect to the signup page if not a POST request
    header("Location:  ../pages/signup.php");
    exit();
}

?>