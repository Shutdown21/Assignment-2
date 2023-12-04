<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Game Library</title>
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
    <form id="search-form" method="post">
        <h2>Search</h2>
        <input type="text" id="search" name="search">
        <button type="submit">Search</button>
    </form>

    <form id="filter-form" method="post">
        <h2>Filter</h2>
        <label for="developer">Developer:</label>
        <input type="text" id="developer" name="developer">

        <label for="platform">Platform:</label>
        <input type="text" id="platform" name="platform">

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre">

        <button type="submit">Apply Filters</button>
    </form>

    <div id="display-container">
    <?php
                    require_once('../database/database.php');
                    $db = db_connect();

                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
                        $searchTerm = mysqli_real_escape_string($db, $_POST['search']);
                        $sql = "SELECT * FROM games WHERE 
                                Name LIKE '%$searchTerm%' OR
                                Developer LIKE '%$searchTerm%' OR
                                Platform LIKE '%$searchTerm%' OR
                                Genre LIKE '%$searchTerm%'";
                    }
                    elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['developer'])) {
                        $developer = mysqli_real_escape_string($db, $_POST['developer']);
                        $platform = mysqli_real_escape_string($db, $_POST['platform']);
                        $genre = mysqli_real_escape_string($db, $_POST['genre']);

                        $sql = "SELECT * FROM games WHERE 
                                (Developer LIKE '%$developer%' OR '$developer' = '') AND
                                (Platform LIKE '%$platform%' OR '$platform' = '') AND
                                (Genre LIKE '%$genre%' OR '$genre' = '')";
                    }
                    else {
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