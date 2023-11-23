<?php
session_start();

require_once('../private/db_credential.php');
require_once('../private/database.php');

$db = db_connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT Username, Password FROM account WHERE Username = '$username'";

    $result_set = mysqli_query($db, $sql);
    
    if ($result_set) {
        $user = mysqli_fetch_assoc($result_set);
        if ($user && $user['Password']===$password) {
                // Successful login
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../public/account.php");
            
        }
        else {
            header("Location: ../public/data-display.php");
        }
    }
    
}

// Close the database connection
db_disconnect($db);
?>
