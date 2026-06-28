<?php
session_start();

include("dbconn.php");

//check email and password
if (isset($_POST['email'], $_POST['password'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];

    //Makes user input safer before inserting it into an SQL query.
    $emailEsc = mysqli_real_escape_string($dbconn, $email);
    $passwordEsc = mysqli_real_escape_string($dbconn, $pass);

    //search users table in db for matching email and password
    $sql = "SELECT * FROM users
            WHERE email='$emailEsc'
            AND pass='$passwordEsc'
            LIMIT 1";

    $result = mysqli_query($dbconn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {

        $_SESSION['email'] = $emailEsc;

        header("Location: index.php");
        exit;
    }
}

echo "<script>
alert('Invalid Email or Password!');
window.location='login.php';
</script>";
exit;
?>