
<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
/*
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];  */

// Escape all $_POST variables to protect against SQL injections
/*
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
*/
$link = mysqli_connect($host, $user, $pass, $db);
//Assiging variable values from form above


//$id = $_POST["id"];
//$first_name = $_POST['first_name'];
//$last_name = $_POST['last_name'];
$email = $_POST['email'];
//$user_type = $_POST['user_type'];
// Check if user with that email already exists
$sel_stmt = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($link,$sel_stmt);
//$result = mysqli_query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    $row = $result->fetch_assoc();
    echo "<h2>Current info </h2>","<h2> ".$row['id']." </h2>"."<h2> ".$row['first_name']." </h2>"."<h2> ".$row['last_name']." </h2>"."<h2> ".$row['email']." </h2>"."<h2> ".$row['user_type']." </h2>";
        
}
else { // Email doesn't already exist in a database, error
     $_SESSION['message'] = 'User with this email does not exist!';
     header("location: error.php");
     
     /*
    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (id, first_name, last_name, email, user_type) VALUES ('$id', '$first_name', '$last_name', '$email', '$user_type')";
    //mysqli_query($link, $sql);

    // Add user to the database
    if ((mysqli_query($link, $sql)) == TRUE){
        $_SESSION['message'] = 'New user added!';
        header("location: success_add.php"); 
       
       */ 
        /*
        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( clevertechie.com )';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );*/

        

    }

   


mysqli_close($link);
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['confirm_modify_user'])) { //user logging in

        require 'change_info_php.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>
<body>
  <div class="form">
      
       
             <div id="confirm_modify">   
          <h1>Modify User!</h1>
          
          <form action="change_info.php" method="post" autocomplete="off"> 
              <div class="field-wrap">
            <label>
              Confirm modification by re-entering the email address of user to modify<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>
              
           
          <button class="button button-block" name="confirm_modify_user" />Confirm Modification</button>
          
          </form>

        </div>
          
        <!--
          <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="main.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
          </div>
        

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'/>
          </div>
          
          <button type="submit" class="button button-block" name="register" />Register</button>
          
          </form>

        </div>  -->
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
