<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <script src="../private/javascript.php"></script>
    <title>Data Display</title>
</head>
<body onload="displaySelectedDataEntry()">
<?php 
session_start();
if (isset($_SESSION['user_id'])) {
    include ("headerLogged.php");
} else {
    include ("headernav.php");
} ?>

    <section id="data-display">
    <label for="data-entry-selector">Select Game:</label>
        <select id="data-entry-selector" onchange="displaySelectedDataEntry()">
            <?php
                require_once('database.php');
                $db = db_connect();

                $sql = "SELECT id, name FROM games";
                $result_set = mysqli_query($db, $sql);

                while ($row = mysqli_fetch_assoc($result_set)) {
                    echo '<option value="data-entry-' . $row['id'] . '">' . $row['name'] . '</option>';
                }
            ?>
        </select>

        <?php
            $sql = "SELECT * FROM games LIMIT 1";
            $result_set = mysqli_query($db, $sql);
            $initial_data = mysqli_fetch_assoc($result_set);
        ?>

        <div class="data-entry" id="data-entry-<?php echo $initial_data['id']; ?>">
            <h3>Data Entry <?php echo $initial_data['id']; ?></h3>
            <label for="name-<?php echo $initial_data['id']; ?>">Name:</label>
            <input type="text" id="name-<?php echo $initial_data['id']; ?>" class="display-text" readonly>
            <label for="developer-<?php echo $initial_data['id']; ?>">Developer:</label>
            <input type="text" id="developer-<?php echo $initial_data['id']; ?>" class="display-text" readonly>
            <label for="platform-<?php echo $initial_data['id']; ?>">Platform:</label>
            <input type="text" id="platform-<?php echo $initial_data['id']; ?>" class="display-text" readonly>
            <label for="genre-<?php echo $initial_data['id']; ?>">Genre:</label>
            <input type="text" id="genre-<?php echo $initial_data['id']; ?>" class="display-text" readonly>
            <label for="comment-<?php echo $initial_data['id']; ?>">Add Comment:</label>
            <input type="text" id="comment-<?php echo $initial_data['id']; ?>" class="comment-input">
        </div>
    </section>

    <?php include("footer.php"); ?>

</body>
</html>