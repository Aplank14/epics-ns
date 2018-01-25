
<?php

$link = mysqli_connect($host, $user, $pass, $db);




$email = $_POST["email"];
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0

if ( $result->num_rows > 0 ) { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "DELETE FROM users WHERE email = '$email'";
    //mysqli_query($link, $sql);

    // Add user to the database
    if ((mysqli_query($link, $sql)) == TRUE){
        $_SESSION['message'] = 'User delete!';
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
        $_SESSION['message'] = 'Delete failed!';
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