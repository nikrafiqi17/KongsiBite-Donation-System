<?php
include("dbconn.php");
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KongsiBite Register</title>

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
        <h2>Register</h2>

        <form method="POST" action="registerprocess.php">
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

            <div class="input-box">
                <input
                    type="password"
                    name="confirmpassword"
                    placeholder="Confirm Password"
                    required>
            </div>

            <button type="submit" name="submit" class="register-btn">
                Register
            </button>
        </form>

        <div class="extra">
            Already have an account?
            <a href="login.php">Login</a>
        </div>

    </div>

</body>
</html>