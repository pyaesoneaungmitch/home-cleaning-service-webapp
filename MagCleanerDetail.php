<?php
// Get bookingID from URL
$CleanerID = isset($_GET['CleanerID']) ? $_GET['CleanerID'] : 0;

include("ConnectDB.php");


// Fetch booking details
$query = "SELECT * FROM cleaner WHERE CleanerID = $CleanerID";
$result = $connection->query($query);
$booking = $result->fetch_assoc();


// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_Name = $_POST['name'];
    $new_PW = $_POST['pw'];
    $new_DOB = $_POST['dob'];
    $new_Email = $_POST['email'];
    $new_POS = $_POST['pos'];
    $new_Status = $_POST['status'];
   
       
        $update_query = "UPDATE cleaner SET 
                                CleanerName = '$new_Name',
                                CleanerPassword = '$new_PW',
                                CleanerDOB = '$new_DOB',
                                CleanerEmail = '$new_Email',
                                CleanerPosition = '$new_POS',
                                CleanerStatus = '$new_Status'
                                WHERE CleanerID = $CleanerID";

        $connection->query($update_query);
        echo "<script>window.alert('Cleaner updated!')</script>";
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
<h1 style="padding: 20px; background-color:#ccc; margin-left:-80px;">Cleaner ID <?php echo $booking['CleanerID']; ?></h1>
<!-- Main Content -->
<div class="BookingDetails">
<!-- Booking Details -->
<form method="POST">

<div class="tblrow">
    <label>Name:</label>
    <input type="text" value="<?php echo $booking['CleanerName']; ?>" name='name'>
    <br>
    </div>

    <div class="tblrow">
    <label>Password:</label>
    <input type="text" value="<?php echo $booking['CleanerPassword']; ?>" name='pw'><br>
    </div>

    <div class="tblrow">
    <label>DOB:</label>
    <input type="text" value="<?php echo $booking['CleanerDOB']; ?>" name='dob'><br>
    </div>

    <div class="tblrow">
    <label>Email:</label>
    <input type="text" value="<?php echo $booking['CleanerEmail']; ?>" name='email'><br>
    </div>

    <div class="tblrow">
    <label>Position:</label>
    <input type="text" value="<?php echo $booking['CleanerPosition']; ?>" name='pos'><br>
    </div>

    <div class="tblrow">
    <label>Status:</label>
    <select name="status" class="combo">
        <option value="Availdable" <?php if ($booking['CleanerStatus'] == 'Availdable') echo 'selected'; ?>>Availdable</option>
        <option value="Unavaildable" <?php if ($booking['CleanerStatus'] == 'Unavaildable') echo 'selected'; ?>>Unavaildable</option>
    </select><br>
    </div>

    
    <center>
    <button type="submit">Update</button>
    <a href="MagCleaner.php">Go Back</a>
    </center>
    
</form>

</div>
</div>

</body>
</html>
