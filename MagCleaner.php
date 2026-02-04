<?php


include("ConnectDB.php");

if (isset($_GET['btnSearch']))
{
    $Col = $_GET['column'];
    $search = $_GET['data'];
    $query = "SELECT * FROM cleaner WHERE $Col = '$search'";

}
else
{

$query = "SELECT * FROM cleaner";
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
            <option value="CleanerID">CleanerID</option>
            <option value="CleanerName">CleanerName</option>
            <option value="CleanerPassword">Password</option>
            <option value="CleanerEmail">Email</option>
            <option value="CleanerDOB">DOB</option>
            <option value="CleanerPosition">Position</option>
            <option value="CleanerStatus">Status</option>
            <!-- You can dynamically populate this combo box using PHP or JS from the database -->
        </select>

        <!-- Search Button -->
        <button type="submit" name = "btnSearch">
            Search <i class="fas fa-search"></i>
        </button>
    </form>

<h1>Cleaners</h1>

<div class="admintable">
<table border="1">
    <thead>
        <tr>

            <th>Action</th>
            <th>CleanerID</th>
            <th>CleanerName</th>
            <th>Password</th>
            <th>DOB</th>
            <th>Email</th>
            <th>Position</th>
            <th>Status</th>

        </tr>
    </thead>
    <tbody>
        <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
	
                <td>
                    <a href="MagCleanerDetail.php?CleanerID=<?php echo $row['CleanerID']; ?>">
                        Edit
                    </a><br><hr>
                    <a  href="delete.php?ID=<?php echo $row['CleanerID']; ?>&tblName=cleaner" 
                        onclick="return confirm('Are you sure you want to delete this cleaner Account?');"
                        style="color: red; text-decoration: none;">Delete</a>
                </td>
                
                <td><?php echo $row['CleanerID']; ?></td>
                <td><?php echo $row['CleanerName']; ?></td>
                <td><?php echo $row['CleanerPassword']; ?></td>
                <td><?php echo $row['CleanerDOB']; ?></td>
                <td><?php echo $row['CleanerEmail']; ?></td>
                <td><?php echo $row['CleanerPosition']; ?></td>
                <td><?php echo $row['CleanerStatus']; ?></td>
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