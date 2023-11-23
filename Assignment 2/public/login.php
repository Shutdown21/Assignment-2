<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <script src="../private/javascript.php"></script>
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
        <form action= "../private/logincheck.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>

            <button type="submit">Login</button>
        </form>
    </section>

<?php include("footer.php"); ?>

</body>
</html>