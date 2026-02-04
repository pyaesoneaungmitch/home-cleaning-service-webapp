<?php
// Get status from the URL
$status = isset($_GET['Type']) ? $_GET['Type'] : 'Total';


include("ConnectDB.php");

// Query based on status

if (isset($_GET['btnSearch']))
{
    $Col = $_GET['column'];
    $search = $_GET['data'];
    $query = "SELECT * FROM booking WHERE $Col = '$search'";

}

else if ($status == "Total")
{
    $query = "SELECT * FROM booking";
} 

else
{
    $query = "SELECT * FROM booking WHERE JobStatus = '$status'";
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
            <option value="JobStatus">Status</option>
            <option value="BookingID">BookingID</option>
            <option value="ServiceName">ServiceName</option>
            <option value="Address_TownShip">TownShip</option>
            <option value="CleanerQty">CleanerQty</option>
            <option value="HoursQty">HoursQty</option>
            <option value="BookingTime">BookingTime</option>
            <option value="BookingDate">BookingDate</option>
            <option value="CustomerID">CustomerID</option>
            <!-- You can dynamically populate this combo box using PHP or JS from the database -->
        </select>

        <!-- Search Button -->
        <button type="submit" name = "btnSearch">
            Search <i class="fas fa-search"></i>
        </button>
    </form>

<h1><?php echo $status;?> Jobs</h1>
<hr>
<br>
<h2>Jobs</h2>

<div class="admintable">
<table border="1">
    <thead>
        <tr>
            <th>Status</th>
            <th>BookingID</th>
            <th>ServiceName</th>
            <th>TownShip</th>
            <th>CleanerQty</th>
            <th>HoursQty</th>
            <th>BookingTime</th>
            <th>BookingDate</th>
            <th>CustomerID</th>
            

        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>
                    <?php if ($row['JobStatus'] == 'Unassigned'): ?>
                        <a href="AssignJob.php?BookingID=<?= $row['BookingID'] ?>">Unassigned</a>
                    <?php else: ?>
                        <a href="MagJobDetail.php?BookingID=<?= $row['BookingID'] ?>"><i style="color:black;">Assigned</i></a>
                    <?php endif; ?>
                </td>

                </td>
                <td><?php echo $row['BookingID']; ?></td>
                <td><?php echo $row['ServiceName']; ?></td>
                <td><?php echo $row['Address_TownShip']; ?></td>
                <td><?php echo $row['CleanerQty']; ?></td>
                <td><?php echo $row['HoursQty']; ?></td>
                <td><?php echo $row['BookingTime']; ?></td>
                <td><?php echo $row['BookingDate']; ?></td>
                <td><?php echo $row['CustomerID']; ?></td>
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