<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Customer Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<link rel="stylesheet" href="RegStyle.css"/>
</head>
<body class="form-v4">
	<div class="page-content">
		<div class="form-v4-content">
			<div class="form-left">
                <h2>Register for a Cleaner Tomorrow</h2>
				<h3>Create an account to experience hassle-free cleaning services tailored to your needs. 
                    We’re here to help you maintain a spotless home, stress-free</h3>
				<img src="img/RegBanner.jpg" alt="">
				<form action="CusLogIn.php">
				<div class="form-left-last">
					<input type="submit" name="account" class="account" value="Have An Account">
				</div>
				</form>
			</div>
			<form class="form-detail" action="CusRegProcess.php" method="POST" id="myform">
				<h2>Create an Account</h2>
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="first_name">Full Name</label>
						<input type="text" name="Name" id="first_name" class="input-text" placeholder="Enter name here">
					</div>
					<div class="form-row form-row-1">
                    <label for="your_email">Your Email</label>
					<input type="text" name="Email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"
                    placeholder="Example@gmail.com">
					</div>
				</div>

                <div class="form-group">
					<div class="form-row form-row-1">
                    <label for="first_name">Phone number</label>
					<input type="text" name="Phone" id="first_name" class="input-text" placeholder="09-123456789">
					</div>
					<div class="form-row form-row-1">
						<label for="last_name">Date of Birth</label>
						<input type="date" name="DOB" id="last_name" class="input-text" placeholder="YYYY/MM/DD">
					</div>
				</div>


				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="password">Password</label>
						<input type="password" name="PW" id="password" class="input-text" required placeholder="a secured password">
					</div>
					<div class="form-row form-row-1">
						<label for="comfirm-password">Comfirm Password</label>
						<input type="password" name="CPW" id="comfirm_password" class="input-text" required placeholder="Retype the password">
					</div>
				</div>
				<div class="form-checkbox">
					<label class="container"><p>I agree to the <a href="#" class="text" required >Terms and Conditions</a></p>
					  	<input type="checkbox" name="checkbox">
					  	<span class="checkmark"></span>
					</label>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Register">
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
		// just for the demos, avoids form submit
		jQuery.validator.setDefaults({
		  	debug: true,
		  	success:  function(label){
        		label.attr('id', 'valid');
   		 	},
		});
		$( "#myform" ).validate({
		  	rules: {
			    password: "required",
		    	comfirm_password: {
		      		equalTo: "#password"
		    	}
		  	},
		  	messages: {
		  		first_name: {
		  			required: "Please enter a firstname"
		  		},
		  		last_name: {
		  			required: "Please enter a lastname"
		  		},
		  		your_email: {
		  			required: "Please provide an email"
		  		},
		  		password: {
	  				required: "Please enter a password"
		  		},
		  		comfirm_password: {
		  			required: "Please enter a password",
		      		equalTo: "Wrong Password"
		    	}
		  	}
		});
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>