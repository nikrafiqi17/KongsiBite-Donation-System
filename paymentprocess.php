<?php
session_start();
include("dbconn.php");

if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

if(!isset($_GET['place']) && !isset($_POST['place_name'])){
    header("Location: donation.php");
    exit();
}

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $place_name = $_POST['place_name'];
    $amount = $_POST['amount'];
    $donation_date = $_POST['donation_date'];
    $payment_method = $_POST['payment_method'];
    $transfer_ref = $_POST['transfer_ref'];
    $status = "Pending";
    $progress_status = "No Progress Yet";

    $sql = "INSERT INTO donations
            (email, place_name, amount, donation_date, payment_method,
             transfer_ref, status, progress_status)
            VALUES
            ('$email','$place_name','$amount','$donation_date',
             '$payment_method','$transfer_ref','$status','$progress_status')";

    if(mysqli_query($dbconn,$sql)){

        echo "<script>
        alert('Donation Submitted Successfully!');
        window.location='status.php';
        </script>";

    }else{

        echo "<script>
        alert('Failed to Submit Donation!');
        window.location='donation.php';
        </script>";
    }
}

$place_name = "";

if(isset($_GET['place'])){
    $place_name = $_GET['place'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Donation Form</title>

<link rel="stylesheet" href="paystyle.css">

</head>
<body>

<div class="container">

<h2>Donation Form</h2>

<div class="payment-box">

<h3>DuitNow QR Payment</h3>

<p>Scan using any banking app or Touch 'n Go eWallet</p>

<img src="qr.jpg" alt="DuitNow QR Code">

<p><strong>Maybank Account Number</strong></p>

<p class="bank-number">0130 8721 7342</p>

</div>

<form method="POST">

<div class="form-group">
<label>User Email</label>
<input type="email"
       name="email"
       value="<?php echo htmlspecialchars($_SESSION['email']); ?>"
       readonly>
</div>

<div class="form-group">
<label>Donation Place</label>
<input type="text"
       name="place_name"
       value="<?php echo htmlspecialchars($place_name); ?>"
       readonly>
</div>

<div class="form-group">
<label>Donation Amount (RM)</label>
<input type="number"
       step="0.01"
       name="amount"
       required>
</div>

<div class="form-group">
<label>Donation Date</label>
<input type="date"
       name="donation_date"
       required>
</div>

<div class="form-group">
<label>Payment Method</label>
<select name="payment_method">
    <option>DuitNow QR</option>
    <option>TNG eWallet</option>
    <option>Online Banking</option>
</select>
</div>

<div class="form-group">
<label>Transfer Reference Number</label>
<input type="text"
       name="transfer_ref"
       required>
</div>

<button type="submit"
        name="submit"
        class="btn">
        Submit Donation
</button>

</form>

</div>

</body>
</html>