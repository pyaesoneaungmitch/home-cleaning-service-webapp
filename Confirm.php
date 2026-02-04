<?php session_start();

$BookingID = $_GET['BookingID'];

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
    
        <?php 

            echo" <div class='MidCon' style='width: 500px; height: 450px;'>
            <center>
            
                <img src='img/payment.png'>
                <h2>Booking Successful</h2>
                <h3>Thank you for choosing <b>HomeShine</b> </h3>
                <center>
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
            
            ";
        
        ?>
    </div>

    
            </body>
            </html>



