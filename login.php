<?php
//include database connection file
include("dbconn.php");
?>

<!DOCTYPE html>
<html>
<head>

    <title>KongsiBite Login</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="logo">

        <div class="kongsi">
            Kongsi
        </div>

        <div class="bite">
            Bite ❤
        </div>

    </div>

    <div class="container">

        <h2>Login</h2>

        <form method="POST" action="login0.php">
            <div class="input-box">
                <input
                    type="email"
                    name="email"
                    placeholder="Enter Email"
                    required>
            </div>

            <div class="input-box">
                <input
                    type="password"
                    name="password"
                    placeholder="Enter Password"
                    required>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="extra">
            Don’t have an account?
            <a href="register.php">Create now</a>
        </div>

        <div class="extra">
            Are you an Admin?
            <a href="adminlogin.php">Admin Login</a>
        </div>

    </div>

</body>
</html>