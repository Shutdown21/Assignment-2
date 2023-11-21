<?php
require_once('database.php');
$db = db_connect();


if(!isset($_GET['id'])) {
    header("Location:  index.php");
}
$id = $_GET['id'];

$page_title = 'Edit Games'; 
  // Handle form values sent by new.php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

  //access the employee information
    $name = $_POST['name']; 
    $developer= $_POST['developer'] ;
    $platform= $_POST['platform'] ;
    $genre= $_POST['genre'] ;
  //update the table with new information
    $sql="UPDATE employees set name = '$name' , developer= '$developer' , platform= '$platform', genre= '$genre' where id = '$id' ";
    $result = mysqli_query($db, $sql);
  //redirect to show page
    header("Location: show.php?id=  $id");
}
  // display the employee information
else {
$sql = "SELECT * FROM games WHERE id= '$id' ";
    
$result_set = mysqli_query($db, $sql);
    
$result = mysqli_fetch_assoc($result_set);
}

?>