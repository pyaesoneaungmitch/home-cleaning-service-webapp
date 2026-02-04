<?php
session_Start();

if (isset($_POST['btnLog'])){
			
		include("ConnectDB.php");

		$Email = $_POST['Email'];
		$password = $_POST['PW'];

		$sql = "SELECT * FROM admintbl WHERE AdminEmail='$Email'";

		$result = mysqli_query($connection,$sql);

		$num_rows = mysqli_num_rows($result);

		if($num_rows == 0){
			echo "Email is not Recognized!! Try <br>";
			echo "<a href='AdminReg.php'>Signing Up</a>";
		}
		else{
		//num_rows not equal to 0 // user existed
				$record = mysqli_fetch_assoc($result); //only one/first record

				$pw = $record['AdminPassword'];//hashed password in the table
                $AdminID = $record['AdminID'];
				
				$hash_pw = password_hash($pw, PASSWORD_DEFAULT);

				if(password_verify($password,$hash_pw))
				{
					$_SESSION['AdminID'] = $AdminID;
					echo "<script>
                    alert('Log In Successful!');
                    window.location.href='AHome.php';
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
		
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration Forms</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            padding: 30px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 90%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #00bfa5, #00d084);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background: linear-gradient(135deg, #00d084, #00bfa5);
        }

        .form-link {
            text-align: center;
            margin-top: 10px;
        }

        .form-link a {
            text-decoration: none;
            color: #00bfa5;
            font-weight: bold;
        }

        /* Admin Form Styling */
        .admin-container {
            background-image: url('img/adminlogbanner.jpg');
            background-size: cover;
            background-position: center;}

        /* Styling for different elements */
        .login-header {
            background: linear-gradient(135deg, #1bd585, #3498db);
            color: #fff;
            padding: 10px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            font-size: 40px;
        }

        .toggle-password {
            margin-top:10px;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 1.5rem;
            color: #666;
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;;
            box-sizing: border-box;
            
        }

        .password-container {
            position: relative;
        }

        .password-container input {
            width: 100%;
            padding-right: 40px;
            display:grid;
            justify-content:center;
        }
    </style>
</head>
<body>

    <!-- Admin Login Form -->
    <div class="container admin-container">
        <div class="form-container">
            <div class="login-header">Admin Login</div><br>
            <form method="POST">
                <label for="admin-email">Email</label>
                <center>
                <input type="email" id="admin-email" name="Email" placeholder="Enter Email" required>
                </center>
                <div class="form-group password-container">
                <label for="admin-password">Password</label>
                <center>
                <input type="password" id="admin-password" name="PW" placeholder="Enter Password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()">👁</span>
                </div>

                <input type="submit" value="Login" name="btnLog">
                </center>
            </form>
            <div class="form-link">
                <p>Not registered? <a href="AdminReg.php">Register here</a></p>
            </div>
        </div>
    </div>

    <script>
    function togglePasswordVisibility() {
        let passwordFields = document.querySelectorAll('input[type="password"]');
        passwordFields.forEach(field => {
            if (field.type === "password") {
                field.type = "text";
            } else {
                field.type = "password";
            }
        });
    }
</script>
 
  </body>
</html>