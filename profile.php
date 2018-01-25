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
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $time_stamp = date("Y-m-d H:i:s");
    $sql = "UPDATE users SET login_time = '$time_stamp' WHERE email ='$email'";
    mysqli_query($link, $sql);
    mysqli_close($link);       
    
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome User <?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class="form">

          <h1>Welcome User</h1>
          <h2><?= $first_name.' '.$last_name ?></h2>
          
         
          
          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
