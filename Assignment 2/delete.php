<?php
require_once('database.php');
//include "headerEm.php" ;
$db = db_connect();

if(!isset($_GET['id'])) {
    header("Location:  index.php");
}
$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "DELETE FROM games WHERE id ='$id'";
    $result = mysqli_query($db, $sql);

    header("Location: index.php");

} 
else 
{
  $sql = "SELECT * FROM games WHERE id= '$id' ";
    
$result_set = mysqli_query($db, $sql);
    
    $result = mysqli_fetch_assoc($result_set);
    
}

?>