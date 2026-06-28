<?php
session_start();
include("dbconn.php");

if(!isset($_SESSION['admin'])){
    header("Location: adminlogin.php");
    exit();
}

$email = $_GET['email'];

$result = mysqli_query($dbconn,
"SELECT * FROM donations
 WHERE email='$email'
 ORDER BY donation_id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Donation History</title>
    <link rel="stylesheet" href="dashboardstyle.css">
</head>
<body>

<div class="main-content">

    <h1>Donation History</h1>

    <table class="status-table">
        <tr>
            <th>Donation ID</th>
            <th>Place Name</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Status</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>

        <tr>
            <td><?php echo $row['donation_id']; ?></td>
            <td><?php echo $row['place_name']; ?></td>
            <td>RM <?php echo number_format($row['amount'],2); ?></td>
            <td><?php echo $row['donation_date']; ?></td>
            <td><?php echo $row['status']; ?></td>
        </tr>

        <?php } ?>

    </table>

    <br>
    <a href="manage_users.php">
        <button>Back</button>
    </a>

</div>

</body>
</html>