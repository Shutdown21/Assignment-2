<?php
session_start();

$old_user = $_SESSION['user_id'];
unset($_SESSION['user_id']);
session_unset();

session_destroy();
header("Location: ../public/login.php");
exit;
?>