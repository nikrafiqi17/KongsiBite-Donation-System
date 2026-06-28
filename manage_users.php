<?php
session_start();
include("dbconn.php");

if(!isset($_SESSION['admin'])){
    header("Location: adminlogin.php");
    exit();
}

$sql = "SELECT email FROM users ORDER BY email ASC";
$result = mysqli_query($dbconn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
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

    <h1>Manage Users</h1>

    <table class="status-table">
        <tr>
            <th>No.</th>
            <th>Email</th>
            <th>Total Donations</th>
            <th>Action</th>
        </tr>

        <?php
        $no = 1;

        while($row = mysqli_fetch_assoc($result))
        {
            $email = $row['email'];

            $donation_query = mysqli_query($dbconn,
            "SELECT SUM(amount) AS total_amount
             FROM donations
             WHERE email='$email'");

            $donation_data = mysqli_fetch_assoc($donation_query);
        ?>

        <tr>
            <td><?php echo $no++; ?></td>

            <td><?php echo $email; ?></td>

            <td>
                RM <?php echo number_format($donation_data['total_amount'] ?? 0, 2); ?>
            </td>

            <td>
                <a href="user_history.php?email=<?php echo urlencode($email); ?>">
                    <button>View History</button>
                </a>

                <a href="delete_user.php?email=<?php echo urlencode($email); ?>"
                onclick="return confirm('Delete this user?');">
                    <button>Delete</button>
                </a>
            </td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>