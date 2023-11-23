<?php
session_start();

require_once('../private/db_credential.php');
require_once('../private/database.php');

$db = db_connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    $sql = "SELECT id, Username, Password FROM account WHERE Username = '$username'";
    
    $result_set = mysqli_query($db, $sql);
    
    if ($result_set) {
        $user = mysqli_fetch_assoc($result_set);

        if ($user && password_verify($password, $user['Password'])) {
            // Successful login
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../public/account.php"); // Redirect to the account page
            exit();
        } else {
            // Invalid username or password
            header("Location: ../public/login.php?login_error=true");
            exit();
        }
    } else {
        // Database query error
        echo "Database query error: " . mysqli_error($db);
    }
}

// Close the database connection
db_disconnect($db);
?>
