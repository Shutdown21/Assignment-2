<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <title>Data Entry</title>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['user_id'])) {
    include ("headerLogged.php");
} else {
    include ("headernav.php");
} ?>

    <section id="data-entry">
    <h2>New Game Entry</h2>
        <form action= '../private/newGame.php' method= "POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="developer">Developer:</label>
            <input type="text" id="developer" name="developer" required>

            <label for="platform">Platform:</label>
            <input type="text" id="platform" name="platform" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" required>

            <button type="submit">Submit</button>
        </form>
    </section>

<?php include("footer.php"); ?>

</body>
</html>>