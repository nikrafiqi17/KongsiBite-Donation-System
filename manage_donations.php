<?php
session_start();
include("dbconn.php");

if(!isset($_SESSION['admin'])){
    header("Location: adminlogin.php");
    exit();
}

$sql = "SELECT place_name,
               COUNT(*) AS total_donations,
               SUM(amount) AS total_amount
        FROM donations
        GROUP BY place_name
        ORDER BY total_amount DESC";

$result = mysqli_query($dbconn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Donations</title>
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

    <h1>Donation Summary By Place</h1>

    <table class="status-table">
        <tr>
            <th>Place Name</th>
            <th>Total Donations</th>
            <th>Total Amount Collected</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>

        <tr>
            <td><?php echo $row['place_name']; ?></td>
            <td><?php echo $row['total_donations']; ?></td>
            <td>RM <?php echo number_format($row['total_amount'], 2); ?></td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>