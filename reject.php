<?php
session_start();
include("dbconn.php");

$id = $_GET['id'];

mysqli_query($dbconn,
"UPDATE donations SET status='Rejected' WHERE donation_id='$id'");

header("Location: manage_status.php");
exit();
?>