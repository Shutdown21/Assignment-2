<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Account Page</title>
</head>
<body>
<?php
require_once('db_credential.php');
require_once('database.php');
include ("headernav.php");
$db = db_connect();
$id = $_GET['id'] ;

$sql = "SELECT * FROM account WHERE id= '$id' ";
    
$result_set = mysqli_query($db, $sql);
    
$result = mysqli_fetch_assoc($result_set);
?>

<section id="account">
    <h2>Account Page</h2>
</section>

<div id="content">

    <div>

        <h1> <?php echo $result['username']; ?></h1>

        <div class="attributes">
            <dl>
                <dt>Username</dt>
                <dd><?php echo $result['username']; ?></dd>
            </dl>
            <dl>
                <dt>password</dt>
                <dd><?php echo $result['password']; ?></dd>
            </dl>
        </div>

    </div>

</div>

<?php include("footer.php"); ?>

</body>
</html>
