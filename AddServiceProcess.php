<?php
// Database connection
include("ConnectDB.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $des = $_POST["des"];
    $price = $_POST["price"];
    
    $target_dir = "Uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["photo"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow only certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // Insert data into database

            $sql = "insert into service (ServiceName, Price, Description, ServicePhoto)
                    values ('$name', '$price', '$des', '$target_file')";

                    if(mysqli_query($connection,$sql)){
                        echo "<script>
                                    alert('New App has been added successfully');
                                    window.location.href='MagService.php';
                             </script>";
                            } 
        else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
}
?>
