<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data Display</title>
</head>
<body>

<?php 
session_start();
if (isset($_SESSION['user_id'])) {
    include ("headerLogged.php");
} else {
    include ("headernav.php");
} ?>

<section id="data-display">
    <h2>Data Display with Search</h2>

    <form id="search-form" method="post">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search">
        

        <button type="submit">Search</button>
    </form>

    <div id="display-container">
        <?php
            require_once('../private/database.php');
            $db = db_connect();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $searchTerm = mysqli_real_escape_string($db, $_POST['search']);

                $sql = "SELECT * FROM games WHERE 
                        Name LIKE '%$searchTerm%' OR
                        Developer LIKE '%$searchTerm%' OR
                        Platform LIKE '%$searchTerm%' OR
                        Genre LIKE '%$searchTerm%'";
            } else {
                $sql = "SELECT * FROM games";
            }

            $result_set = mysqli_query($db, $sql);

            while ($gameData = mysqli_fetch_assoc($result_set)) {
                echo '<div class="game-entry">';
                echo '<h3>' . $gameData['Name'] . '</h3>';
                echo '<p><strong>Developer:</strong> ' . $gameData['Developer'] . '</p>';
                echo '<p><strong>Platform:</strong> ' . $gameData['Platform'] . '</p>';
                echo '<p><strong>Genre:</strong> ' . $gameData['Genre'] . '</p>';
                echo '</div>';
            }
        ?>
    </div>
</section>

    <?php include("footer.php"); ?>

</body>
</html>
