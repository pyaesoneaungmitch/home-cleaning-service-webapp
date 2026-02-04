<?php 
// Get status from the URL
$status = isset($_GET['Type']) ? $_GET['Type'] : 'total';


include("ConnectDB.php");

if (isset($_GET['btnSearch']))
{
    $Col = $_GET['column'];
    $search = $_GET['data'];
    $query = "SELECT * FROM booking WHERE $Col = '$search'";

}
// Query based on status
else if ($status == "Total")
{
    $query = "SELECT * FROM booking";
} 

else
{
    $query = "SELECT * FROM booking WHERE BookingStatus = '$status'";
}
$result = $connection->query($query);
?>




<html lang="en">
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
 <center>
 <div class="Adminbanner">
<img src="img/bannertrans.png" alt="">
 </div>
 </center>
 <form class="search-container" method="GET">
        <!-- Search Value Input -->
        <input type="text" name="data" placeholder="Enter value to search" required>

        <!-- Dynamic Combo Box for Column Selection -->
        <select name="column" required>
            <option value="" disabled selected>Select Column</option>
            <option value="BookingStatus">Status</option>
            <option value="BookingID">BookingID</option>
            <option value="ServiceName">ServiceName</option>
            <option value="Address_TownShip">TownShip</option>
            <option value="CustomerID">CustomerID</option>
            <option value="PaymentStatus">PaymentStatus</option>
            <option value="JobStatus">JobStatus</option>
            <option value="BookingDate">Date</option>
            <!-- You can dynamically populate this combo box using PHP or JS from the database -->
        </select>

        <!-- Search Button -->
        <button type="submit" name = "btnSearch">
            Search <i class="fas fa-search"></i>
        </button>
    </form>

<h1><?php echo $status;?> Bookings</h1>
<hr>
<br>
<h2>Bookings</h2>
<br>
<a href="AddBooking.php" class="Abtn">Add</a>
<br>
<div class="admintable">
<table border="1">
    <thead>
        <tr>
            <th>Status</th>
            <th>BookingID</th>
            <th>ServiceName</th>
            <th>Full Address</th>
            <th>TownShip</th>
            <th>CleanerQty</th>
            <th>HoursQty</th>
            <th>Bedrooms</th>
            <th>Bathrooms</th>
            <th>BookingTime</th>
            <th>BookingDate</th>
            <th>Remarks</th>
            <th>Addons</th>
            <th>Total</th>
            <th>CustomerID</th>
            <th>PaymentStatus</th>
            <th>JobStatus</th>
          </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>
                    <a href="MagBookingDetails.php?bookingID=<?php echo $row['BookingID']; ?>">
                        <?php echo $row['BookingStatus']; ?>
                    </a>
                </td>
                <td><?php echo $row['BookingID']; ?></td>
                <td><?php echo $row['ServiceName']; ?></td>
                <td><?php echo $row['Address']; ?></td>
                <td><?php echo $row['Address_TownShip']; ?></td>
                <td><?php echo $row['CleanerQty']; ?></td>
                <td><?php echo $row['HoursQty']; ?></td>
                <td><?php echo $row['Bedrooms']; ?></td>
                <td><?php echo $row['Bathrooms']; ?></td>
                <td><?php echo $row['BookingTime']; ?></td>
                <td><?php echo $row['BookingDate']; ?></td>
                <td><?php echo $row['Remarks']; ?></td>
                <td><?php echo $row['Addons']; ?></td>
                <td><?php echo $row['Total']; ?></td>
                <td><?php echo $row['CustomerID']; ?></td>
                <td><?php echo $row['PaymentStatus']; ?></td>
                <td><?php echo $row['JobStatus']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<br>
<br>
<hr>
<center><p>End of results</p></center>
</div>
</div>

</body>
</html>