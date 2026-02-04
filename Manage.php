<!DOCTYPE html>
<?php session_start(); 

#if(isset($_SESSION['AdminID'])) 
                #{
                    #$AdminID = $_SESSION['AdminID'];
                    include("ConnectDB.php");
                    $Cussql = "SELECT * FROM customer";
                    $Cusqry=mysqli_query($connection,$Cussql);
                    $cuscount=mysqli_num_rows($Cusqry);

                    $Clsql = "SELECT * FROM cleaner";
                    $Clqry=mysqli_query($connection,$Clsql);
                    $Clcount=mysqli_num_rows($Clqry);

                    $Sersql = "SELECT * FROM service";
                    $Serqry=mysqli_query($connection,$Sersql);
                    $Sercount=mysqli_num_rows($Serqry);

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
<h1>Managment</h1>
<div class="MagCon">
    
<div class="Mag Total">
        <div class="BigNum">
            <form action="MagCustomer.php" method="GET">
            <input type="hidden" name="Type" value="Customers">
            <input type="submit" value="<?php echo $cuscount?>">
           </form>
        </div><br>
        <p>Total</p>
        <h3>Customers</h3>
    </div>

    <div class="Mag Ongoing">
        <div class="BigNum">
            <form action="MagCleaner.php" method="GET">
            <input type="hidden" name="Type" value="Cleaners">
            <input type="submit" value="<?php echo $Clcount?>">
           </form>
        </div><br>
        <p>Total</p>
        <h3>Cleaners</h3>
    </div>

    <div class="Mag Completed">
        <div class="BigNum">
            <form action="MagService.php" method="GET">
            <input type="hidden" name="Type" value="Services">
            <input type="hidden" name="Num" value="1">
            <input type="submit" value="<?php echo $Sercount?>">
           </form>
        </div><br>
        <p>Total</p>
        <h3>Services</h3>
    </div>
</div>

</div>
</div>
    
</body>
</html>
