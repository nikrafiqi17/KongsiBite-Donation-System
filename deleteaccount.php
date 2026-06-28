<?php

session_start();
include("dbconn.php");

//check whether the user is logi or not
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

//retrieve email address from session
$email = $_SESSION['email'];

//execute sql query to delete user's record from db table
mysqli_query($dbconn,
"DELETE FROM users WHERE email='$email'");

//logout user's session
session_destroy();

//display pop-out message
echo "<script>
alert('Account Deleted Successfully!');
window.location='login.php';
</script>";

?>