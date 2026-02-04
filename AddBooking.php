<?php
session_start();
// Get bookingID from URL
$bookingID = isset($_GET['bookingID']) ? $_GET['bookingID'] : 0;

include("ConnectDB.php");

$customersQuery = "SELECT CustomerID,CustomerName FROM customer";
$servicesQuery = "SELECT ServiceID, ServiceName FROM service";


$customersResult = $connection->query($customersQuery);
$servicesResult = $connection->query($servicesQuery);



//Fetch New ID

$lastBookingQuery = "SELECT BookingID FROM booking ORDER BY BookingID DESC LIMIT 1";
$lastBookingResult = $connection->query($lastBookingQuery);

if ($lastBookingResult->num_rows > 0) {
    // Step 4: Get the last BookingID and increment it by 1
    $row = $lastBookingResult->fetch_assoc();
    $newBookingID = $row['BookingID'] + 1;
}


// Handle form submission for updating status
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $CusID = $_POST['CustomerID'];
    $ServiceID = $_POST['ServiceID'];

    $serviceNameQuery = "SELECT ServiceName FROM service WHERE ServiceID = $ServiceID";
    $serviceNameResult = $connection->query($serviceNameQuery);
    $row2 = $serviceNameResult->fetch_assoc();
    
    $serviceType = $row2['ServiceName'];

    $Township = $_POST['township'];
    $Address = $_POST['Address'];

    $total_hours = $_POST['Hour'];
    $total_cleaners = $_POST['Cleaner'];

    $total_price = $_POST['Total'];
    $add_ons = $_POST['AddOns'];

    $Time = $_POST['Time'];
    $Date = $_POST['Date'];
    
    $Remark = $_POST['Remarks'];

    $total_bedrooms = $_POST['Bedroom'];
    $total_bathrooms = $_POST['Bathroom'];
    
    
    $sql = "insert into booking (ServiceName, Address, Address_TownShip, CleanerQty, HoursQty, Bedrooms, Bathrooms, 
    BookingTime, BookingDate, PaymentStatus, Remarks, Addons, Total, CustomerID, ServiceID,BookingStatus,JobStatus)	
        values ('$serviceType', '$Address', '$Township', '$total_cleaners', '$total_hours', '$total_bedrooms', '$total_bathrooms' ,
        '$Time', '$Date', 'Unpaid','$Remark', '$add_ons', '$total_price',$CusID, $ServiceID,'Pending','Unassigned')";

            if(mysqli_query($connection,$sql)){
                echo "<script>
                            alert('Booking Added successfully');
                     window.location.href='AHome.php';
                     </script>";
                    } 
    
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
<h1 style="padding: 20px; background-color:#ccc; margin-left:-80px;">Booking ID: <?php echo $newBookingID; ?></h1>
<!-- Main Content -->
<div class="BookingDetails">
<!-- Booking Details -->
<form method="POST">


<div class="tblrow">
    <label>Customer ID</label>
    <select name="CustomerID" id="customerID" required>
            <option value="">Select Customer</option>
            <?php
            // Step 5: Populate CustomerID and Name combo box
            if ($customersResult->num_rows > 0) {
                while ($row1 = $customersResult->fetch_assoc()) {
                    echo "<option value='" . $row1['CustomerID'] . "'>" . $row1['CustomerID'] . " - " . $row1['CustomerName'] . "</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="tblrow">
    <label>Service Name:</label>
    <select name="ServiceID" id="serviceID" required>
            <option value="">Select Service</option>
            <?php
            // Step 6: Populate Service Name combo box
            if ($servicesResult->num_rows > 0) {
                while ($row = $servicesResult->fetch_assoc()) {
                    echo "<option value='" . $row['ServiceID'] . "'>" . $row['ServiceName'] . "</option>";
                }
            }
            ?>
        </select>
</div>

    <div class="tblrow">
    <label>TownShip:</label>
    <select name="township" id="township" required> <a href=""></a>
            <option value="Bahan">Bahan</option>
            <option value="Hlaing">Hlaing</option>
            <option value="Insein">Insein</option>
            <option value="Kamayut">Kamayut</option>
            <option value="Kyauktada">Kyauktada</option>
            <option value="Lanmadaw">Lanmadaw</option>
            <option value="Latha">Latha</option>
            <option value="Mayangone">Mayangone</option>
            <option value="Sanchaung">Sanchaung</option>
            <option value="Tamwe">Tamwe</option>
            <option value="Yankin">Yankin</option>
            <!-- Add other townships as needed -->
        </select>
    </div>
    
    <div class="tblrow">
    <label>Address:</label>
    <textarea name="Address" required></textarea>
    </div>
    
    <div class="tblrow">
    <label>CleanerQty:</label>
    <input type="number" min="1" name="Cleaner" required><br>
    </div>

    <div class="tblrow">
    <label>HourQty:</label>
    <input type="number" min="1" name="Hour" required><br>
    </div>
    
    
    <div class="tblrow">
    <label>Bedrooms:</label>
    <input type="number" min="1" name="Bedroom" required><br>
    </div>
    
    <div class="tblrow">
    <label>Bathrooms:</label>
    <input type="number" min="1" name="Bathroom" required><br>
    </div>
    
    <div class="tblrow">
    <label>Date:</label>
    <input type="date" name="Date" required><br>
    </div>
    
    <div class="tblrow">
    <label>Time:</label>
    <select name="Time" id="township" required> <a href=""></a>
            <option value="09:00:00">9:00 AM</option>
            <option value="10:00:00">10:00 AM</option>
            <option value="11:00:00">11:00 AM</option>
            <option value="12:00:00">12:00 AM</option>
            <option value="13:00:00">1:00 PM</option>
            <option value="14:00:00">2:00 PM</option>
            <option value="15:00:00">3:00 PM</option>
            <option value="16:00:00">4:00 PM</option>
            <option value="17:00:00">5:00 PM</option>
        </select>
    </div>
    
    <div class="tblrow">
    <label>Remarks:</label>
    <textarea name="Remarks" required></textarea>
    </div>

    <div class="tblrow">
    <label>Add ons:</label>
    <textarea name="AddOns" required></textarea>
    </div>
    
    <div class="tblrow">
    <label>Total:</label>
    <input type="number" name="Total" step="0.01" min="1" required><br>
    </div>
    
    <center>
    <button type="submit">Add</button>
    <a href="MagBooking.php">Go Back</a>
    </center>
    
</form>

</div>
</div>

</body>
</html>
