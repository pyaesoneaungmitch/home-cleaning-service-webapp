<!DOCTYPE html>
<?php session_start(); 
include("ConnectDB.php");
        if (isset($_SESSION['CleanerID'])) {
        $CleanerID = $_SESSION['CleanerID'];

        $query = "SELECT booking.BookingID, booking.BookingDate,
        jobs.StartTime, 
        jobs.EndTime, customer.CustomerName, booking.ServiceName
        FROM jobs, booking,customer
        WHERE booking.BookingID = jobs.BookingID
        AND booking.CustomerID = customer.CustomerID
        AND jobs.CleanerID = $CleanerID;";

        $cleanResult = $connection->query($query);
        }

else {

echo "<script>window.location.href='CleanerLogIn.php';</script>";

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeShine - Welcome</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .assignment-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .assignment-table th, .assignment-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .assignment-table th {
            background-color: #2196F3;
            color: white;
        }
        .assignment-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .status-select {
            padding: 8px;
            border-radius: 4px;
        }
        .updatebtn {
            background-color: #2196F3;
            color: white;
            font-size:18px;
            text-decoration:bold;
            padding: 10px 16px;
            border: none;
            border-radius:30%;
            cursor: pointer;
        }
        .updatebtn:hover {
            background-color: #0d8bf2;
        }
    </style>
</head>
<body style="display:block;" >
<?php if(isset($_SESSION['CleanerID'])) 
                {
                    
                    include("ConnectDB.php");
                    $sql = "SELECT * FROM cleaner WHERE CleanerID =$CleanerID";
                		$result = mysqli_query($connection,$sql);
		                $record = mysqli_fetch_assoc($result); //only one/first record
                    $Name = $record['CleanerName'];//UserName
                    $Email = $record['CleanerEmail'];
                    $POS = $record['CleanerPosition'];
                    $Status = $record['CleanerStatus'];
                    $initial = strtoupper($Name[0]);
                    
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        $Stat = $_POST['Stat'];
                        if ($Stat=='Available')
                        {
                            $NewStat = 'Unavailable';
                        }

                        else
                        {
                            $NewStat = 'Available';
                        }


                        $update_query = "UPDATE cleaner SET CleanerStatus = '$NewStat' WHERE CleanerID = $CleanerID;";

                        $connection->query($update_query);
                        echo "<script>window.alert('Status Updated.')</script>";
                        header("Refresh:0");
                    }

              }?>

<center>
        <h1>Welcome, <?php echo $Name;?></h1>
        <h2>Status: <?php echo $Status ?></h2>
        <form method = "POST">
            <input type="hidden" value = '<?php echo $Status ?>' name = 'Stat'>
            <input type="submit" value="Change" name = 'btnStat' Class="updatebtn">
        </form>

<br>
<br>
<div class="card">
  <center><h1 class="InitialBig"><?php echo $initial;?></h1></center>
  <h1><?php echo $Name;?></h1>
  <p class="title"><?php echo $Email;?></p>
  <p>Position : <?php echo $POS;?></p>
  <hr>
  <p><a href=LogOut.php>Logout</a></p>
</div>
<br>
<br>

    <div class="container">
        <h1>View Assigned Jobs</h1>

        <table class="assignment-table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Date</th>
                    <th>StartTime</th>
                    <th>EndTime</th>
                    <th>Customer</th>
                    <th>Service Type</th>
                </tr>
            </thead>
            <tbody>
        <?php while($row = $cleanResult->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['BookingID']?> <br>
                    <a href="MagJobDetail.php?BookingID=<?php echo $row['BookingID'] ?>"> view</a>
                </td>

                <td><?php echo $row['BookingDate']; ?></td>
                <td><?php echo $row['StartTime']; ?></td>
                <td><?php echo $row['EndTime']; ?></td>
                <td><?php echo $row['CustomerName']; ?></td>
                <td><?php echo $row['ServiceName']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
        </table>
    </div>
</center>


</body>
</html>