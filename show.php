<?php
require_once('database.php');
// include "headerEm.php" ;
$db = db_connect();
//access URL parameter
$id = $_GET['id'] ;


$sql = "SELECT * FROM games WHERE id= '$id' ";
    
$result_set = mysqli_query($db, $sql);
    
$result = mysqli_fetch_assoc($result_set);

?>