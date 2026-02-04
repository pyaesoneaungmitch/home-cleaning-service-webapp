<?php


include("ConnectDB.php");

if (isset($_GET['btnSearch']))
{
    $Col = $_GET['column'];
    $search = $_GET['data'];
    $query = "SELECT * FROM customer WHERE $Col = '$search'";

}
else
{
    $query = "SELECT * FROM customer";
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
 <form class="search-container" method="GET">
        <!-- Search Value Input -->
        <input type="text" name="data" placeholder="Enter value to search" required>

        <!-- Dynamic Combo Box for Column Selection -->
        <select name="column" required>
            <option value="" disabled selected>Select Column</option>
            <option value="CustomerID">CustomerID</option>
            <option value="CustomerName">Name</option>
            <option value="CustomerPassword">Password</option>
            <option value="CustomerEmail">Email</option>
            <option value="CustomerPhone">Phone</option>
            <option value="CustomerDOB">DOB</option>
            <!-- You can dynamically populate this combo box using PHP or JS from the database -->
        </select>

        <!-- Search Button -->
        <button type="submit" name = "btnSearch">
            Search <i class="fas fa-search"></i>
        </button>
    </form>

<h1>Customers</h1>

<div class="admintable">
<table border="1">
    <thead>
        <tr>

            <th>Action</th>
            <th>CustomerID</th>
            <th>Name</th>
            <th>Password</th>
            <th>Email</th>
            <th>Phone</th>
            <th>DOB</th>

        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
	
                <td>
                    <a href="MagCustomerDetail.php?CustomerID=<?php echo $row['CustomerID']; ?>">
                        Edit
                    </a><br><hr>
                    <a  href="delete.php?ID=<?php echo $row['CustomerID']; ?>&tblName=customer" 
                        onclick="return confirm('Are you sure you want to delete this Customer Account?');"
                        style="color: red; text-decoration: none;">Delete</a>
                </td>
                
                <td><?php echo $row['CustomerID']; ?></td>
                <td><?php echo $row['CustomerName']; ?></td>
                <td><?php echo $row['CustomerPassword']; ?></td>
                <td><?php echo $row['CustomerEmail']; ?></td>
                <td><?php echo $row['CustomerPhone']; ?></td>
                <td><?php echo $row['CustomerDOB']; ?></td>
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