<!-- navbar.php -->
<div class="sidebar">
  <img src="img/NavLogoWhite.png" alt="">

  <!-- Home Link -->
  <a href="Home.php" class="<?= basename($_SERVER['PHP_SELF']) == 'Home.php' ? 'active' : '' ?>">Home</a>

  <!-- Services Link -->
  <a href="Services.php" class="<?= basename($_SERVER['PHP_SELF']) == 'Services.php' ? 'active' : '' ?>">Services</a>

  <!-- FAQ Link -->
  <a href="FAQ.php" class="<?= basename($_SERVER['PHP_SELF']) == 'FAQ.php' ? 'active' : '' ?>">FAQ</a>

  <!-- Contact Us Link -->
  <a href="ContactUs.php" class="<?= basename($_SERVER['PHP_SELF']) == 'ContactUs.php' ? 'active' : '' ?>">Contact Us</a>

  <br><br><br><br><br><br><br><br>
  
  <center>
  
       
       <?php
                if(isset($_SESSION['CusID'])) 
                {
                    $CusID = $_SESSION['CusID'];
                    include("ConnectDB.php");
                    $sql = "SELECT * FROM customer WHERE CustomerID='$CusID'";
                		$result = mysqli_query($connection,$sql);
		                $record = mysqli_fetch_assoc($result); //only one/first record
                    $Name = $record['CustomerName'];//UserName
                    $initial = strtoupper($Name[0]);

                    echo "<div class='profile-initial'><a href='CusProfile.php'>$initial </a></div>";
                    echo "<a href='CusProfile.php'>$Name [edit]</a></div>";
              }

              else {
                echo "<a href='CusReg.php'>SignUp</a>";
                
                }
                ?>
              </div>
  </center>


<!-- Page content -->

