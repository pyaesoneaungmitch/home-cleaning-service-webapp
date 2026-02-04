<?php
// Get status from the URL
$status = isset($_GET['Type']) ? $_GET['Type'] : 'Total';


include("ConnectDB.php");

// Query based on status
if ($status == "Total")
{
    $query = "SELECT feedback.FeedbackType,feedback.FeedbackID, customer.CustomerName,
    customer.CustomerEmail, feedback.Message, feedback.FeedbackTime
    From feedback,customer 
    WHERE feedback.CustomerID = customer.CustomerID";
} 

else
{
    $query = "SELECT feedback.FeedbackType,feedback.FeedbackID, customer.CustomerName,
    customer.CustomerEmail, feedback.Message, feedback.FeedbackTime
    From feedback,customer 
    WHERE feedback.CustomerID = customer.CustomerID
    AND  feedback.FeedbackType = '$status'";
}
$result = $connection->query($query);
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
 

<h1><?php echo $status;?> Feedbacks</h1>
<hr>
<br>
<h2>Feedbacks</h2>

<div class="admintable">
<table border="1">
    <thead>
        <tr>
	
            <th>Type</th>
            <th>FeedbackID</th>
            <th>CustomerName</th>
            <th>Email</th>
            <th style="width:400px;">Message</th>
            <th>Time</th>
            

        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
            
                <td><?php echo $row['FeedbackType']; ?></td>
                <td><?php echo $row['FeedbackID']; ?></td>
                <td><?php echo $row['CustomerName']; ?></td>
                <td><?php echo $row['CustomerEmail']; ?></td>
                <td><?php echo $row['Message']; ?></td>
                <td><?php echo $row['FeedbackTime']; ?></td>
        <?php } ?>
    </tbody>
</table>
<br>
<br>
<hr>
<center><p>End of results</p></center>

</div>
</div>

</body>
</html>