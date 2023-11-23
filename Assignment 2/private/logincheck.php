<?php
session_start();

require_once('../private/db_credential.php');
require_once('../private/database.php');

$db = db_connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT Username, Password FROM account WHERE Username = '$username'";

    $result_set = mysqli_query($db, $sql);
    
    if ($result_set) {
        $user = mysqli_fetch_assoc($result_set);
        if ($user && $user[$username]===$password) {
                // Successful login
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../public/account.php");
            
        // if(isset($user[$username])&& $user[$username]===$password){
        //     $_SESSION['user_id'] = $username;
        //     $_SESSION['valid_pass'] = $password;
            
        }
        else {
            header("Location: ../public/data-display.php");
        }
    }

    //     } else {
    //         // Invalid username or password
    //         header("Location: ../public/login.php?login_error=true");
    //         exit();
    //     }
    // } else {
    //     // Database query error
    //     echo "Database query error: " . mysqli_error($db);
    // }
}

// Close the database connection
db_disconnect($db);
?>
