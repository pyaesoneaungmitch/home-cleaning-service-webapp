	<?php
	session_start();

	if (isset($_POST['btnLog'])){
		include("ConnectDB.php");

		$Email = $_POST['Email'];
		$password = $_POST['PW'];

		$sql = "SELECT * FROM customer WHERE CustomerEmail='$Email'";

		$result = mysqli_query($connection,$sql);

		$num_rows = mysqli_num_rows($result);

		if($num_rows == 0){
			echo "<script>
                    alert('Email is not Recognized!! Try Signing Up'); 
					window.history.back();</script>";
		}
		else{
		//num_rows not equal to 0 // user existed
				$record = mysqli_fetch_assoc($result); //only one/first record

				$pw = $record['CustomerPassword'];//hashed password in the table
                $cusID = $record['CustomerID'];
				
				$hash_pw = password_hash($pw, PASSWORD_DEFAULT);

				if(password_verify($password,$hash_pw))
				{
					$_SESSION['CusID'] = $cusID;
					echo "<script>
                    alert('Log In Successful!');
                    window.location.href='Home.php';
                    </script>";

				}
				else{
						echo "<script> 
									alert('Incorrect password!'); 
									window.history.back();
							 </script>";

						
				}
		}
	}

	?>