<?php session_start(); ?>
<?php
if(isset($_SESSION['CusID'])){

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serviceType = $_POST['serviceType'];
    $basePrice = $_POST['basePrice'];
    $ServiceID = $_POST['ServiceID'];
    $des = $_POST['Des'];
}}
else
echo "<script>window.alert('Please LogIn or SignUp first');
window.location.href='Home.php';
</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeShine - Service Details</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <script defer src="script.js"></script>
</head>
<body>
<?php include('navbar.php'); ?>    
<div class="content">
<h1>Service Details</h1>


    <h2><?php echo htmlspecialchars($serviceType); ?> Details <a href="CheckList.php" class="Checklist">▣See what's included>>></a></h2>
    <b><p>Base Price: MMK<?php echo htmlspecialchars($basePrice); ?></p></b>
    <div class="des">
    <p><?php echo htmlspecialchars($des); ?></p>
    </div>

    <div class="FormUI">
    <div class = "LeftUI">
        <form action="Scheduling.php" method="POST">
            <div class="service-options">
                <h3>Select the number of Bedrooms and Bathrooms</h3>
                <div>
                    <label for="bedrooms">Bedrooms:</label>
                    <select id="bedrooms" name="bedrooms">
                        <option value="0">Studio</option>
                        <option value="1">1 Bedroom</option>
                        <option value="2">2 Bedrooms</option>
                        <option value="3">3 Bedrooms</option>
                        <option value="4">4 Bedrooms</option>
                        <option value="5">5 Bedrooms</option>
                        <option value="6">6 Bedrooms</option>
                    </select>
                </div>
                <div>
                    <label for="bathrooms">Bathrooms:</label>
                    <select id="bathrooms" name="bathrooms">
                        <option value="1">1 Bathroom</option>
                        <option value="2">2 Bathrooms</option>
                        <option value="3">3 Bathrooms</option>
                        <option value="4">4 Bathrooms</option>
                        <option value="5">5 Bathrooms</option>
                        <option value="6">6 Bathrooms</option>
                    </select>
                </div>
            

            <div class="add-ons-container">
                <h3>Additional Add-Ons</h3>

                <div class="add-on">
                    <img src="img/waxing.png" alt="Waxing the Floor">
                    <div class="add-on-details">
                        <h4>Waxing the Floor</h4>
                        <p>Price: MMK 15000</p>
                        <p>Get a shiny, polished floor with our waxing service.</p>
                    </div>
                    <div class="add-on-select">
                        <input type="checkbox" name="add_ons[]" value="Waxing the Floor - MMK 15000" data-price="150000" data-hours="0.5">
                        
                    </div>
                </div>

                <div class="add-on">
                    <img src="img/fridge.png" alt="Fridge Cleaning">
                    <div class="add-on-details">
                        <h4>Fridge Cleaning</h4>
                        <p>Price: MMK 7500</p>
                        <p>Thorough cleaning and sanitizing of your fridge.</p>
                    </div>
                    <div class="add-on-select">
                        <input type="checkbox" name="add_ons[]" value="Fridge Cleaning - MMK 7500" data-price="7500" data-hours="0.5">
                        
                    </div>
                </div>

                <div class="add-on">
                    <img src="img/window-cleaning.png" alt="Window Cleaning">
                    <div class="add-on-details">
                        <h4>Window Cleaning</h4>
                        <p>Price: MMK 5000</p>
                        <p>Sparkling clean windows inside and out.</p>
                    </div>
                    <div class="add-on-select">
                        <input type="checkbox" name="add_ons[]" value="Window Cleaning - MMK 5000" data-price="5000" data-hours="0.5">
                        
                    </div>
                </div>

                <div class="add-on">
                    <img src="img/carpet.png" alt="Carpet Cleaning">
                    <div class="add-on-details">
                        <h4>Carpet Cleaning</h4>
                        <p>Price: MMK 17000</p>
                        <p>Deep cleaning and stain removal for your carpets.</p>
                    </div>
                    <div class="add-on-select">
                        <input type="checkbox" name="add_ons[]" value="Carpet Cleaning - MMK 17000" data-price="17000" data-hours="0.5">
                        
                    </div>
                </div>
            </div>
            </div>
            </div>

            <div class="RightUI">
            <!-- Display Total Hours, Cleaners, and Price -->
            <div id="total-summary-container">
                <h2>Required Time and Crew</h2>
                <hr>
                <h3 id="total-hours">Total Hours: 0</h3>
                <h3 id="total-cleaners">Total Cleaners: 0</h3><hr>
                
                <h3 id="total-price" class="Sum">Total  :<?php echo htmlspecialchars($basePrice); ?>MMK</h3>
            </div>

            <!-- Hidden inputs for sending calculated data to the next page -->
            <input type="hidden" name="serviceType" value="<?php echo htmlspecialchars($serviceType); ?>">
            <input type="hidden" name="basePrice" value="<?php echo htmlspecialchars($basePrice); ?>">
            <input type="hidden" name="ServiceID" value="<?php echo htmlspecialchars($ServiceID); ?>">
            <input type="hidden" name="total_hours" id="hidden-total-hours">
            <input type="hidden" name="total_cleaners" id="hidden-total-cleaners">
            <input type="hidden" name="total_price" id="hidden-total-price">
            <input type="hidden" name="total_bedrooms" id="hidden-total-bedrooms">
            <input type="hidden" name="total_bathrooms" id="hidden-total-bathrooms">


            <!-- Buttons -->
            <div class="form-navigation">
                <button type="button" onclick="goBack()">Go Back</button>
                <button type="submit">Continue</button>
            </div>
            
            </div>
        </form>
    </div>
    </div>

    <script>
    // Assume this base price is passed from the previous form or calculated server-side
    let basePrice = <?php echo $basePrice; ?>;

    // Elements
    const bedroomsSelect = document.getElementById('bedrooms');
    const bathroomsSelect = document.getElementById('bathrooms');
    const addOnCheckboxes = document.querySelectorAll('input[name="add_ons[]"]');
    const totalHoursDisplay = document.getElementById('total-hours');
    const totalCleanersDisplay = document.getElementById('total-cleaners');
    const totalPriceDisplay = document.getElementById('total-price');
    const hiddenTotalHours = document.getElementById('hidden-total-hours');
    const hiddenTotalCleaners = document.getElementById('hidden-total-cleaners');
    const hiddenTotalPrice = document.getElementById('hidden-total-price');

    // Calculate and update total hours, cleaners, and price
    function updateSummary() {
        let totalHours = 0;
        let totalPrice = basePrice;

        // Calculate hours and price based on bedrooms and bathrooms
        const bedrooms = parseInt(bedroomsSelect.value);
        const bathrooms = parseInt(bathroomsSelect.value);

        totalHours += bedrooms * 1;
        totalHours += bathrooms * 0.5;

        // Adjust price based on bedrooms and bathrooms (0.5 of the base price per room)
        if (bedrooms==0 && bathrooms==1){
            totalPrice = basePrice;
        }
        else
        {
            totalPrice = (bedrooms + bathrooms) * (0.5 * basePrice);
        }


        // Add hours and price for each selected add-on
        addOnCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                totalHours += parseFloat(checkbox.getAttribute('data-hours'));
                totalPrice += parseInt(checkbox.getAttribute('data-price'));
            }
        });

        // Calculate the number of cleaners needed
        const cleaners = Math.ceil(totalHours / 3); // 1 cleaner for every 3 hours

        // Update the display
        totalHoursDisplay.innerText = `Total Hours: ${totalHours}`;
        totalCleanersDisplay.innerText = `Total Cleaners: ${cleaners}`;
        totalPriceDisplay.innerText = `Total : ${totalPrice} MMK`;

        // Update hidden inputs
        hiddenTotalHours.value = totalHours;
        hiddenTotalCleaners.value = cleaners;
        hiddenTotalPrice.value = totalPrice;

        // Update hidden bedrooms and bathrooms
        document.getElementById('hidden-total-bedrooms').value = bedrooms;
        document.getElementById('hidden-total-bathrooms').value = bathrooms;

    }

    // Event listeners
    bedroomsSelect.addEventListener('change', updateSummary);
    bathroomsSelect.addEventListener('change', updateSummary);
    addOnCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSummary);
    });

    // Initial calculation
    updateSummary();

    // Go Back Button Function
    function goBack() {
        window.history.back();
    }
    </script>
</div>
</body>
</html>
