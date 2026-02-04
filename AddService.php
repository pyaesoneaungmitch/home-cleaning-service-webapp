<?php session_start(); ?>
<!DOCTYPE html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<?php include('Anavbar.php'); ?>
<div class="content">
    <h2>Add Services</h2>
    <div class="BookingDetails" Style="margin-left:10px">
    <form action="AddServiceProcess.php" method="POST" enctype="multipart/form-data">
        <label for="name">Service Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="des">Description:</label>
        <textarea id="des" name="des" rows="4" cols="50" required ></textarea><br><br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required><br>
        <br>
        <label for="photo">Upload Service Image:</label><br>
        <input type="file" id="photo" name="photo" accept="image/*" required><br><br>

        <button type="submit" ><b>Add New Service</b></button>
    </form>
</div>
</div>
</body>
</html>
