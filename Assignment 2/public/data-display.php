<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Data Display</title>
</head>
<body>

<?php
require_once('../private/db_credential.php');
require_once('../private/database.php');
$db = db_connect();
?>
<?php include ("headernav.php") ?>
<?php 
$sql = "SELECT * FROM games ";
//echo $sql;
$result_set = mysqli_query($db,$sql);
?>
    

<section id="data-display">
<div id="content">
    <div class="subjects listing">
    <h1>Games</h1>

    <div class="actions">
        <a class="action" href="data-entry.php">Add new game entry</a>
    </div>

        <table class="list">
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>developer</th>
            <th>platform</th>
            <th>genre</th>
            <th>&nbsp</th>
            <th>&nbsp</th>
            <th>&nbsp</th>
        </tr>

        <?php while($results = mysqli_fetch_assoc($result_set)) { ?>
            <tr>
            <td><?php echo $results['id']; ?></td>
            <td><?php echo $results['Name']; ?></td>
            <td><?php echo $results['Developer'] ; ?></td>
            <td><?php echo $results['Platform']; ?></td>
            <td><?php echo $results['Genre']; ?></td>
            <td><a class="action" href="<?php echo"../private/show.php?id=" . $results['id']; ?>">View</a></td>
            <td><a class="action" href="<?php echo "../private/edit.php?id=" . $results['id']; ?>">Edit</a></td>
            <td><a class="action" href=<?php echo "../private/delete.php?id=" . $results['id']; ?>">delete</a></td>
            
            </tr>
        <?php } ?>
        </table>
    <br>
    <br>
    </section>
    <?php include("footer.php"); ?>

</body>
</html>