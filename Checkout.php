<?php session_start(); ?>
<?php
$BookingID = isset($_GET['orderID']) ? $_GET['orderID'] : null;


include("ConnectDB.php");

$sql = "SELECT * FROM booking WHERE BookingID = $BookingID";
$result = $connection->query($sql);

if ($result->num_rows > 0){
    
    $row = $result->fetch_assoc();
    $ServiceName = $row["ServiceName"];	
    $Address = $row["Address"];
    $Township = $row["Address_TownShip"];
    $TotalCleaner = $row["CleanerQty"];
    $TotalHours = $row["HoursQty"];
    $Bedrooms = $row["Bedrooms"];
    $Bathrooms = $row["Bathrooms"];
    $Time = $row["BookingTime"];
    $Date = $row["BookingDate"];
    $Remarks = $row["Remarks"];
    $Addons = $row["Addons"];
    $TotalPrice = $row["Total"];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Your Service</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script type="text/javascript">
      function COD()
        {
          document.getElementById('credit').style.display='none';
          document.getElementById('Cash').style.display='grid';
          document.getElementById('KBZ').style.display='none';
        }
        function CARD()
        {
          document.getElementById('credit').style.display='flex';
          document.getElementById('Cash').style.display='none';
          document.getElementById('KBZ').style.display='none';
        }
        function KPAY()
        {
          document.getElementById('credit').style.display='none';
          document.getElementById('Cash').style.display='none';
          document.getElementById('KBZ').style.display='grid';
        }
    </script>
</head>
<body>
<?php include('navbar.php'); ?>
<div class="content">

<h1>Check Out</h1>
	<input type="radio" name="PaymentType" value="CARD" checked onClick="CARD()" style="width: 35px;" />Credit Card
	<input type="radio" name="PaymentType" value="COD" onClick="COD()" style="width: 35px;"/>Cash on Delivery
	<input type="radio" name="PaymentType" value="KBZPAY" onClick="KPAY()" style="width: 35px;"/>KBZ Pay
	<br><br>

<div class="checkout" >
    <div class="row">
  <div class="col-75">
    <div class="container" id="credit" >
      <form action="PaymentProcess.php" method = "POST">
      <div class="col-50">
            <h2>Credit Card Payment</h2>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
                <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
                <input type="hidden" name="BookingID" value="<?php echo $BookingID;?>">
                <input type="hidden" name="PaymentType" value="CARD">
              </div>
            </div>
            <div style="display:flex;">
      <input type="checkbox" id="termbox" required required style="width: 35px;"> <label for="termbox">
        I aggree to <a href="CashTerms.php">Payment Policy</a></label>
        </div>
        </div>
        <input type="submit" value="Proceed to CheckOut" class="btn">
      </form>
    </div>
  </div>
  </div>



  <!-- CASH PAYMENT--->
  <div class="checkout">
  <div class="container" id="Cash" style="display:none; width: 550px; Height: 300px; Padding:40px; align-content: center;">
  <h2>Cash payment</h2>
    <form action="PaymentProcess.php" Method="POST"> 
      <p>You have selected to pay with cash. Please ensure you have the exact amount ready at the time of service. 
        Our cleaner will collect the payment upon completing the job</p>
        <div style="display:flex;">
      <input type="checkbox" id="combox" required style="width: 35px;"> <label for="combox">
      I agree to have the payment ready in cash at the time of service</label>
        </div>
        <hr>
        <br>
        <center>
      <div style="display:flex;">
      <input type="checkbox" id="termbox" required required style="width: 35px;"> <label for="termbox">
        I aggree to <a href="CashTerms.php">Payment Policy</a></label>
        </div>
        <input type="hidden" name="BookingID" value="<?php echo $BookingID;?>">
        <input type="hidden" name="PaymentType" value="COD">
        <input type="submit" value="Proceed to CheckOut" class="btn">
        </center>


    </form>
  </div>
  </div>


  <!-- KBZ PAYMENT--->
  <div class="checkout">
  <div class="container" id="KBZ" style="display:none; width: 550px; Height: 730px; Padding:40px; align-content: center;">
  <h2>KBZPay payment</h2>
    <form action="PaymentProcess.php" Method="POST"> 
      <center>
      <h3>Name: U Aung Kyaw</h3>
      <h3>09-961234567</h3>
      <img src="img/KbzQR.png" style="width: 250px; Height: 250px;">
      </center>
      <h3>Sender Information</h3>
      <label for="cname">Account Name</label>
      <input type="text" id="cname" name="Name" required>
      <label for="cname">Account Phone Number</label>
      <input type="text" id="cname" name="Phone" required>
        <hr>
        <br>
        <center>
      <div style="display:flex;">
      <input type="checkbox" id="termbox" required required style="width: 35px;"> <label for="termbox">
        I aggree to <a href="CashTerms.php">Payment Policy</a></label>
        </div>
        <input type="hidden" name="BookingID" value="<?php echo $BookingID;?>">
        <input type="hidden" name="PaymentType" value="KBZPAY">
        <input type="submit" value="Proceed to CheckOut" class="btn">
        </center>


    </form>
  </div>
  </div>
  


  <div class="col-25">
    <div class="container-sum">
      <center>
        <b><h2>Order Summary</h2></b>
        <div class="PriceTol">
            <h1>MMK <?php echo $TotalPrice?></h1>
        </div>
      </center>
      
   
        
      <h3>Order Details</h3>
      <p>OderID - <?php echo $BookingID?> </p>
      <p>No. Bedrooms - <?php echo $Bedrooms?> </p> 
      <p>No. Bathrooms - <?php echo $Bathrooms?> </p> 
      <p>Service - <?php echo $ServiceName?> </p> 
      <p>Total Hours - <?php echo $TotalHours?> </p> 
      <p>Total Cleaners - <?php echo $TotalCleaner?> </p> 
      <hr>
      <b><h3>Grand Total - <?php echo $TotalPrice?><br></h3></b>
      <hr>
      <p>Date - <?php echo $Date?> </p> 
      <p>Time - <?php echo $Time?> </p> 
      <p>TownShip - <?php echo $Township?> </p> 
      <p>Address - <?php echo $Address?> </p> 
      <p>Addons - <?php echo $Addons?> </p> 
      <p>Remarks - <?php echo $Remarks?> </p> 
      <hr>
      <form id="downloadForm" action="ReceiptProcess.php" method="POST">
        <input type="hidden" name="BookingID" value="<?php echo htmlspecialchars($BookingID); ?>">
        <button type="submit" id="downloadBtn" class="btn">Download E-Receipt</button>
    </form>
    </div>
  </div>
</div>
</div>
</div>
</body>
</html>