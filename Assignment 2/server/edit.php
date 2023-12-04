<?php
require_once('../database/database.php');
$db = db_connect();


if(!isset($_GET['id'])) {
    header("Location:  ../pages/gameLibrary.php");
}
$id = $_GET['id'];

$page_title = 'Edit Games'; 
  // Handle form values sent by new.php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

  //access the employee information
    $name = $_POST['Name']; 
    $developer= $_POST['Developer'] ;
    $platform= $_POST['Platform'] ;
    $genre= $_POST['Genre'] ;
  //update the table with new information
    $sql="UPDATE games set name = '$name' , developer= '$developer' , platform= '$platform', genre= '$genre' where id = '$id' ";
    $result = mysqli_query($db, $sql);
  //redirect to show page
    header("Location: ../pages/gameLibrary.php?id=  $id");
}
  // display the employee information
else {
$sql = "SELECT * FROM games WHERE id= '$id' ";
    
$result_set = mysqli_query($db, $sql);
    
$result = mysqli_fetch_assoc($result_set);
}
?>

<?php if (isset($_SESSION['user_id'])) {
    include ("../pages/headerLogged.php");
} else {
    include ("../pages/headernav.php");
} ?>

<div id="content">

  <a class="back-link" href="../pages/gameLibrary.php"> Back to List</a>

  <div class="page edit">
    <h1>Edit Game</h1>
    <form form action="<?php echo 'edit.php?id=' . $result['id']; ?>"  method="post">
      <dl>
        <dt> ID</dt>
        <dd><input type="text" name="id" value="<?php echo $result['id']; ?>" /></dd>
        </dd>
      </dl>
      <dl>
        <dt>Name</dt>
        <dd><input type="text" name="name" value="<?php echo $result['Name']; ?>" /></dd>
      </dl>
      <dl>
        <dt>Developer</dt>
        <dd><input type="text" name="developer" value="<?php echo $result['Developer']; ?>" /></dd>

        </dd>
      </dl>
      <dl>
        <dt>Platform</dt>
        <dd><input type="text" name="platform" value="<?php echo $result['Platform']; ?>" /></dd>
        </dd>
      </dl>
      <dl>
        <dt>Genre</dt>
        <dd><input type="text" name="genre" value="<?php echo $result['Genre']; ?>" /></dd>
        </dd>
      </dl>
      
      <div id="operations">
        <input type="submit" value="Edit Game" />
      </div>
    </form>

  </div>

</div>

<?php include '../pages/footer.php'; ?>