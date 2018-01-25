
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


$id = $_POST["id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$new_email = $_POST["new_email"];
$old_email = $_POST["orig_email"];
$user_type = $_POST["user_type"];
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$old_email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0

if ( $result->num_rows > 0 ) { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "UPDATE users SET id = '$id', first_name = '$first_name', last_name = '$last_name', email = '$new_email', user_type = '$user_type' WHERE email = '$old_email'";
    //mysqli_query($link, $sql);

    // Add user to the database
    if ((mysqli_query($link, $sql)) == TRUE){
        $_SESSION['message'] = 'User modified!';
        header("location: success_add.php"); 
       
        
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

    else {
        $_SESSION['message'] = 'Update failed!';
        header("location: error.php"); 
        
    }

}
else {
    
    $_SESSION['message'] = 'User with this email does not exist!';
    header("location: error.php");
    
}
mysqli_close($link);
?>
          </form>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</html>