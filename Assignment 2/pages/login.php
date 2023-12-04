<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <script src="../scripts/javascript.js"></script>
    <title>Login</title>
</head>
<body>
<?php 
if (isset($_SESSION['user_id'])) {
    include ("headerLogged.php");
} else {
    include ("headernav.php");
} ?>

    <section id="login">
        <h2>Login</h2>
        <form action= "../private/logincheck.php" id="form2" method="POST">
            <label for="username2">Username:</label>
            <input type="text" id="username2" name="username2">

            <label for="password2">Password:</label>
            <input type="password" id="password2" name="password2">

            <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>

            <button type="submit">Login</button>
        </form>
    </section>

<?php include("footer.php"); ?>

</body>
</html>