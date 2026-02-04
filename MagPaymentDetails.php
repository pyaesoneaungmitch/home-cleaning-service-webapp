<?php
// Get bookingID from URL
$PaymentID = isset($_GET['PaymentID']) ? $_GET['PaymentID'] : 0;

include("ConnectDB.php");


// Fetch booking details
$query = "SELECT * FROM payment WHERE PaymentID = $PaymentID";
$result = $connection->query($query);
$booking = $result->fetch_assoc();


// Handle form submission for updating status
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_status = $_POST['status'];
    $update_query = "UPDATE payment SET PaymentStatus = '$new_status' WHERE PaymentID = $PaymentID";
    $connection->query($update_query);
    echo "<script>window.alert('Payment status updated!')</script>";
    header("Refresh:0");
}
?>

html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<?php include('Anavbar.php'); ?>
<div class="content">
<!-- Main Content -->
<div class="BookingDetails">
<!-- Booking Details -->
<form method="POST">
<div class="tblrow">
    <label>Payment ID:</label>
    <input type="text" value="<?php echo $booking['PaymentID']; ?>" readonly><br>
</div>
<div class="tblrow">
    <label>Status:</label>
    <select name="status" class="combo">
        <option value="Pending" <?php if ($booking['PaymentStatus'] == 'Pending') echo 'selected'; ?>>Pending</option>
        <option value="Approved" <?php if ($booking['PaymentStatus'] == 'Approved') echo 'selected'; ?>>Approved</option>
        <option value="Unapproved" <?php if ($booking['PaymentStatus'] == 'Unapproved') echo 'selected'; ?>>Unapproved</option>
    </select><br>
    </div>

<div class="tblrow">
    <label>Customer ID</label>
    <input type="text" value="<?php echo $booking['CustomerID']; ?>" readonly>
    <br>
    </div>

    <div class="tblrow">
    <label>Booking ID:</label>
    <input type="text" value="<?php echo $booking['BookingID']; ?>" readonly>
    <br>
</div>

    <div class="tblrow">
    <label>PaymentMethod:</label>
    <input type="text" value="<?php echo $booking['PaymentMethod']; ?>" readonly><br>
    </div>
    
        
    <div class="tblrow">
    <label>CardNumber:</label>
    <input type="text" value="<?php echo $booking['CardNumber']; ?>" readonly><br>
    </div>
    
    <div class="tblrow">
    <label>HolderName:</label>
    <input type="text" value="<?php echo $booking['HolderName']; ?>" readonly><br>
    </div>
    
    <div class="tblrow">
    <label>Amount:</label>
    <input type="text" value="<?php echo $booking['Amount']; ?>" readonly><br>
    </div>
    
    <div class="tblrow">
    <label>DateandTime:</label>
    <input type="text" value="<?php echo $booking['DateandTime']; ?>" readonly><br>
    </div>
    <center>
    <button type="submit">Update</button>
    <a href="MagPayment.php?Type=<?php echo $booking['PaymentStatus'];?>">Go Back</a>
    </center>
    
</form>

</div>
</div>

</body>
</html>
