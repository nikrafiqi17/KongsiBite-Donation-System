<?php
session_start();
include("dbconn.php");

if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

$sql = "
SELECT
    d1.place_name,
    d1.progress_status,
    SUM(CASE WHEN d2.email = '$email' THEN d2.amount ELSE 0 END) AS my_donation,
    SUM(d2.amount) AS total_donation
FROM donations d1
JOIN donations d2
ON d1.place_name = d2.place_name
WHERE d1.email = '$email'
GROUP BY d1.place_name, d1.progress_status
ORDER BY d1.place_name ASC
";

$result = mysqli_query($dbconn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
    <link rel="stylesheet" href="statusstyle.css">
</head>
<body>

<nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="donation.php">Donate Now</a></li>
        <li><a href="status.php" class="active">Status</a></li>
        <li><a href="profile.php">Profile</a></li>
    </ul>
</nav>

<div class="container">

    <h1>My Donation Status</h1>

    <table>

        <tr>
            <th>Donation Place</th>
            <th>My Donation (RM)</th>
            <th>Total Donation (RM)</th>
            <th>Progress</th>
        </tr>

        <?php
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){
        ?>

        <tr>
            <td><?php echo $row['place_name']; ?></td>

            <td>
                RM <?php echo number_format($row['my_donation'], 2); ?>
            </td>

            <td>
                RM <?php echo number_format($row['total_donation'], 2); ?>
            </td>

            <td>
                <?php
                if($row['progress_status'] == 'No Progress Yet'){
                    echo "<button class='pending-btn'>No Progress Yet</button>";
                }
                elseif($row['progress_status'] == 'Ongoing'){
                    echo "<button class='ongoing-btn'>Ongoing</button>";
                }
                else{
                    echo "<button class='completed-btn'>Completed</button>";
                }
                ?>
            </td>
        </tr>

        <?php
            }
        }else{
        ?>

        <tr>
            <td colspan="4">No donations found.</td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>