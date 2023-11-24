<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <title>Account Page</title>
</head>
<body>
<?php

if (isset($_SESSION['user_id'])) {
    include ("headerLogged.php");
} else {
    include ("headernav.php");
}

if (isset($_SESSION['user_id'])) {
    echo '<h1>Username</h1>';
    echo  $_SESSION['user_id'];
?>
    <form action="../private/logout.php">
        <button type="submit" name="logout">Log out</button>
    </form>

<?php
} else {
   // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

include("footer.php");
?>
</body>
</html>