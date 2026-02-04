<?php session_start();

$BookingID = $_POST['BookingID'];
$Type =$_POST['PaymentType'];

include('ConnectDB.php');

$sql = "SELECT * FROM booking WHERE BookingID = $BookingID";
$result = $connection->query($sql);

if ($result->num_rows > 0){
    
    $row = $result->fetch_assoc();
    $TotalPrice = $row["Total"];
    $CusID = $row["CustomerID"];
}

if ($Type=="CARD")
{
    $CardNo = $_POST['cardnumber'];
    $Name = $_POST['cardname'];
    $month = $_POST['expmonth'];
    $year = $_POST['expyear'];
    $zip = $_POST['zip'];
    $CVV = $_POST['cvv'];

    $sql2="INSERT INTO payment (BookingID, CustomerID, PaymentMethod, CardNumber, HolderName, ExpMonth, ExpYear, 
        Zip, CVV, Amount, PaymentStatus)
                VALUES ('$BookingID','$CusID','Credit','$CardNo','$Name','$month','$year',
                '$zip','$CVV','$TotalPrice','Pending')";
    if(mysqli_query($connection,$sql2))
    {
        $sql3 = "UPDATE `booking` SET PaymentStatus = 'Paid' WHERE booking.BookingID = $BookingID";
        mysqli_query($connection,$sql3);
        echo "<script>window.location.href='PaymentComfirm.php?BookingID=$BookingID'</script>";
    }
}

else if ($Type=="COD")
{
    $sql2="INSERT INTO payment (BookingID, CustomerID, PaymentMethod, Amount, PaymentStatus)
                    VALUES ('$BookingID','$CusID','Cash','$TotalPrice','Pending')";

    if(mysqli_query($connection,$sql2))
    {
        $sql3 = "UPDATE `booking` SET PaymentStatus = 'Pending' WHERE booking.BookingID = $BookingID";
        mysqli_query($connection,$sql3);
        echo "<script>window.location.href='Confirm.php?BookingID=$BookingID'</script>";
    }
}

else if ($Type=="KBZPAY"){
    $PhoneNO = $_POST['Phone'];
    $Name = $_POST['Name'];

    $sql2="INSERT INTO payment (BookingID, CustomerID, PaymentMethod, CardNumber, HolderName, Amount, PaymentStatus)
                        VALUES ('$BookingID','$CusID','KBZPay','$PhoneNO','$Name','$TotalPrice','Pending')";

    if(mysqli_query($connection,$sql2))
    {
        $sql3 = "UPDATE `booking` SET PaymentStatus = 'Pending' WHERE booking.BookingID = $BookingID";
        mysqli_query($connection,$sql3);
        echo "<script>window.location.href='Confirm.php?BookingID=$BookingID'</script>";
    }
}





