<?php 
// Get bookingID from URL
$bookingID = isset($_GET['bookingID']) ? $_GET['bookingID'] : 0;

include("ConnectDB.php");


// Fetch booking details
$query = "SELECT * FROM booking WHERE BookingID = $bookingID";
$result = $connection->query($query);
$booking = $result->fetch_assoc();


// Handle form submission for updating status
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_status = $_POST['status'];
    $update_query = "UPDATE booking SET BookingStatus = '$new_status' WHERE BookingID = $bookingID";
    $connection->query($update_query);
    echo "<script>window.alert('Booking status updated!')</script>";
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
<h1 style="padding: 20px; background-color:#ccc; margin-left:-80px;">Booking ID: <?php echo $booking['BookingID']; ?></h1>


<!-- Main Content -->
<div class="BookingDetails">
<!-- Booking Details -->
<form method="POST">

<div class="tblrow">
    <label>Status:</label>
    <select name="status" class="combo">
        <option value="Pending" <?php if ($booking['BookingStatus'] == 'Pending') echo 'selected'; ?>>Pending</option>
        <option value="Completed" <?php if ($booking['BookingStatus'] == 'Completed') echo 'selected'; ?>>Completed</option>
        <option value="Canceled" <?php if ($booking['BookingStatus'] == 'Canceled') echo 'selected'; ?>>Canceled</option>
    </select><br>
    </div>

<div class="tblrow">
    <label>Customer ID</label>
    <input type="text" value="<?php echo $booking['CustomerID']; ?>" readonly>
    <br>
    </div>

    <div class="tblrow">
    <label>Service Name:</label>
    <input type="text" value="<?php echo $booking['ServiceName']; ?>" readonly>
    <br>
</div>
    
    <div class="tblrow">
    <label>Address:</label>
    <textarea value="<?php echo $booking['Address']; ?>" readonly><?php echo $booking['Address']; ?></textarea>
    <input type="hidden" value="<?php echo $booking['Address']; ?>" ><br>
    </div>
    
    <div class="tblrow">
    <label>CleanerQty:</label>
    <input type="text" value="<?php echo $booking['CleanerQty']; ?>" readonly><br>
    </div>
    
    <div class="tblrow">
    <label>Bedrooms:</label>
    <input type="text" value="<?php echo $booking['Bedrooms']; ?>" readonly><br>
    </div>
    
    <div class="tblrow">
    <label>Bathrooms:</label>
    <input type="text" value="<?php echo $booking['Bathrooms']; ?>" readonly><br>
    </div>
    
    <div class="tblrow">
    <label>Time:</label>
    <input type="text" value="<?php echo $booking['BookingTime']; ?>" readonly><br>
    </div>
    
    <div class="tblrow">

    <label>Date:</label>
    <input type="text" value="<?php echo $booking['BookingDate']; ?>" readonly><br>
    </div>
    
    <div class="tblrow">
    <label>Remarks:</label>
    <textarea value="<?php echo $booking['Remarks']; ?>" readonly><?php echo $booking['Remarks']; ?></textarea>
    <input type="hidden" value="<?php echo $booking['Remarks']; ?>" ><br>
    </div>
    
    <div class="tblrow">
    <label>Addons:</label>
    <textarea value="<?php echo $booking['Addons']; ?>" readonly><?php echo $booking['Addons']; ?></textarea>
    <input type="hidden" value="<?php echo $booking['Addons']; ?>" ><br>
    </div>
    
    <div class="tblrow">
    <label>Total:</label>
    <input type="text" value="<?php echo $booking['Total']; ?>" readonly><br>
    </div>
    
    <div class="tblrow">
    <label>PaymentStatus:</label>
    <input type="text" value="<?php echo $booking['PaymentStatus']; ?>" readonly><br>
    </div>

    <div class="tblrow">
    <label>JobStatus:</label>
    <input type="text" value="<?php echo $booking['JobStatus']; ?>" readonly><br>
    </div>

    <center>
    <button type="submit">Update</button>
    <a href="MagBooking.php?Type=<?php echo $booking['BookingStatus'];?>">Go Back</a>
    </center>
    
</form>

</div>
</div>

</body>
</html>
