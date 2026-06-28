<?php
session_start();
include("dbconn.php");

if(!isset($_SESSION['admin'])){
    header("Location: adminlogin.php");
    exit();
}

// Total Users
$user_query = mysqli_query($dbconn, "SELECT COUNT(*) AS total_users FROM users");
$user_data = mysqli_fetch_assoc($user_query);

// Total Donations
$donation_query = mysqli_query($dbconn, "SELECT COUNT(*) AS total_donations FROM donations");
$donation_data = mysqli_fetch_assoc($donation_query);

// Total Amount Collected
$amount_query = mysqli_query($dbconn, "SELECT SUM(amount) AS total_amount FROM donations WHERE status='Approved'");
$amount_data = mysqli_fetch_assoc($amount_query);

// Pending Donations
$pending_query = mysqli_query($dbconn, "SELECT COUNT(*) AS pending FROM donations WHERE status='Pending'");
$pending_data = mysqli_fetch_assoc($pending_query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboardstyle.css">
</head>
<body>

<div class="sidebar">
    <h2>NGO Admin</h2>

    <a href="dashboard.php">Dashboard</a>
    <a href="manage_users.php">Manage Users</a>
    <a href="manage_donations.php">Manage Donations</a>
    <a href="manage_status.php">Manage Status</a>
    <a href="admin_logout.php">Logout</a>

</div>

<div class="main-content">

    <h1>Welcome, <?php echo $_SESSION['admin']; ?></h1>

    <div class="cards">

        <div class="card">
            <h3>Total Users</h3>
            <p><?php echo $user_data['total_users']; ?></p>
        </div>

        <div class="card">
            <h3>Total Donations</h3>
            <p><?php echo $donation_data['total_donations']; ?></p>
        </div>

        <div class="card">
            <h3>Total Collected</h3>
            <p>RM <?php echo number_format($amount_data['total_amount'] ?? 0, 2); ?></p>
        </div>

        <div class="card">
            <h3>Pending Donations</h3>
            <p><?php echo $pending_data['pending']; ?></p>
        </div>

    </div>

</div>

</body>
</html>