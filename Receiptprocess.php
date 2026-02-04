<?php
// Include a library to generate PDFs, such as FPDF
require('fpdf\fpdf.php');

// Assume you have already passed the order data via POST
$BookingID = $_POST['BookingID'];
// Retrieve any other necessary data from POST

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
    $CusID = $row["CustomerID"];
    $Status = $row["PaymentStatus"];


    $sql2 = "SELECT CustomerName FROM customer WHERE CustomerID = $CusID";
    $result2 = $connection->query($sql2);
    $name_row = $result2->fetch_assoc();
    $CusName = $name_row["CustomerName"];

// Start generating the PDF

$pdf = new FPDF();
$pdf->AddPage();

$pdf->Image('img\BlackLogo.png', 10, 10, 40); // Adjust the path and size as needed

// Move the cursor to the right for the title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'HomeShine Cleaning Services', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'E-Receipt', 0, 1, 'C');
$pdf->Ln(10);

// Booking Information (Left Side)
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(70, 10, 'Booking Information', 0, 0, 'L');
$pdf->Cell(100, 10, 'Customer Information', 0, 1, 'L'); // Creates space for customer info

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30, 10, 'Booking ID:', 0, 0, 'L');
$pdf->Cell(40, 10, $BookingID, 0, 0, 'L');
$pdf->Cell(30, 10, 'Name:', 0, 0, 'L');
$pdf->Cell(110, 10, $CusName, 0, 1, 'L');

$pdf->Cell(30, 10, 'Booking Date:', 0, 0, 'L');
$pdf->Cell(40, 10, $Date, 0, 0, 'L');
$pdf->Cell(30, 10, 'Address:', 0, 0, 'L');
$pdf->Cell(110, 10, $Address, 0, 1, 'L');

$pdf->Cell(30, 10, 'Booking Time:', 0, 0, 'L');
$pdf->Cell(40, 10, $Time, 0, 0, 'L');
$pdf->Cell(30, 10, 'Township:', 0, 0, 'L');
$pdf->Cell(110, 10, $Township, 0, 1, 'L');

$pdf->Cell(30, 10, 'Service Name:', 0, 0, 'L');
$pdf->Cell(40, 10, $ServiceName, 0, 0, 'L');
$pdf->Cell(30, 10, '', 0, 0, 'L'); // Empty cell for alignment
$pdf->Cell(110, 10, '', 0, 1, 'L');

$pdf->Ln(10);

// Service Details Table
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Item', 1);
$pdf->Cell(160, 10, 'Description', 1);
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30, 10, 'Bedrooms', 1);
$pdf->Cell(160, 10, $Bedrooms, 1);
$pdf->Ln(10);

$pdf->Cell(30, 10, 'Bathrooms', 1);
$pdf->Cell(160, 10, $Bathrooms, 1);
$pdf->Ln(10);

$pdf->Cell(30, 10, 'Addons', 1);
$pdf->Cell(160, 10, $Addons, 1);
$pdf->Ln(10);

$pdf->Cell(30, 10, 'Remarks', 1);
$pdf->Cell(160, 10, $Remarks, 1);
$pdf->Ln(10);

// Total Summary
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(50, 10, 'Total Summary', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Total Hours:', 0, 0);
$pdf->Cell(50, 10, $TotalHours, 0, 1);
$pdf->Cell(50, 10, 'Total Cleaners:', 0, 0);
$pdf->Cell(50, 10, $TotalCleaner, 0, 1);
$pdf->Cell(50, 10, 'Grand Total:', 0, 0);
$pdf->Cell(50, 10, '$' . $TotalPrice, 0, 1);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(0, 10, 'Payment Status : '.$Status, 0, 1, 'C');
$pdf->Ln(20);
// Footer
$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(0, 10, 'Thank You for Choosing HomeShine!', 0, 1, 'C');

$pdf->Output();
}

else {
    echo "<script>
        alert('Cannot Generate File at the moment');
            window.history.back();

</script>";
}

?>