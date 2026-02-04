<!DOCTYPE html>
<?php session_start(); 

#if(isset($_SESSION['AdminID'])) 
                #{
                    #$AdminID = $_SESSION['AdminID'];
                    #Jobs
                    include("ConnectDB.php");
                        #Total Jobs
                        $JobSql = "SELECT * FROM booking";
                        $Jobresult=mysqli_query($connection,$JobSql);
                        $Jobcount=mysqli_num_rows($Jobresult);

                        #Total Assigned Jobs
                        $JCompletedsql = "SELECT * FROM booking WHERE JobStatus='Assigned'";
                        $JCompletedresult=mysqli_query($connection,$JCompletedsql);
                        $JCompletedcount=mysqli_num_rows($JCompletedresult);

                        #Total Unassigned Jobs
                        $JCanceledsql = "SELECT * FROM booking WHERE JobStatus='Unassigned'";
                        $JCanceledresult=mysqli_query($connection,$JCanceledsql);
                        $JCanceledcount=mysqli_num_rows($JCanceledresult);

                #}

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
<hr>
<!--FOR JOBS---->

<h1>Jobs</h1>
<div class="MagCon">
    
    <div class="Mag Total">
        <div class="BigNum">
            <form action="MagJob.php" method="GET">
            <input type="hidden" name="Type" value="Total">
            <input type="submit" value="<?php echo $Jobcount?>">
           </form>
        </div><br>
        <p>Total</p>
        <h3>Jobs</h3>
    </div>

    <div class="Mag Canceled">
        <div class="BigNum">
            <form action="MagJob.php" method="GET">
            <input type="hidden" name="Type" value="Unassigned">
            <input type="submit" value="<?php echo $JCanceledcount?>">
           </form>
        </div><br>
        <p>Unassigned</p>
        <h3>Jobs</h3>
    </div>

    <div class="Mag Completed">
        <div class="BigNum">
            <form action="MagJob.php" method="GET">
            <input type="hidden" name="Type" value="Assigned">
            <input type="submit" value="<?php echo $JCompletedcount?>">
           </form>
        </div><br>
        <p>Assigned</p>
        <h3>Jobs</h3>
    </div>
    </div>

<hr>
<br>
<br>
    
</body>
</html>
