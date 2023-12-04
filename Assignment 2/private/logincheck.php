<?php
session_start();

require_once('../database/db_credential.php');
require_once('../database/database.php');

$db = db_connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username2"];
    $password = $_POST["password2"];

    $sql = "SELECT id, Username, Password FROM account WHERE Username = '$username'";

    $result_set = mysqli_query($db, $sql);
    
    if ($result_set) {
        $user = mysqli_fetch_assoc($result_set);
        if ($user && $user['Password']===$password) {
                // Successful login
            $_SESSION['user_id'] = $user['Username'];
            echo json_encode(["success" => true, "redirect" => "../pages/account.php"]);
        } else {
            echo json_encode(["success" => false, "error" => "Invalid username or password"]);
        }
    }
}

// Close the database connection
db_disconnect($db);
?>