<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <title>Account Page</title>
</head>
<body>
<?php
session_start();
require_once('../private/db_credential.php');
require_once('../private/database.php');

if (isset($_SESSION['user_id'])) {
    include ("headerLogged.php");
} else {
    include ("headernav.php");
}

if (isset($_SESSION['user_id'])) {
    $db = db_connect();
    $id = $_SESSION['user_id'];

    $sql = "SELECT * FROM account WHERE id= '$id' ";
    
    $result_set = mysqli_query($db, $sql);
    
    if ($result_set) {
        $result = mysqli_fetch_assoc($result_set);
        ?>

        <section id="account">
            <h2>Account Page</h2>
        </section>

        <div id="content">
            <div>
                <h1><?php echo $result['Username']; ?></h1>
                <div class="attributes">
                    <dl>
                        <dt>Username</dt>
                        <dd><?php echo $result['Username']; ?></dd>
                    </dl>
                    <dl>
                        <dt>Password</dt>
                        <dd><?php echo $result['Password']; ?></dd>
                    </dl>
                </div>
            </div>
            <form  action="../private/logout.php" method="POST">
                <button type="submit">Log out</button>
            </form>
        </div>


        <?php
    } else {
        // Database query error
        echo "Database query error: " . mysqli_error($db);
    }

    // Close the database connection
    db_disconnect($db);

// } else {
//     // Redirect to login page if not logged in
//     header("Location: login.php");
//     exit();
}

include("footer.php");
?>
</body>
</html>