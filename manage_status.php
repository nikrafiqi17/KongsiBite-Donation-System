<?php
session_start();
include("dbconn.php");

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}

$result = mysqli_query($dbconn, "SELECT * FROM donations ORDER BY donation_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Donation Status</title>
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

    <h1>Manage Donation Status</h1>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Place</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?php echo $row['donation_id']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['place_name']; ?></td>
            <td>RM <?php echo number_format($row['amount'],2); ?></td>
            <td><?php echo $row['status']; ?></td>

            <td>
                <a href="approve.php?id=<?php echo $row['donation_id']; ?>">
                    <button>Approve</button>
                </a>

                <a href="reject.php?id=<?php echo $row['donation_id']; ?>">
                    <button>Reject</button>
                </a>
            </td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>