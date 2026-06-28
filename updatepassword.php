<?php

session_start();
include("dbconn.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];
$newpass = $_POST['newpass'];

$sql = "UPDATE users
        SET pass='$newpass'
        WHERE email='$email'";

mysqli_query($dbconn, $sql);

echo "<script>
alert('Password Updated Successfully!');
window.location='profile.php';
</script>";

?>