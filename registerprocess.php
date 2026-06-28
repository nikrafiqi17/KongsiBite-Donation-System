<?php

include("dbconn.php");

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Check password sama atau tak
    if ($pass != $confirmpassword) {

        echo "<script>
            alert('Password does not match!');
            window.location='register.php';
        </script>";

    } else {

        // Check email dah wujud atau belum
        $check = mysqli_query($dbconn, "SELECT * FROM users WHERE email='$email'");

        if (mysqli_num_rows($check) > 0) {

            echo "<script>
                alert('Email already registered!');
                window.location='register.php';
            </script>";

        } else {

            // Insert data dalam database
            $sql = "INSERT INTO users(email, pass)
                    VALUES('$email', '$pass')";

            $result = mysqli_query($dbconn, $sql);

            if ($result) {

                echo "<script>
                    alert('Register Successful!');
                    window.location='login.php';
                </script>";

            } else {

                echo "<script>
                    alert('Register Failed!');
                    window.location='register.php';
                </script>";

            }
        }
    }
}
?>