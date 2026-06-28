<?php
session_start();
include("dbconn.php");

if(!isset($_SESSION['admin'])){
    header("Location: adminlogin.php");
    exit();
}

$email = $_GET['email'];

mysqli_query($dbconn,
"DELETE FROM users WHERE email='$email'");

header("Location: manage_user.php");
exit();
?>