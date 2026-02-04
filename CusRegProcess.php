<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Information</title>
</head>
<body>

<?php

    include("ConnectDB.php");

    $Name = trim($_POST['Name']);
    $password = trim($_POST['PW']);
    $cpw = trim($_POST['CPW']);
    $phone =trim($_POST['Phone']);
    $email = trim($_POST['Email']);
    $dob = $_POST['DOB'];

    if(empty($Name)) 
    echo "You must enter your username<br>";

    else if(empty($password)) 
    echo "You must enter your password<br>";

    else if(empty($cpw)) 
    echo "You must enter your confirm password<br>";

    else if(empty($phone)) 
    echo "You must enter your Phone Number<br>";

    else if(empty($email)) 
    echo "You must enter your Email<br>";

    else if(empty($dob)){
		echo "You must choose your Date of Birth<br>";
	}
    else{

        if($password==$cpw)
		{
			$hash_pw = password_hash($password, PASSWORD_DEFAULT);
			$hash_pw = mysqli_real_escape_string($connection,$hash_pw);

			$sql_select = "select * from customer where CustomerEmail='$email'";

			$result = mysqli_query($connection,$sql_select);

			$num_rows = mysqli_num_rows($result);
            
			if($num_rows==0){
				$sql="INSERT INTO customer (CustomerName, CustomerPassword, CustomerEmail, CustomerPhone,CustomerDOB)
                VALUES ('$Name','$password','$email','$phone','$dob')";

				if(mysqli_query($connection,$sql)){
					echo "<script>
				        		alert('Registration Successful!');
				        		window.location.href='CusLogIn.php';
				 		</script>";
				}
				else echo "Insertion Error<br>";
			}	
			else {
					echo "<script>
				        	alert('An account with the same Email Already exists, Please choose another Email');
				        	window.history.back();
				 		</script>";
				}

		}
        else
        {
            echo "<script>
				        	alert('The two passwords do not match');
				        	window.history.back();
				 		</script>";
				}
        }
	
	
?>

</body>
</html>