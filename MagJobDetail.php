<?php 
include("ConnectDB.php");
$ID = $_GET['BookingID'];


$bookingSQL = "SELECT b.BookingID, c.CustomerName, b.ServiceName, 
                b.Address_Township, b.CleanerQty, b.HoursQty, 
                b.BookingTime, b.BookingDate 
                FROM booking b , customer c 
                WHERE b.CustomerID = c.CustomerID
                AND b.BookingID = $ID;";

$bookings = $connection->query($bookingSQL);


// Fetch available cleaners
$cleanerSQL = "SELECT j.CleanerID, c.CleanerName FROM cleaner c, jobs j
                WHERE j.CleanerID = c.CleanerID AND BookingID = $ID;";
$availableCleaners = $connection->query($cleanerSQL);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignement Details</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
        }
        .column {
            padding: 20px;
        }
        .left-column {
            width: 60%;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .right-column {
            width: 40%;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .assign-button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
        }
        .assign-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?php include('Anavbar.php'); ?>
<div class="content">
<div class="container">

    <!-- Left Column: Assign Cleaners Interface -->
    <div class="column left-column">
        <h1>Assignment Details</h1>

        <?php while ($booking = $bookings->fetch_assoc()): ?>
            <form>

                <p><strong>Booking ID:</strong> <?= $booking['BookingID'] ?></p>
                <p><strong>Customer Name:</strong> <?= $booking['CustomerName'] ?></p>
                <p><strong>Service Date:</strong> <?= $booking['BookingDate'] ?></p>
                <p><strong>Service Time:</strong> <?= $booking['BookingTime'] ?></p>
                <p><strong>Total Hours:</strong> <?= $booking['HoursQty'] ?></p>
                <p><strong>Number of Cleaners Required:</strong> <?= $booking['CleanerQty'] ?></p>
            </form>
            <hr>
        <?php endwhile; ?>
    </div>

    <!-- Right Column: Available Cleaners -->
    <div class="column right-column">
        <h1>Assigned Cleaner(s)</h1>
        <table>
            <thead>
                <tr>
                    <th>Cleaner ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $availableCleaners->data_seek(0); // Reset pointer for cleaner table
                while ($cleaner = $availableCleaners->fetch_assoc()): ?>
                    <tr>
                        <td><?= $cleaner['CleanerID'] ?></td>
                        <td><?= $cleaner['CleanerName'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>

</body>
</html>
