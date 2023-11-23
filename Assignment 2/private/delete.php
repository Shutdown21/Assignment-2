<?php
require_once('database.php');
if (isset($_SESSION['user_id'])) {
    include ("headerLogged.php");
} else {
    include ("headernav.php");
}
$db = db_connect();

if(!isset($_GET['id'])) {
    header("Location:  ../public/data-display.php");
}
$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "DELETE FROM games WHERE id ='$id'";
    $result = mysqli_query($db, $sql);

    header("Location: ../public/data-display.php");

} 
else 
{
  $sql = "SELECT * FROM games WHERE id= '$id' ";
    
$result_set = mysqli_query($db, $sql);
    
    $result = mysqli_fetch_assoc($result_set);
}
?>

<?php $page_title = 'Delete Page'; ?>

<div id="content">

    <a class="back-link" href="../public/data-display.php">&laquo; Back to List</a>

    <div class="page delete">
        <h1>Delete Page</h1>
        <p>Are you sure you want to delete this Game?</p>
        <p class="item"><?php echo $result['Name']; ?></p>

        <form form action="<?php echo 'delete.php?id=' . $result['id']; ?>"  method="post">
        <div id="operations">
            <input type="submit" name="commit" value="Delete Game" />
        </div>
        </form>
    </div>
    <?php include '../public/footer.php'; ?>
</div>