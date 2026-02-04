<?php
session_start();

 if(isset($_SESSION['CusID'])) 
                {
                    $CusID = $_SESSION['CusID'];
                    include("ConnectDB.php");
                    $sql = "SELECT * FROM customer WHERE CustomerID='$CusID'";
                		$result = mysqli_query($connection,$sql);
		                $record = mysqli_fetch_assoc($result); //only one/first record
                    $Name = $record['CustomerName'];//UserName
                    $Email = $record['CustomerEmail'];

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $Message = $_POST['message'];
                    $Type = $_POST['Type'];

                    $update_query = "INSERT feedback (CustomerID, Message, FeedbackType) values
                    ('$CusID','$Message','$Type');";

                    $connection->query($update_query);
                    echo "<script>window.alert('Thank you for your feedback','Your Feedback has been sent.')</script>";
                    header("Refresh:0");
                }
                }
else {
    echo "<script>window.alert('Please LogIn or SignUp first');
    window.location.href='Home.php';
    </script>";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - HomeShine</title>
<link rel="stylesheet" type="text/css" href="Style.css">
    <style>
       
        header, footer {
            background: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            width: 60%;
            overflow: hidden;
            padding-right:300px;
        }
        h1 {
            color: #5d5d5d;
        }
        .contact-info, .social-links {
            margin: 20px 0;
        }
        .contact-info p, .social-links a {
            margin: 5px 0;
        }
        .social-links a {
            color: #333;
            text-decoration: none;
        }
        .social-links a:hover {
            text-decoration: underline;
        }
        .contact-form {
            margin: 20px 0;
        }
        .contact-form input, .contact-form textarea {
            width: 400px;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .contact-form input[type="radio"] {
            width:20px;
        }

        .contact-form input[type="submit"] {
            background: #5d5d5d;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .contact-form input[type="submit"]:hover {
            background: #333;
        }
        .map {
            margin: 20px 0;
        }
        iframe {
            width: 100%;
            border: 0;
        }
    </style>
</head>

<body>
<?php include('navbar.php'); ?>
<div class="content">
    <div class="container">
        <section class="about-us">
            <h2>About Us</h2>
            <p>Welcome to HomeShine! We're committed to delivering exceptional cleaning services and top-notch equipment rentals in Yangon. Our team of dedicated professionals ensures that your home and business shine with unparalleled cleanliness. Whether you're looking for a deep clean, regular maintenance, or equipment for a DIY project, HomeShine is here to help.</p>
        </section>
        <hr>

        <section class="contact-info">
            <h2>Company Information</h2>
            <p><strong>Email:</strong> <a href="mailto:info@homeshine.com">info@homeshine.com</a></p>
            <p><strong>Phone:</strong> +95 123 4567</p>
            <p><strong>Address:</strong> 123 Cleaning Lane, Yangon, Myanmar</p>
        </section>
<hr>
        <section class="social-links">
            <h2>Social Media Links</h2>
            <p>Stay connected with us for updates, promotions, and cleaning tips!</p>
            <p><a href="https://facebook.com/HomeShineYangon" target="_blank">Facebook</a></p>
            <p><a href="https://instagram.com/HomeShineYangon" target="_blank">Instagram</a></p>
            <p><a href="https://twitter.com/HomeShineYangon" target="_blank">Twitter</a></p>
            <p><a href="https://linkedin.com/company/HomeShineYangon" target="_blank">LinkedIn</a></p>
        </section>
<hr>
        <section class="business-hours">
            <h2>Business Hours</h2>
            <p><strong>Monday - Friday:</strong> 9:00 AM - 6:00 PM</p>
            <p><strong>Saturday:</strong> 10:00 AM - 4:00 PM</p>
            <p><strong>Sunday:</strong> Closed</p>
        </section>
<br>
<hr>
<br>
<section class="feedback">
            <h2>Feedback and Suggestions</h2>
            <p>Your feedback helps us improve! If you have any suggestions or comments about our services, please let us know.</p>
        </section>
        <hr>
        <section class="contact-form">

            <form action="#" method="post">
                <input type="text" name="name" placeholder="Name" required value="<?php echo $Name?>"><br>
                <input type="email" name="email" placeholder="Email" required value="<?php echo $Email?>">
                <Label>Reason for Feedback</Label>
                <input type="radio" name="Type" value="Complaint"> Complaint
                <input type="radio" name="Type" value="Suggestion"> Suggestion
                <input type="radio" name="Type" value="Help"> Need Assistance
                <br>
                <textarea name="message" rows="5" placeholder="Message" required></textarea><br>
                <input type="submit" value="Submit">
            </form>
        </section>

       


        <section class="map">
        <h2>Map & Directions</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d954.5106268902432!2d96.15446764916214!3d16.873791664251414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19387375af8fb%3A0x3e4df3b68029ba14!2sV5F3%2BGPR%2C%20Thawka%20Street%2C%20Yangon!5e0!3m2!1sen!2smm!4v1726771047278!5m2!1sen!2smm" 
            width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
        </section>
    </div>
</body>
</html>
