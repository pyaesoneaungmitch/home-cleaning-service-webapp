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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="LCSS/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="LCSS/style.css">

    <title>Customer Login</title>
  </head>
  <body>
  

  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('img/LogBanner.png');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3>Login to <strong>HomeShine</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form method="POST">
                <div class="form-group first">
                  <label for="username">Email</label>
                  <input type="text" class="form-control" placeholder="your-email@gmail.com" id="username" name ="Email" required>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" id="password" name = "PW" 
                  required>
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                </div>

                <input type="submit" value="Log In" class="btn btn-block btn-primary" name="btnLog">
              </form>
              <br>
              <center>
               <b> <a href="CusReg.php">Don't have an account yet?</a></b>
              </center>
            </div>
          </div>
        </div>
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