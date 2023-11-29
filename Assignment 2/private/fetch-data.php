<?php
require_once('database.php');
$db = db_connect();

if (!isset($_GET['id'])) {
    http_response_code(400);
    exit('Invalid request');
}

$id = $_GET['id'];

$sql = "SELECT * FROM games WHERE id = '$id'";
$result_set = mysqli_query($db, $sql);

if ($result_set) {
    $gameData = mysqli_fetch_assoc($result_set);
    echo json_encode($gameData);
} else {
    http_response_code(500);
    exit('Error fetching data');
}

db_disconnect($db);
?>
