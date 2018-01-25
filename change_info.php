<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
?>
<?php
/* Displays user information and some useful messages */
//session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    $link = mysqli_connect($host, $user, $pass, $db);
    // Makes it easier to read
    
    $email = $_POST['email'];
    
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Add New</title>
  <?php include 'css/css.html'; ?>
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['change_info'])) { //user logging in

        require 'change_info_php.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>
<body>
  <div class="form">
      
      <!--
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
      -->

         <div id="change">   
             <h1>Enter new details for <?= $email?></h1>
          
          <form action="change_info.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              ID<span class="req">*</span>
            </label>
            <input type="number" required autocomplete="off" name="id"/>
          </div>  
              
             <div class="field-wrap">
            <label>
              First Name<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="first_name"/>
          </div>
              
            <div class="field-wrap">
            <label>
              Last Name<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="last_name"/>
          </div>  
              
              <div class="field-wrap">
            <label>
              Original Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="orig_email"/>
          </div>
              <div class="field-wrap">
            <label>
              New Email Address (Enter the original email address if there is no change in email address for this user)<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="new_email"/>
          </div>
              
           <div class="field-wrap">
            <label>
              User Type<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="user_type"/>
          </div>
         
          <button class="button button-block" name="change_info" />Change</button>
          
          </form>

        </div>
          
       
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
