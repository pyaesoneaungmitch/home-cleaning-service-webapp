<?php
// Include database connection

include("ConnectDB.php");
// Check if 'id' is passed in the URL
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $tbl = $_GET['tblName'];

    if ($tbl=='cleaner')
    {
        $IDType = 'CleanerID';
    }

    else if ($tbl=='service')
    {
        $IDType = 'ServiceID';
    }

    else if ($tbl=='customer')
    {
        $IDType = 'CustomerID';
    }

    // Prepare the delete query
    $query = "DELETE FROM $tbl WHERE $IDType = $id";
    $stmt = $connection->prepare($query);
    

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>
                alert('Record has been Deleted');
                window.location.href='Manage.php';
              </script>";
    } else {
        echo "<script>window.alert('Error deleting record:')</script>";
    }

    // Close statement and connection
    $stmt->close();
} else {
    echo "<script>window.alert('Invalid Request')</script>";
}
?>
