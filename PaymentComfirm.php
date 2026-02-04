<?php
$BookingID = $_GET['BookingID'];
include('ConnectDB.php');
$sql4 = "SELECT * FROM payment ORDER BY PaymentID DESC LIMIT 1";
       
$result4 = $connection->query($sql4);
$row4 = $result4->fetch_assoc();
$paymentID = $row4["PaymentID"];
$DateTime = $row4["DateandTime"];
$TotalPrice = $row4["Amount"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeShine - Welcome</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
    <?php echo "
        <div class='MidCon'>
            <center>
            
                <img src='img/payment.png'>
                <h2>Pyament Successful</h2>
                <h3>Thank you for your purchase</h3>
                <center>
                <div class='MidTbl'>
                    <div class='LMidTbl'>
                    <b><p>Amount Paid:</p>
                    <p>Date and Time:</p>
                    <p>PaymentID :</p></b>
                    </div>
                    <div class='RMidTbl'>
                        <p> $TotalPrice</p>
                        <p> $DateTime</p>
                        <p> $paymentID</p>
                    </div>
                    </center>
                    <form id='downloadForm' action='ReceiptProcess.php' method='POST'>
                    <input type='hidden' name='BookingID' value='$BookingID'>
                    <button type='submit' id='downloadBtn' class='btn'>Download E-Receipt</button>
                    </form>
                    <hr>
                    <form action='Home.php' method='GET'>
                    <button type='submit' id='downloadBtn' class='btn' >Go back Home</button>
                    </form>
                </div>
            </center>
            
            
    </div>";
    ?>

    
            </body>
            </html>