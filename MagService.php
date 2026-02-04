<?php


include("ConnectDB.php");

// Query based on status
if (isset($_GET['btnSearch']))
{
    $Col = $_GET['column'];
    $search = $_GET['data'];
    $query = "SELECT * FROM service WHERE $Col = '$search'";

}

else
{
    $query = "SELECT * FROM service";
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
            <option value="ServiceID">ServiceID</option>
            <option value="ServiceName">ServiceName</option>
            <option value="Price">Price</option>
            <option value="Description">Description</option>
            <!-- You can dynamically populate this combo box using PHP or JS from the database -->
        </select>

        <!-- Search Button -->
        <button type="submit" name = "btnSearch">
            Search <i class="fas fa-search"></i>
        </button>
    </form>

<h1>Services</h1>
<br>
<br>
<a href="AddService.php" class="Abtn">Add</a>
<br>
<div class="admintable">
<table border="1">
    <thead>
        <tr>
	
            <th>Action</th>
            <th>ServiceID</th>
            <th>ServiceName</th>
            <th>Price</th>
            <th>Description</th>
            <th>Photo</th>

        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>
                    <a href="MagServiceDetail.php?ServiceID=<?php echo $row['ServiceID']; ?>">
                        Edit
                    </a><br><hr>
                    <a  href="delete.php?ID=<?php echo $row['ServiceID']; ?>&tblName=service" 
                        onclick="return confirm('Are you sure you want to delete this item?');"
                        style="color: red; text-decoration: none;">Delete</a>
                </td>
                
                <td><?php echo $row['ServiceID']; ?></td>
                <td><?php echo $row['ServiceName']; ?></td>
                <td><?php echo $row['Price']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td><img src="<?php echo $row['ServicePhoto']; ?>"
                style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;" 
                alt="<?php echo $row['ServicePhoto']; ?>"></td>
        <?php } ?>
    </tbody>
</table>
<br>
<br>
<hr>
<center><p>End of results</p></center>
</div>
</div>
<br>
<br>
<hr>
</body>
</html>