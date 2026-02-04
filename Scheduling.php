<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Your Service</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Include a calendar API
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <style>
        .datepicker-container {
            max-width: 400px;
            margin-left: 10px ;
            
        }

        .flatpickr-calendar {
            width: 100%;
            background-color: #fff;
            border: 1px solid #2F5846;
            border-radius: 10px;
            font-size:20px;
            font-weight:bold;
            justify-content:center;
            padding:30px;
        }

        .flatpickr-day {
            padding: 10px;
            border-radius: 3px;
            background-color: #fff;
            border-radius: 10px;
            font-weight:bold;
        }


        .flatpickr-day.selected {
            background-color: #2F5846;
            color: #fff;
        }


        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        input[type="hidden"] {
            padding: 10px;
            width: 100%;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<?php include('navbar.php'); ?>
<div class="content">
    <h1>Schedule Your Service</h1>
    
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve posted data
            $ServiceID = $_POST['ServiceID'];
            $serviceType = $_POST['serviceType'];
            $basePrice = $_POST['basePrice'];
            $total_hours = $_POST['total_hours'];
            $total_cleaners = $_POST['total_cleaners'];
            $total_price = $_POST['total_price'];
            $total_bathrooms = $_POST['total_bathrooms'];
            $total_bedrooms = $_POST['total_bedrooms'];
            $add_ons = isset($_POST['add_ons']) ? $_POST['add_ons'] : [];

            
        } else {
            echo "<p>Error: Service details not provided.</p>";
        }
        ?>
    
    <div class="FormUI">
    <div class = "LeftUI">

    <h3>Select Date and Time</h3>
    <form action="OrderProcess.php" method="POST">
        <!-- Passing the necessary hidden data to the next page -->
         
        <input type="hidden" name="ServiceID" value="<?php echo htmlspecialchars($ServiceID); ?>">
        <input type="hidden" name="serviceType" value="<?php echo htmlspecialchars($serviceType); ?>">
        <input type="hidden" name="basePrice" value="<?php echo htmlspecialchars($basePrice); ?>">
        <input type="hidden" name="total_hours" value="<?php echo htmlspecialchars($total_hours); ?>">
        <input type="hidden" name="total_cleaners" value="<?php echo htmlspecialchars($total_cleaners); ?>">
        <input type="hidden" name="total_price" value="<?php echo htmlspecialchars($total_price); ?>">
        <input type="hidden" name="total_bedrooms" value="<?php echo htmlspecialchars($total_bedrooms); ?>">
        <input type="hidden" name="total_bathrooms" value="<?php echo htmlspecialchars($total_bathrooms); ?>">
        <input type="hidden" name="add_ons" value="<?php echo implode(", ", $add_ons); ?>">

        <b><label for="serviceDate">Choose Date:</label></b>
        <div class="datepicker-container">
            <div id="datepicker"></div>

            <input type="hidden" id="hiddenDate" name="bookingDate">
        </div>

        <!-- Flatpickr JS -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>
            flatpickr("#datepicker", {
                inline: true, // Keeps the calendar open
                dateFormat: "Y-m-d", // Year-month-day format
                minDate: "today", // Prevent selection of past dates
                onChange: function(selectedDates, dateStr, instance) {
                document.getElementById('hiddenDate').value = dateStr;
                }
            });
        </script>
        
        <!---<script>
        $(function() {
            $("#datepicker").datepicker({
            inline: true, // Keeps the calendar visible
            showOtherMonths: true, // Show other months
            selectOtherMonths: true, // Allow selecting days from other months
            minDate:1,
            dateFormat: "yy-mm-dd",
            inline: true, // Keeps the calendar visible
                onSelect: function(dateText) {
                    // Store the selected date in the hidden input
                    $("#hiddenDate").val(dateText);}
            });
        });
        </script>--->

<br><br>

        <!-- Time Picker -->
        <b><label for="bookingTime">Choose Time:</label></b>
        <table>
        <tr>
            <td><input type="radio" name="bookingTime" value="9:00 AM" required> 9:00 AM</td>
            <td><input type="radio" name="bookingTime" value="10:00 AM"> 10:00 AM</td>
            <td><input type="radio" name="bookingTime" value="11:00 AM"> 11:00 AM</td>
        </tr>
        <tr>
            <td><input type="radio" name="bookingTime" value="12:00 PM"> 12:00 PM</td>
            <td><input type="radio" name="bookingTime" value="1:00 PM"> 1:00 PM</td>
            <td><input type="radio" name="bookingTime" value="2:00 PM"> 2:00 PM</td>
        </tr>
        <tr>
            
            <td><input type="radio" name="bookingTime" value="3:00 PM"> 3:00 PM</td>
            <td><input type="radio" name="bookingTime" value="4:00 PM"> 4:00 PM</td>
            <td><input type="radio" name="bookingTime" value="5:00 PM"> 5:00 PM</td>
        </tr>
        </table>
        <br>


        <!-- Township Selection -->
        <h3>Address Informaiton</h3>
        <label for="township">Select Your Township:<div class="popup" onclick="myFunction()"> ▣Don't See your TownShip?
        <span class="popuptext" id="myPopup">It appears that the township you are searching for is not 
            listed in our service area. We regret to inform you that, at this time, our professional cleaning 
            services are not available in the specified township. We are continually working to expand our 
            service coverage and hope to serve your area in the near future. Thank you for your understanding.</span>
        </div></label>
        <select name="township" id="township" required> <a href=""></a>
            <option value="Bahan">Bahan</option>
            <option value="Hlaing">Hlaing</option>
            <option value="Insein">Insein</option>
            <option value="Kamayut">Kamayut</option>
            <option value="Kyauktada">Kyauktada</option>
            <option value="Lanmadaw">Lanmadaw</option>
            <option value="Latha">Latha</option>
            <option value="Mayangone">Mayangone</option>
            <option value="Sanchaung">Sanchaung</option>
            <option value="Tamwe">Tamwe</option>
            <option value="Yankin">Yankin</option>
            <!-- Add other townships as needed -->
        </select>
        
        

        <script>
        // When the user clicks on div, open the popup
        function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
        }
        </script>
        
        

        <!-- Address Field -->
        <label for="address">Address:</label>
        <textarea id="address" name="address" placeholder="Enter your Full address: Apt number, street name, ect. " rows="4" cols="100" required></textarea>

        <!-- Remarks Field -->
        <label for="remarks">Remarks:</label>
        <textarea id="remarks" name="remarks" placeholder="For Special instructions and Remarks" rows="2" cols="90" ></textarea>
        </div>

        <div class = "RightUI">
        <h2>Booking Overview</h2>
        <hr>
        <div class="RLUI">
        <h3>Service Type: <?php echo htmlspecialchars($serviceType); ?></h3>
        <h3>Total Hours: <?php echo htmlspecialchars($total_hours); ?> hours</h3>
        <h3>Total Cleaners: <?php echo htmlspecialchars($total_cleaners); ?></h3>
        <?php if (!empty($add_ons)) {
                echo "<h3>Add-Ons:</h3><ul>";
                foreach ($add_ons as $add_on) {
                    echo "<li>" . htmlspecialchars($add_on) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<h3><strong>Add-Ons:</strong> None</h3>";
            }
            ?>
            </div>
            <div class="ExtraUI">
        <h3 class="Sum">Total Price: <?php echo htmlspecialchars($total_price); ?>$</h3>
        <div class="form-navigation">
            <button type="button" onclick="goBack()">Go Back</button>
            <button type="submit">Continue</button>
        </div>
        </div>
        </div>
    </form>
</div>

<script>
$(function() {
    $("#serviceDate").datepicker({
        minDate: 1, // Prevent selecting today's date or past dates
        dateFormat: "yy-mm-dd"
    });
});

// Go Back Button Function
function goBack() {
    window.history.back();
}
</script>

</body>
</html>
