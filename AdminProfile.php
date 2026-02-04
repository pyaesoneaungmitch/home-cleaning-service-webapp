<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeShine - Welcome</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <style>
      

        .form-group label {
            display: block;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 70%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
        }

        .form-group input[type="password"] {
            position: relative;
        }

        .password-container {
            position: relative;
            margin-top:10px;
            margin-bottom:10px;
            font-size: 16px;
        }

        
        .password-toggle {
            position: relative;
            top: 50%;
            left: -30px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
        }

        .Edit button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 300px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?php include('Anavbar.php'); ?>
<div class="content">
<?php if(isset($_SESSION['AdminID'])) 
                {
                    $AdminID = $_SESSION['AdminID'];
                    include("ConnectDB.php");
                    $sql = "SELECT * FROM admintbl WHERE AdminID='$AdminID'";
                		$result = mysqli_query($connection,$sql);
		                $record = mysqli_fetch_assoc($result); //only one/first record
                    $Name = $record['AdminUsername'];//UserName
                    $Email = $record['AdminEmail'];
                    $PW = $record['AdminPassword'];
                    $POS = $record['Position'];
                    $initial = strtoupper($Name[0]);

              }

              if (isset($_POST['btnUpdate']))
              {
                  $username = trim($_POST['username']);
                  $password = trim($_POST['password']);
                  $cpw = trim($_POST['cpassword']);
                  $Aemail = trim($_POST['email']);
                  $Apos = trim($_POST['pos']);
          
                  
                      
                        if ($password==$cpw) {
                            $insertqry = "UPDATE admintbl SET AdminUsername = '$username', 
                            AdminEmail = '$Aemail', 
                            AdminPassword = '$password',
                            Position = '$Apos' 
                            WHERE AdminID = '$AdminID'";

                            $insertResult = mysqli_query($connection,$insertqry);
                            
                            if ($insertResult){
                            echo "<script>window.alert('Update Complete')</script>";
                          
                      }
                      else
                      {
                          
                          echo "<script>window.alert('Error cannnot locate your account')</script>";
                      }
                    }
                      
                    else
                  {
                    echo "<script>window.alert('The Passwords do not match')</script>";
                  }
                      }
          
                  
?>


<h1>User Profile</h1>

<div class="card">
  <center><h1 class="InitialBig"><?php echo $initial;?></h1></center>
  <h1><?php echo $Name;?></h1>
  <p class="title"><?php echo $Email;?></p>
  <p>Position : <?php echo $POS;?></p>
  <hr>
  <p><a href=ALogOut.php>Logout</a></p>
</div>
<br>
<div class="Edit">
        <h2>Edit Your Information</h2>
        <form method="POST">
        <div class="form-group">
                <label for="username">AdminID:</label>
                <input type="text" id="username" name="username"  required value="<?php echo $AdminID?>" readonly>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username"  required value="<?php echo $Name?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="<?php echo $Email?>">
            </div>
            <div class="form-group password-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required value="<?php echo $PW?>">
                <i class="fa fa-eye password-toggle" id="togglePassword" onclick="togglePassword()"></i>
            </div>
            <div class="form-group password-container">
                <label for="password">Retype Password</label>
                <input type="password" id="password" name="cpassword" required value="<?php echo $PW?>">
                <i class="fa fa-eye password-toggle" id="togglePassword" onclick="togglePassword()"></i>
            </div>
            <div class="form-group">
                <label for="username">Position</label>
                <input type="text" id="username" name="pos" required value="<?php echo $POS?>">
            </div>
            <button type="submit" class="btn" name="btnUpdate">Update Information</button>
        </form>
        </div>
   

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const togglePasswordIcon = document.getElementById('togglePassword');
            if (password.type === 'password') {
                password.type = 'text';
                togglePasswordIcon.classList.remove('fa-eye');
                togglePasswordIcon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                togglePasswordIcon.classList.remove('fa-eye-slash');
                togglePasswordIcon.classList.add('fa-eye');
            }
        }
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    
    
</body>
</html>
