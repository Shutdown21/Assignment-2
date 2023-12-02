<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <script src="../private/javascript.js"></script>
    <title>Sign Up</title>
</head>
<body>

<?php 
session_start();
if (isset($_SESSION['user_id'])) {
    include ("headerLogged.php");
} else {
    include ("headernav.php");
} ?>

    <section id="signup">
        <h2>Sign Up</h2>
        <form action= '../private/create.php' id="form1" method= "POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <p>Already have an account? <a href="login.php">Log in here</a>.</p>

            <button type="submit">Sign Up</button>
        </form>
    </section>

    <<?php include("footer.php"); ?>

</body>
</html>