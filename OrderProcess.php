<?php session_start(); ?>
<?php include('ConnectDB.php');

            $serviceType = $_POST['serviceType'];
            $basePrice = $_POST['basePrice'];
            $total_hours = $_POST['total_hours'];
            $total_cleaners = $_POST['total_cleaners'];
            $total_price = $_POST['total_price'];
            $add_ons = isset($_POST['add_ons']) ? $_POST['add_ons'] : [];
            $Time = $_POST['bookingTime'];
            $Date = $_POST['bookingDate'];
            $Township = $_POST['township'];
            $Address = $_POST['address'];
            $Remark = $_POST['remarks'];
            $total_bedrooms = $_POST['total_bedrooms'];
            $total_bathrooms = $_POST['total_bathrooms'];
            $CusID = $_SESSION['CusID'];
            $ServiceID = $_POST['ServiceID'];

            
            $sql = "insert into booking (ServiceName, Address, Address_TownShip, CleanerQty, HoursQty, Bedrooms, Bathrooms, 
            BookingTime, BookingDate, PaymentStatus, Remarks, Addons, Total, CustomerID, ServiceID,BookingStatus,JobStatus)	
                values ('$serviceType', '$Address', '$Township', '$total_cleaners', '$total_hours', '$total_bedrooms', '$total_bathrooms' ,
                '$Time', '$Date', 'Unpaid','$Remark', '$add_ons', '$total_price',$CusID, $ServiceID,'Pending','Unassigned')";

                    if(mysqli_query($connection,$sql)){
                        echo "<script>
                                    alert('Booking Added successfully');
                             </script>";
                            } 
                            
                            $sql2 = "SELECT MAX(BookingID) AS CurrentID FROM Booking";
                            $result = $connection->query($sql2);
                            
                            if ($result->num_rows > 0) {
                                // Fetch the result as an associative array
                                $row = $result->fetch_assoc();
                                $CurrentID = $row['CurrentID'];
                            }
                            
                            
                            
                            
                            // Redirect to overview.php
                            header("Location: Checkout.php?orderID=" . $CurrentID);
                            exit();
?>