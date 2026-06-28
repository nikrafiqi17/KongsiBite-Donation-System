<?php
// php & mysql db connection file
$user = "root"; // mysql username
$pass = ""; // mysql password
$host = "localhost"; // server name or ipaddress
$dbname = "kongsiBite"; // your db name

$dbconn = mysqli_connect($host, $user, $pass, $dbname) or die(mysqli_error($dbconn));
?>
