<?php
session_start();
include("dbconn.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin
        WHERE username='$username'
        AND password='$password'";

$result = mysqli_query($dbconn, $sql);

if(mysqli_num_rows($result) > 0){

    $_SESSION['admin'] = $username;

    header("Location: dashboard.php");
    exit();

}else{

    echo "<script>
    alert('Invalid Username or Password');
    window.location='adminlogin.php';
    </script>";
}
?>