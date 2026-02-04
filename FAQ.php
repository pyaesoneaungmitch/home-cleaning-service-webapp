<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeShine FAQ</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<?php include('navbar.php'); ?>
<div class="content">

    <div class="faq-container">
        <!-- Title -->
        <h1 class="faq-title">Frequently Asked Questions</h1>
        <center><h2><a href="CheckList.php">Check Out our Service Comparison CheckList!</a></h2></center>
        <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer1')">
            <h3>Can I cancel or reschedule my booking?</h3>
        </div>
        <div id="answer1" class="faq-answer">
            <p>Yes, you can cancel or reschedule your booking up to 24 hours before the scheduled time without any additional charges.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer2')">
            <h3>How do I book a cleaning service?</h3>
        </div>
        <div id="answer2" class="faq-answer">
            <p>You can book a cleaning service through our website, by selecting your desired time and services, and completing the payment.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer3')">
            <h3>What if I am not satisfied with the cleaning service?</h3>
        </div>
        <div id="answer3" class="faq-answer">
            <p>If you are not satisfied with the cleaning service, please contact our support team within 24 hours, and we will work to resolve the issue.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer4')">
            <h3>What cleaning products do you use?</h3>
        </div>
        <div id="answer4" class="faq-answer">
            <p>We use eco-friendly, non-toxic cleaning products. If you have preferences, you can request specific products during booking.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer5')">
            <h3>Do I need to provide cleaning equipment?</h3>
        </div>
        <div id="answer5" class="faq-answer">
            <p>No, our cleaners come fully equipped with all the necessary cleaning supplies and equipment.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer6')">
            <h3>Is there a satisfaction guarantee?</h3>
        </div>
        <div id="answer6" class="faq-answer">
            <p>Yes, we offer a satisfaction guarantee. If something isn't cleaned to your standards, we will return to re-clean the area.</p>
        </div>
    </div>

    <!-- 10 More FAQs Start Here -->
    
    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer7')">
            <h3>How much notice do I need to book a service?</h3>
        </div>
        <div id="answer7" class="faq-answer">
            <p>We recommend booking at least 48 hours in advance. However, same-day bookings may be available based on availability.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer8')">
            <h3>Can I request a specific cleaner?</h3>
        </div>
        <div id="answer8" class="faq-answer">
            <p>Yes, you can request a specific cleaner. We will try to accommodate your request, subject to availability.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer9')">
            <h3>How are prices calculated?</h3>
        </div>
        <div id="answer9" class="faq-answer">
            <p>The price is based on the size of your home, number of rooms, and any additional services you may add to your booking.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer10')">
            <h3>Do I need to be home during the cleaning?</h3>
        </div>
        <div id="answer10" class="faq-answer">
            <p>No, you do not need to be home. You can leave instructions for the cleaner to access your home securely.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer11')">
            <h3>What areas do you service?</h3>
        </div>
        <div id="answer11" class="faq-answer">
            <p>We service homes in the Yangon area. You can check the townships we cover on our website's service area page.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer12')">
            <h3>How do I pay for the service?</h3>
        </div>
        <div id="answer12" class="faq-answer">
            <p>You can pay online via credit card or mobile payment options like KBZPay, AYA Pay, or WavePay.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer13')">
            <h3>Do you offer recurring cleaning services?</h3>
        </div>
        <div id="answer13" class="faq-answer">
            <p>Yes, we offer weekly, bi-weekly, and monthly recurring cleaning services. You can set this up during the booking process.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer14')">
            <h3>Can I rent cleaning equipment?</h3>
        </div>
        <div id="answer14" class="faq-answer">
            <p>Yes, we offer cleaning equipment rentals. You can choose the equipment and rent it online through our platform.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer15')">
            <h3>What is your cancellation policy?</h3>
        </div>
        <div id="answer15" class="faq-answer">
            <p>You can cancel your cleaning up to 24 hours before the appointment without any penalties.</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="faq-question" onclick="toggleAnswer('answer16')">
            <h3>Can I reschedule my booking?</h3>
        </div>
        <div id="answer16" class="faq-answer">
            <p>Yes, you can reschedule your booking up to 24 hours in advance without additional charges.</p>
        </div>
    </div>

    </div>

    <!-- Optional Back to Top Button -->
    <div class="back-to-top">
        <a href="#">Back to Top</a>
    </div>


    <script>
        function toggleAnswer(id) {
            var answer = document.getElementById(id);
            if (answer.style.display === "none" || answer.style.display === "") {
                answer.style.display = "block";
            } else {
                answer.style.display = "none";
            }
        }
        </script>
</div>
</body>
</html>
