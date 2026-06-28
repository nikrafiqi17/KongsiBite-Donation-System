<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="aloginstyle.css">
</head>
<body>

<div class="login-container">
    <div class="admin-icon">🛡️</div>

    <h2>Admin Login</h2>

    <form action="adminprocess.php" method="POST">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" class="login-btn">Login</button>
    </form>

</div>

</body>
</html>