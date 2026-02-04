<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeShine - Welcome</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<?php include('navbar.php'); ?>
<div class="content">
<?php if(isset($_SESSION['CusID'])) 
                {
                    $CusID = $_SESSION['CusID'];
                    include("ConnectDB.php");
                    $sql = "SELECT * FROM customer WHERE CustomerID='$CusID'";
                		$result = mysqli_query($connection,$sql);
		                $record = mysqli_fetch_assoc($result); //only one/first record
                    $Name = $record['CustomerName'];//UserName
                    $Email = $record['CustomerEmail'];
                    $Phone = $record['CustomerPhone'];
                    $DOB = $record['CustomerDOB'];
                    $initial = strtoupper($Name[0]);

              }?>


<h1>User Profile</h1>

<div class="card">
  <center><h1 class="InitialBig"><?php echo $initial;?></h1></center>
  <h1><?php echo $Name;?></h1>
  <p class="title"><?php echo $Email;?></p>
  <p>Phone Number : <?php echo $Phone;?></p>
  <p>Date of Birth : <?php echo $DOB;?></p>
  <hr>
  <p><a href=LogOut.php>Logout</a></p>
</div>
<br>

<h1>Your Past Bookings</h1>

<div class="TableContainer">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Booking ID</th>
                    <th>ServiceName</th>
                    <th>Addons</th>
                    <th>Address</th>
                    <th>TownShip</th>
                    <th>Date</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
            <?php
        include("ConnectDB.php");

        $sql = "SELECT b.BookingStatus, b.BookingID, b.Address,b.Address_Township, b.BookingDate, 
        b.Addons, b.Total, b.CustomerID, b.jobStatus, s.ServiceName 
        FROM booking b , service s WHERE b.ServiceID = s.ServiceID 
        AND b.CustomerID= $CusID";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
               $Status = $row["BookingStatus"];
               $BookingID =  $row["BookingID"];
               $Service = $row["ServiceName"];
               $Address = $row["Address"];
               $Township = $row["Address_Township"];
               $Date = $row["BookingDate"];
               $Addons = $row["Addons"];
               $Total = $row["Total"];

            echo "

                <tr>
                    <td>$Status</td>
                    <td>$BookingID</td>
                    <td>$Service</td>
                    <td>$Addons</td>
                    <td>$Address</td>
                    <td>$Township</td>
                    <td>$Date</td>
                    <td>$Total</td>
                </tr>
                ";
            }
        }
            
            else
            {
                Echo"You haven't booked any services yet, <a herf='Services.php>Book Now!</a>'";
            }
?>

            </tbody>
        </table>
    </div>
    </div>


    
    
</body>
</html>
