<?php
// Get bookingID from URL
$CustomerID = isset($_GET['CustomerID']) ? $_GET['CustomerID'] : 0;

include("ConnectDB.php");


// Fetch booking details
$query = "SELECT * FROM customer WHERE CustomerID = $CustomerID";
$result = $connection->query($query);
$booking = $result->fetch_assoc();


// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_Name = $_POST['name'];
    $new_PW = $_POST['pw'];
    $new_DOB = $_POST['dob'];
    $new_Email = $_POST['email'];
    $new_Ph = $_POST['phone'];
   
       
        $update_query = "UPDATE customer SET 
                                CustomerName = '$new_Name',
                                CustomerPassword = '$new_PW',
                                CustomerDOB = '$new_DOB',
                                CustomerEmail = '$new_Email',
                                CustomerPhone = '$new_Ph'
                                WHERE CustomerID = $CustomerID";

        $connection->query($update_query);
        echo "<script>window.alert('Customer updated!')</script>";
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
<h1 style="padding: 20px; background-color:#ccc; margin-left:-80px;">Customer ID: <?php echo $booking['CustomerID']; ?></h1>
<!-- Main Content -->
<div class="BookingDetails">
<!-- Booking Details -->
<form method="POST">

<div class="tblrow">
    <label>Name:</label>
    <input type="text" value="<?php echo $booking['CustomerName']; ?>" name='name'>
    <br>
    </div>

    <div class="tblrow">
    <label>Password:</label>
    <input type="text" value="<?php echo $booking['CustomerPassword']; ?>" name='pw'><br>
    </div>

    <div class="tblrow">
    <label>DOB:</label>
    <input type="text" value="<?php echo $booking['CustomerDOB']; ?>" name='dob'><br>
    </div>

    <div class="tblrow">
    <label>Email:</label>
    <input type="text" value="<?php echo $booking['CustomerEmail']; ?>" name='email'><br>
    </div>

    <div class="tblrow">
    <label>Phone:</label>
    <input type="text" value="<?php echo $booking['CustomerPhone']; ?>" name='phone'><br>
    </div>

    
    <center>
    <button type="submit">Update</button>
    <a href="MagCustomer.php">Go Back</a>
    </center>
    
</form>

</div>
</div>

</body>
</html>
