<!DOCTYPE html>
<?php session_start(); 

if(isset($_SESSION['AdminID'])) 
                {
                    $AdminID = $_SESSION['AdminID'];
                    include("ConnectDB.php");
                    #Bookings
                        #Total Bookings
                        $Bookingsql = "SELECT * FROM booking";
                        $Bookingresult=mysqli_query($connection,$Bookingsql);
                        $bookingcount=mysqli_num_rows($Bookingresult);

                        #Total Pending Bookings
                        $BPendingSql = "SELECT * FROM booking WHERE BookingStatus='Pending'";
                        $BPendingResult=mysqli_query($connection,$BPendingSql);
                        $BPendingcount=mysqli_num_rows($BPendingResult);

                        #Total Completed Bookings
                        $BCompletedsql = "SELECT * FROM booking WHERE BookingStatus='Completed'";
                        $BCompletedresult=mysqli_query($connection,$BCompletedsql);
                        $BCompletedcount=mysqli_num_rows($BCompletedresult);

                        #Total Canceledngs
                        $BCanceledsql = "SELECT * FROM booking WHERE BookingStatus='Canceled'";
                        $BCanceledresult=mysqli_query($connection,$BCanceledsql);
                        $BCanceledcount=mysqli_num_rows($BCanceledresult);


                        #Payment
                        #Total Payment
                        $Paymentsql = "SELECT * FROM payment";
                        $paymentResult=mysqli_query($connection,$Paymentsql);
                        $paymentcount=mysqli_num_rows($paymentResult);

                        #Total Pending Payment
                        $PPendingSql = "SELECT * FROM payment WHERE PaymentStatus='Pending'";
                        $PPendingResult=mysqli_query($connection,$PPendingSql);
                        $PPendingcount=mysqli_num_rows($PPendingResult);

                        #Total Approved Payment
                        $PCompletedsql = "SELECT * FROM payment WHERE PaymentStatus='Approved'";
                        $PCompletedresult=mysqli_query($connection,$PCompletedsql);
                        $PCompletedcount=mysqli_num_rows($PCompletedresult);

                        #Total Unapproved Payment
                        $PCanceledsql = "SELECT * FROM payment WHERE PaymentStatus='Unapproved'";
                        $PCanceledresult=mysqli_query($connection,$PCanceledsql);
                        $PCanceledcount=mysqli_num_rows($PCanceledresult);


                        

                        #Feedbacks
                        #Total Feedbacks
                        $FbSql = "SELECT * FROM feedback";
                        $Fbresult=mysqli_query($connection,$FbSql);
                        $Fbcount=mysqli_num_rows($Fbresult);

                        #Total Help Feedbacks
                        $FHelpsql = "SELECT * FROM feedback WHERE FeedbackType='Help'";
                        $FHelpresult=mysqli_query($connection,$FHelpsql);
                        $FHelpcount=mysqli_num_rows($FHelpresult);

                        #Total Com Feedbacks
                        $Fcomsql = "SELECT * FROM feedback WHERE FeedbackType='Complaint'";
                        $Fcomresult=mysqli_query($connection,$Fcomsql);
                        $Fcomcount=mysqli_num_rows($Fcomresult);

                         #Total Sug Feedbacks
                         $Fsugsql = "SELECT * FROM feedback WHERE FeedbackType='Suggestion'";
                         $Fsugresult=mysqli_query($connection,$Fsugsql);
                         $Fsugcount=mysqli_num_rows($Fsugresult);
 

                }
                else {

                    echo "<script>window.location.href='AdminLogIn.php';</script>";
                    
                    }

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
<h1>Admin Dashboard</h1>
<hr>
<br>
<h2>Bookings</h2>
<div class="MagCon">
    
    <div class="Mag Total">
        <div class="BigNum">
            <form action="MagBooking.php" method="GET">
            <input type="hidden" name="Type" value="Total">
            <input type="submit" value="<?php echo $bookingcount?>">
           </form>
        </div><br>
        <p>Total</p>
        <h3>Bookings</h3>
    </div>

    <div class="Mag Ongoing">
        <div class="BigNum">
            <form action="MagBooking.php" method="GET">
            <input type="hidden" name="Type" value="Pending">
            <input type="submit" value="<?php echo $BPendingcount?>">
           </form>
        </div><br>
        <p>Pending</p>
        <h3>Bookings</h3>
    </div>

    <div class="Mag Completed">
        <div class="BigNum">
            <form action="MagBooking.php" method="GET">
            <input type="hidden" name="Type" value="Completed">
            <input type="submit" value="<?php echo $BCompletedcount?>">
           </form>
        </div><br>
        <p>Completed</p>
        <h3>Bookings</h3>
    </div>

    <div class="Mag Canceled">
        <div class="BigNum">
            <form action="MagBooking.php" method="GET">
            <input type="hidden" name="Type" value="Canceled">
            <input type="submit" value="<?php echo $BCanceledcount?>">
           </form>
        </div><br>
        <p>Canceled</p>
        <h3>Bookings</h3>
    </div>
</div>
<hr>
<br>
<br>
<!--FOR PAYMENT---->

<h2>Payment</h2>
<div class="MagCon">
    
    <div class="Mag Total">
        <div class="BigNum">
            <form action="MagPayment.php" method="GET">
            <input type="hidden" name="Type" value="Total">
            <input type="submit" value="<?php echo $paymentcount?>">
           </form>
        </div><br>
        <p>Total</p>
        <h3>Payments</h3>
    </div>

    <div class="Mag Ongoing">
        <div class="BigNum">
            <form action="MagPayment.php" method="GET">
            <input type="hidden" name="Type" value="Pending">
            <input type="submit" value="<?php echo $PPendingcount?>">
           </form>
        </div><br>
        <p>Pending</p>
        <h3>Payments</h3>
    </div>

    <div class="Mag Completed">
        <div class="BigNum">
            <form action="MagPayment.php" method="GET">
            <input type="hidden" name="Type" value="Approved">
            <input type="submit" value="<?php echo $PCompletedcount?>">
           </form>
        </div><br>
        <p>Approved</p>
        <h3>Payments</h3>
    </div>

    <div class="Mag Canceled">
        <div class="BigNum">
            <form action="MagPayment.php" method="GET">
            <input type="hidden" name="Type" value="Unapproved">
            <input type="submit" value="<?php echo $PCanceledcount?>">
           </form>
        </div><br>
        <p>Unapproved</p>
        <h3>Payments</h3>
    </div>
</div>
<hr>
<br>
<br>


<h2>Feedback</h2>
<div class="MagCon">
    
    <div class="Mag Total">
        <div class="BigNum">
            <form action="MagFeedback.php" method="GET">
            <input type="hidden" name="Type" value="Total">
            <input type="submit" value="<?php echo $Fbcount?>">
           </form>
        </div><br>
        <p>Total</p>
        <h3>Feedbacks</h3>
    </div>

    <div class="Mag Ongoing">
        <div class="BigNum">
            <form action="MagFeedback.php" method="GET">
            <input type="hidden" name="Type" value="Suggestion">
            <input type="submit" value="<?php echo $Fsugcount?>">
           </form>
        </div><br>
        <p>Suggestion</p>
        <h3>Feedbacks</h3>
    </div>

    <div class="Mag Completed">
        <div class="BigNum">
            <form action="MagFeedback.php" method="GET">
            <input type="hidden" name="Type" value="Help">
            <input type="submit" value="<?php echo $FHelpcount?>">
           </form>
        </div><br>
        <p>Help</p>
        <h3>Feedbacks</h3>
    </div>

    <div class="Mag Canceled">
        <div class="BigNum">
            <form action="MagFeedback.php" method="GET">
            <input type="hidden" name="Type" value="Complaint">
            <input type="submit" value="<?php echo $Fcomcount?>">
           </form>
        </div><br>
        <p>Complaint</p>
        <h3>Feedbacks</h3>
    </div>
</div>
</div>





    
    
</body>
</html>
