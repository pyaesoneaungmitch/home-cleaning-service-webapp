<?php
// Get status from the URL
$status = isset($_GET['Type']) ? $_GET['Type'] : 'Total';


include("ConnectDB.php");

if (isset($_GET['btnSearch']))
{
    $Col = $_GET['column'];
    $search = $_GET['data'];
    $query = "SELECT * FROM payment WHERE $Col = '$search'";

}

// Query based on status
else if ($status == "Total")
{
    $query = "SELECT * FROM payment";
} 

else
{
    $query = "SELECT * FROM payment WHERE PaymentStatus = '$status'";
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
            <option value="PaymentStatus">Status</option>
            <option value="PaymentID">PaymentID</option>
            <option value="CustomerID">CustomerID</option>
            <option value="BookingID">BookingID</option>
            <option value="PaymentMethod">PaymentMethod</option>
            <option value="HolderName">HolderName</option>
            <!-- You can dynamically populate this combo box using PHP or JS from the database -->
        </select>

        <!-- Search Button -->
        <button type="submit" name = "btnSearch">
            Search <i class="fas fa-search"></i>
        </button>
    </form>
    
<h1><?php echo $status;?> Payments</h1>
<hr>
<br>
<h2>Payment</h2>

<div class="admintable">
<table border="1">
    <thead>
        <tr>
	
            <th>PaymentStatus</th>
            <th>PaymentID</th>
            <th>CustomerID</th>
            <th>BookingID</th>
            <th>PaymentMethod</th>
            <th>CardNumber</th>
            <th>HolderName</th>
            <th>ExpMonth</th>
            <th>ExpYear</th>
            <th>Zip</th>
            <th>CVV</th>
            <th>Amount</th>
            <th>DateandTime</th>
            

        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>
                    <a href="MagPaymentDetails.php?PaymentID=<?php echo $row['PaymentID']; ?>">
                        <?php echo $row['PaymentStatus']; ?>
                    </a>
                </td>
                <td><?php echo $row['PaymentID']; ?></td>
                <td><?php echo $row['CustomerID']; ?></td>
                <td><?php echo $row['BookingID']; ?></td>
                <td><?php echo $row['PaymentMethod']; ?></td>
                <td><?php echo $row['CardNumber']; ?></td>
                <td><?php echo $row['HolderName']; ?></td>
                <td><?php echo $row['ExpMonth']; ?></td>
                <td><?php echo $row['ExpYear']; ?></td>
                <td><?php echo $row['Zip']; ?></td>
                <td><?php echo $row['CVV']; ?></td>
                <td><?php echo $row['Amount']; ?></td>
                <td><?php echo $row['DateandTime']; ?></td>
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