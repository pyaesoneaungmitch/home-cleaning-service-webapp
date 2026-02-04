<div class="sidebar">
<center>
    <br>
    <br>
  <?php
           if(isset($_SESSION['AdminID'])) 
           {
               $AdminID = $_SESSION['AdminID'];
               include("ConnectDB.php");
               $sql = "SELECT * FROM admintbl WHERE AdminID='$AdminID'";
                   $result = mysqli_query($connection,$sql);
                   $record = mysqli_fetch_assoc($result); //only one/first record
               $Name = $record['AdminUsername'];//UserName
               $initial = strtoupper($Name[0]);

               echo "<div class='profile-initial'><a href='AdminProfile.php'>$initial </a></div>";
               echo "<a href='AdminProfile.php'>$Name [edit]</a>";
              
                
                } 

         else {
           echo "<a href='AdminReg.php'>SignUp</a>";
           
           }
           ?>
           <br><br><br>



<!-- Home Link -->
<a href="AHome.php" class="<?= basename($_SERVER['PHP_SELF']) == 'AHome.php' ? 'active' : '' ?>">Home</a>

<!-- FAQ Link -->
<a href="Assign.php" class="<?= basename($_SERVER['PHP_SELF']) == 'Assign.php' ? 'active' : '' ?>">Assign</a>

<!-- Contact Us Link -->
<a href="Manage.php" class="<?= basename($_SERVER['PHP_SELF']) == 'Manage.php' ? 'active' : '' ?>">Manage</a>
         </div>
         </center>

  

  
  
  


<!-- Page content -->

