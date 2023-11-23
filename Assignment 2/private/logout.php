<?php
session_start();

require_once('../private/db_credential.php');
require_once('../private/database.php');

if (isset($_SESSION['user_id'])) {
    include("../public/headerLogged.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
        // Logout action
        session_unset();
        session_destroy();
        header("Location: ../public/login.php");
        exit();
    }

} else {
    // Redirect to login page if not logged in
    header("Location: ../public/login.php");
    exit();
}

include("../public/footer.php");
?>