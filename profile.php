<?php
session_start();
include("dbconn.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($dbconn, $sql);
$user = mysqli_fetch_assoc($result);

$showPassword = false;
$error = "";

if(isset($_POST['showpass'])){

    if($_POST['checkpass'] == $user['pass']){
        $showPassword = true;
    }
    else{
        $error = "Incorrect Password!";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KongsiBite Profile</title>
    <link rel="stylesheet" href="profilestyle.css">
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="donation.php">Donate Now</a></li>
        <li><a href="status.php">Status</a></li>
        <li><a href="profile.php" class="active">Profile</a></li>
    </ul>
</nav>

<div class="profile-box">

    <h1>My Profile</h1>

    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>

    <hr>

    <h3>View Password</h3>

    <form method="POST">

        <input
            type="password"
            name="checkpass"
            placeholder="Enter Current Password"
            required>

        <button
            type="submit"
            name="showpass"
            class="update-btn">
            Show Password
        </button>

    </form>

    <?php if($showPassword){ ?>
        <p>
            <strong>Password:</strong>
            <?php echo $user['pass']; ?>
        </p>
    <?php } ?>

    <?php if($error != ""){ ?>
        <p style="color:red;">
            <?php echo $error; ?>
        </p>
    <?php } ?>

    <hr>

    <form action="updatepassword.php" method="POST">

        <input
            type="password"
            name="newpass"
            placeholder="Enter New Password"
            required>

        <button
            type="submit"
            class="update-btn">
            Update Password
        </button>

    </form>

    <br>

    <form action="deleteaccount.php" method="POST">

        <button
            type="submit"
            class="delete-btn">
            Delete Account
        </button>

    </form>

    <br>

    <form action="logout.php" method="POST">

        <button
            type="submit"
            class="logout-btn">
            Logout
        </button>

    </form>

</div>

</body>
</html>