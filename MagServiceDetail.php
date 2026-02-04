<?php
// Get bookingID from URL
$ServiceID = isset($_GET['ServiceID']) ? $_GET['ServiceID'] : 0;

include("ConnectDB.php");


// Fetch booking details
$query = "SELECT * FROM service WHERE ServiceID = $ServiceID";
$result = $connection->query($query);
$booking = $result->fetch_assoc();


// Handle form submission for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_Name = $_POST['name'];
    $new_Price = $_POST['price'];
    $new_Des = $_POST['Des'];
    $new_image =$_FILES["new_image"]["name"];
    
    if (!empty($new_image))
    {
    $target_dir = "Uploads/";
    $target_file = $target_dir . basename($_FILES["new_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES["new_image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["new_image"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow only certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    else {
        if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $target_file)) {
            // Insert data into database
        $update_query = "UPDATE service SET 
                                ServiceName = '$new_Name',
                                Price = '$new_Price',
                                Description = '$new_Des',
                                ServicePhoto = '$target_file'                                
                                WHERE ServiceID = $ServiceID";

        $connection->query($update_query);
        echo "<script>window.alert('Service and photo updated!')</script>";
        header("Refresh:0");
        }
    }

    }
    else {
        $update_query = "UPDATE service SET 
                                ServiceName = '$new_Name',
                                Price = '$new_Price',
                                Description = '$new_Des'                              
                                WHERE ServiceID = $ServiceID";

        $connection->query($update_query);
        echo "<script>window.alert('Service updated!')</script>";
        header("Refresh:0");
        
    }
}
?>

html lang="en">
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
<div class="BookingDetails">
<!-- Booking Details -->
<form method="POST"  enctype="multipart/form-data">
<div class="tblrow">
    <label>Service ID:</label>
    <input type="text" value="<?php echo $booking['ServiceID']; ?>" readonly><br>
</div>

<div class="tblrow">
    <label>Service Name:</label>
    <input type="text" value="<?php echo $booking['ServiceName']; ?>" name='name'>
    <br>
    </div>

    <div class="tblrow">
    <label>Price:</label>
    <input type="text" value="<?php echo $booking['Price']; ?>" name='price'><br>
    </div>

    <div class="tblrow">
    <label>Description:</label>
    <textarea name='Des'><?php echo $booking['Description'];?></textarea><br>
    </div>
    <div class="tblrow">
    <label for="image">Current Image:</label><br>
    <img src="<?php echo $booking['ServicePhoto']; ?>" 
         style="width: 150px; height: 150px; object-fit: cover;" alt="Current Image"><br><br>
    </div>
    <div class="tblrow">
    <label for="new_image">New Image (Optional):</label><br>
    <input type="file" name="new_image" id="new_image" accept="image/*" ><br><br>
    </div>
    <center>
    <button type="submit">Update</button>
    <a href="MagService.php">Go Back</a>
    </center>
    
</form>

</div>
</div>

</body>
</html>
