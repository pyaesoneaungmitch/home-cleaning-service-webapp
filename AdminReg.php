<?php session_start(); 
    include('ConnectDB.php');
    if (isset($_POST['btnReg']))
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $cpw = trim($_POST['cpassword']);
        $email = trim($_POST['email']);
        $pos = trim($_POST['pos']);

        
            $verifyAcc = "SELECT * FROM admintbl WHERE AdminUsername = '$username'";
            $resultqry=mysqli_query($connection,$verifyAcc);
            $count=mysqli_num_rows($resultqry);
            
            if ($count>0)
            {
                echo "<script>window.alert('The Username Already exists')</script>";
                echo "<script>window.location = 'AdminReg.php'</script>";
            }
            else
            {
                if ($password==$cpw) {
                $insertqry = "INSERT INTO admintbl (AdminUsername, AdminEmail, AdminPassword, Position) 
                VALUES ('$username','$email','$password','$pos')";
                $insertResult = mysqli_query($connection,$insertqry);
                if ($insertResult)
                echo "<script>window.alert('Registration Complete')</script>";
                echo "<script>window.location = 'AdminLogin.php'</script>";
            }
            else
        {
          echo "<script>window.alert('The Passwords do not match')</script>";
          echo "<script>window.location = 'AdminReg.php'</script>";
        }
            }

        }
        
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            background-image: url('img/adminlogbanner.jpg');
            background-size: cover;
            background-position: center;
        }

        .container {
            display: flex;
            width: 600px;
            height: 600px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .left-column {
            width: 30%;
            background: linear-gradient(135deg, #00d084, #00bfa5);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 20px;
        }
        .left-column a
        {
            color:#FFFFFF;
        }


        .left-column img {
            width: 200px;
            height: auto;
            margin-bottom: 10px;
        }

        .left-column h1 {
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .left-column p {
            font-size: 0.9rem;
            text-align: center;
        }

        .right-column {
            width: 70%;
            padding: 30px;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right-column h2 {
            margin-bottom: 15px;
            font-size: 1.6rem;
            color: #333;
            text-align: center;
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
            font-size: 0.95rem;
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

        .submit-btn {
            width: 100%;
            padding: 10px;
            background: linear-gradient(135deg, #00d084, #00bfa5);
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }

        .submit-btn:hover {
            background:linear-gradient(135deg, #00bfa5,#00d084,);;
        }

    </style>
</head>
<body>

<div class="container">
    <!-- Left Column -->
    <div class="left-column">
        <img src="img/WhiteLogo.png" alt="Company Logo">
        <p>Your trusted partner for professional cleaning services.</p>
        <p>Already have an <a href="AdminLogin.php"><b>account?</b></a></p>
    </div>

    <!-- Right Column -->
    <div class="right-column">
        <h2>Admin Registration</h2>

        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group password-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()">👁</span>
            </div>

            <div class="form-group password-container">
                <label for="retype-password">Retype Password</label>
                <input type="password" id="cpassword" name="retype_password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()">👁</span>
            </div>

            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" id="pos" name="position" value="Admin">
            </div>

            <button type="submit" class="submit-btn" name="btnReg">Register</button>
        </form>
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
